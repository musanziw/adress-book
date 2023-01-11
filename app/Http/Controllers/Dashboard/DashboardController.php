<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Group;
use App\Models\MessageCount;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $messages = MessageCount::first();
        $contacts = Contact::count();
        $groups = Group::count();

        return view('dashboard.index', [
            'messages' => $messages,
            'contacts' => $contacts,
            'groups' => $groups
        ]);
    }
}
