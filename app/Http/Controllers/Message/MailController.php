<?php

namespace App\Http\Controllers\Message;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\MessageCount;
use App\Models\User;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function makeValidation(Request $request)
    {
        return $request->validate([
            'title' => 'required',
            'content' => 'required',
            'contacts' => 'nullable',
            'groups' => 'nullable',
        ]);
    }

    public function storeMessage(Request $request)
    {
        return Message::create([
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'user_id' => auth()->user()->id,
        ]);
    }

    public function sendContactMail(Request $request, MessageCount $messageCount)
    {

        $mailCount = count($request->get('contacts'));

        if ($messageCount->available_emails <= 0
            || $messageCount->available_emails < $mailCount
        )
            return redirect()->back()->with('error', 'no-mail');
        $messageCount->update([
            'available_emails' => $messageCount->available_emails - $mailCount,
            'sent_emails' => $messageCount->sent_emails + $mailCount
        ]);

        return true;
    }

    public function sendGroupMail(Request $request, MessageCount $messageCount)
    {

        $groupMembers = 0;
        foreach ($request->get('groups') as $group) {
            $groupMembers = User::find(auth()->user()->id)
                ->groups()->find($group)
                ->contacts()
                ->count();
        }

        if ($messageCount->available_emails <= 0
            || $messageCount->available_emails < count($request->get('contacts'))
        )
            return redirect()->back()->with('error', 'no-mail');

        $messageCount->update([
            'available_emails' => $messageCount->available_emails - $groupMembers,
            'sent_emails' => $messageCount->sent_emails + $groupMembers
        ]);

        return true;
    }

    public function storeMail(Request $request)
    {
        $this->makeValidation($request);
        if (!$request->has('contacts') && !$request->has('groups'))
            return redirect()->back()->with('error', 'no-recipients');
        $messageCount = MessageCount::whereRelation('user', 'id', auth()->id())
            ->first();

        $message = $this->storeMessage($request);

        if ($request->get('contacts')) {
            $this->sendContactMail($request, $messageCount);
            $message->contacts()->attach($request->get('contacts'));
        }
        if ($request->get('groups')) {
            $this->sendGroupMail($request, $messageCount);
            $message->groups()->attach($request->get('groups'));
        }
        $message->types()->attach($request->get('types'));
        return redirect()->route('messages.index')->with('success', 'mail-sent');
    }

}
