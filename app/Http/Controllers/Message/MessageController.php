<?php

namespace App\Http\Controllers\Message;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Group;
use App\Models\Message;
use Auth;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::where('user_id', Auth::id())
            ->paginate(5);
        $messages->withPath('/messages');
        return view('message.index', [
            'messages' => $messages
        ]);
    }

    public function sendContactMessage()
    {
        $contacts = Contact::where('user_id', Auth::id())
            ->get();
        return view('message.send-contact', [
            'contacts' => $contacts
        ]);
    }

    public function sendGroupMessage()
    {
        $groups = Group::where('user_id', Auth::id())
            ->get();
        return view('message.send-group', [
            'groups' => $groups
        ]);
    }

    public function sendMessage(Request $request,
                                MailController $mailController,
                                SMSController $SMSController)
    {
        $request->validate([
            'types' => 'required',
            'contacts' => 'required',
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


