<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        $roles = Role::all(); // Fetch all roles
        return view('panel.roles.index', compact('roles'));
    }

    // Show the form for creating a new resource.
    public function create()
    {
        return view('roles.create'); // Show form for creating a new role
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:roles',
        ]);

        // Create a new role
        Role::create($validatedData);

        return redirect()->route('roles.index')->with('success', 'Role created successfully.');
    }

    // Display the specified resource.
    public function show(Role $role)
    {
        return view('roles.show', compact('role')); // Show details of a role
    }

    // Show the form for editing the specified resource.
    public function edit(Role $role)
    {
        return view('roles.edit', compact('role')); // Show form for editing role
    }

    // Update the specified resource in storage.
    public function update(Request $request, Role $role)
    {
        // Validate the request
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:roles,name,' . $role->id,
        ]);

        // Update the role
        $role->update($validatedData);

        return redirect()->route('roles.index')->with('success', 'Role updated successfully.');
    }

    // Remove the specified resource from storage.
    public function destroy(Role $role)
    {
        $role->delete(); // Delete the role

        return redirect()->route('roles.index')->with('success', 'Role deleted successfully.');
    }
}
