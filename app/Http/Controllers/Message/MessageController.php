<?php

namespace App\Http\Controllers\Message;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Group;
use App\Models\Message;
use App\Models\MessageCount;
use App\Models\Type;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::whereRelation('user', 'id', auth()->id())
            ->paginate(5);
        $messages->withPath('/messages');
        return view('message.index', [
            'messages' => $messages
        ]);
    }

    public function sendContactMessage()
    {
        $types = Type::all();
        $contacts = Contact::whereRelation('user', 'id', auth()->id())
            ->get();
        return view('message.send-contact', [
            'types' => $types,
            'contacts' => $contacts
        ]);
    }

    public function sendGroupMessage()
    {
        $types = Type::all();
        $groups = Group::whereRelation('user', 'id', auth()->id())
            ->get();
        return view('message.send-group', [
            'types' => $types,
            'groups' => $groups
        ]);
    }

    public function sendMessage(Request $request,
                                MailController $mailController,
                                SMSController $SMSController)
    {
        $request->validate([
            'types' => 'required',
        ]);

        if (in_array(1, $request->get('types'))) {
           $SMSController->storeSMS($request);
        }

        if (in_array(2, $request->get('types'))) {
            $mailController->storeMail($request);
        }
        return redirect()->route('messages.index')->with('success', 'message-sent');
    }

}


