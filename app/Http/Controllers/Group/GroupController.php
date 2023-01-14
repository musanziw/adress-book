<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class GroupController extends Controller
{
    public function index()
    {
        $groups = Group::whereRelation('user', 'id', auth()->user()->id)->get();
        return view('group.index', [
            'groups' => $groups
        ]);
    }

    public function create()
    {
        return view('group.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:30', 'min:4'],
        ]);

        Group::create([
            'name' => $request->get('name'),
            'user_id' => auth()->user()->id
        ]);
        return Redirect::route('groups.index')->with('status', 'group-created');
    }

    public function edit(int $id)
    {
        $group = Group::find($id);
        return view('group.edit', [
            'group' => $group
        ]);
    }

    public function update(Request $request, int $id)
    {
        $request->validate([
            'name' => ['required', 'max:30', 'min:4'],
        ]);
        Group::find($id)->update([
                        'name' => $request->get('name'),
                    ]);
        return Redirect::route('groups.index')->with('status', 'group-upated');
    }

    public function delete(int $id)
    {
        $group = Group::find($id);
        $contacts = Contact::whereRelation('groups', 'group_id', $id)->get();
        foreach ($contacts as $contact) {
            $contact->groups()->detach($group->id);
        }
        $group->delete();
        return Redirect::route('groups.index')->with('status', 'group-deleted');
    }
}
