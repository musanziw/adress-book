<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\ContactGroup;
use App\Models\Group;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;

class ContactController extends Controller
{

    public function index()
    {
        $contacts = Contact::WhereRelation('user', 'user_id', auth()->user()->id)->get();
        return view('contact.index', [
            'contacts' => $contacts
        ]);
    }

    public function create()
    {
        $groups = Group::WhereRelation('user', 'user_id', auth()->user()->id)->get();
        return view('contact.create', [
            'groups' => $groups
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'firstname' => ['required', 'min:3'],
            'name' => ['required', 'min:3'],
            'lastname' => ['required', 'min:3'],
            'email' => ['required', 'email', 'unique:contacts,email'],
            'address' => ['required'],
            'status' => ['nullable'],
            'phone' => ['required', 'min:10'],
            'groups' => ['required']
        ]);

        $contact = Contact::create([
            'firstname' => $request->get('firstname'),
            'name' => $request->get('name'),
            'lastname' => $request->get('lastname'),
            'address' => $request->get('address'),
            'phone' => $request->get('phone'),
            'status' => (bool)$request->get('status'),
            'email' => $request->get('email'),
            'user_id' => auth()->user()->id,
        ]);

        $contact->groups()->attach($request->get('groups'));

        return redirect()->route('contacts.index')->with('status', 'contact-created');
    }

    public function edit(int $id)
    {
        $contact = Contact::find($id);

        $groups = Group::WhereRelation('user', 'user_id', auth()->user()->id)->get();
        return view('contact.edit', [
            'contact' => $contact,
            'groups' => $groups
        ]);
    }

    public function update(Request $request, int $id)
    {
        $contact = Contact::find($id);
        $request->validate([
            'firstname' => ['required', 'min:3'],
            'name' => ['required', 'min:3'],
            'lastname' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('contacts')->ignore($contact->id)],
            'address' => ['required'],
            'status' => ['nullable'],
            'phone' => ['required', 'min:10'],
            'groups' => ['required']
        ]);

        $contact->update([
            'firstname' => $request->get('firstname'),
            'name' => $request->get('name'),
            'lastname' => $request->get('lastname'),
            'address' => $request->get('address'),
            'phone' => $request->get('phone'),
            'status' => $request->get('status') && $contact->id,
            'email' => $request->get('email'),
        ]);

        $contact->groups()->sync($request->get('groups'));
        return redirect()->route('contacts.index')->with('status', 'contact-updated');
    }

    public function delete(int $id)
    {
        $contact = Contact::find($id);
        $contact->groups()->detach($contact->groups);
        $contact->delete();
        return Redirect::route('contacts.index')->with('status', 'contact-deleted');
    }

}
