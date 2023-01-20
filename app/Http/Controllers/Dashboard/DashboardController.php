<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Group;
use App\Models\MessageCount;
use Auth;

class DashboardController extends Controller
{
    public function index(){
        $messages = MessageCount::where('user_id', Auth::id())
            ->firstOrFail();
        $contacts = Contact::where('user_id', Auth::id())->get();
        $groups = Group::where('user_id', Auth::id())->get();
        return view('dashboard.index', [
            'messages' => $messages,
            'contacts' => $contacts,
            'groups' => $groups
        ]);
    }
}
