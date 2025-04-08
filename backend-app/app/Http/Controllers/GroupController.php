<?php

namespace App\Http\Controllers;

use App\Http\Requests\GroupRequest;
use App\Models\Group;

class GroupController extends Controller
{
    public function index()
    {
        return Group::all();
    }

    public function store(GroupRequest $request)
    {
        return Group::create($request->validated());
    }

    public function show(Group $group)
    {
        return $group;
    }

    public function update(GroupRequest $request, Group $group)
    {
        $group->update($request->validated());

        return $group;
    }

    public function destroy(Group $group)
    {
        $group->delete();

        return response()->json();
    }
}
