<?php

namespace App\Http\Controllers\Message;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Message;
use App\Models\MessageCount;
use App\Models\User;
use Illuminate\Http\Request;

class SMSController extends Controller
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

    public function storeGroupMessage(Request $request, MessageCount $messageCount)
    {
        $groupMembers = 0;
        foreach ($request->get('groups') as $group) {
            $groupMembers = User::find(auth()->user()->id)
                ->groups()->find($group)
                ->contacts()
                ->count();
        }

        if ($messageCount->available_sms <= 0 || $messageCount->available_sms < $groupMembers)
            return redirect()->back()->with('error', 'no-sms');

        $messageCount->update([
            'available_sms' => $messageCount->available_sms - $groupMembers,
            'sent_sms' => $messageCount->sent_sms + $groupMembers
        ]);

        return true;
    }

    public function storeContactMessage(Request $request, MessageCount $messageCount)
    {
        $smsCount = count($request->get('contacts'));
        if ($messageCount->available_sms <= 0 || $messageCount->available_sms < $smsCount)
            return redirect()->back()->with('error', 'no-sms');

        $messageCount->update([
            'available_sms' => $messageCount->available_sms - $smsCount,
            'sent_sms' => $messageCount->available_emails + $smsCount
        ]);
        return true;
    }

    public function storeSMS(Request $request)
    {
        $this->makeValidation($request);

        if (!$request->has('contacts') && !$request->has('groups'))
            return redirect()->back()->with('error', 'no-recipients');

        $messageCount = MessageCount::whereRelation('user', 'id', auth()->id())
            ->first();

        $message = $this->storeMessage($request);

        if ($request->get('contacts')) {
            $message->contacts()->attach($request->get('contacts'));
            return $this->storeContactMessage($request, $messageCount);
        }

        if ($request->get('groups')) {
            $message->groups()->attach($request->get('groups'));
            return $this->storeGroupMessage($request, $messageCount);
        }

        $message->types()->attach($request->get('types'));
        return redirect()->route('messages.index')->with('success', 'sms-sent');
    }

}
