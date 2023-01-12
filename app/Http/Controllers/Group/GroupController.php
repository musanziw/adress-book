<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class GroupController extends Controller
{
    public function index()
    {
        $groups = Group::all();
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
            'description' => ['required', 'max:200', 'min:5']
        ]);
        Group::create([
            'name' => $request->get('name'),
            'description' => $request->get('description')
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
            'description' => ['required', 'max:200', 'min:5']
        ]);
        Group::find($id)->update([
            'name' => $request->get('name'),
            'description' => $request->get('description')
        ]);
        return Redirect::route('groups.index')->with('status', 'group-upated');
    }

    public function delete(int $id){
        Group::find($id)->delete();
        return Redirect::route('groups.index')->with('status', 'group-deleted');
    }
}
