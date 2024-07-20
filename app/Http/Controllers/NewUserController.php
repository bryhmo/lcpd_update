<?php

namespace App\Http\Controllers;

use App\Models\NewUser;
use Illuminate\Http\Request;

class NewUserController extends Controller
{
    public function index()
    {
        $users = NewUser::paginate(15);
        return view('admin.newuser.index', compact('users'));
    }

    public function create()
    {
        return view('admin.newuser.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'dob' => 'required|date',
            'gender' => 'required|string|max:10',
            'nationality' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'kin_name' => 'required|string|max:255',
            'kin_relationship' => 'required|string|max:255',
            'kin_phone' => 'required|string|max:20',
            'kin_address' => 'required|string',
            'undergrad_degree' => 'required|string|max:255',
            'university' => 'required|string|max:255',
            'grad_year' => 'required|integer',
            'gpa' => 'required|numeric|between:0,4.00',
            'experience' => 'nullable|string',
            'certificate' => 'nullable|file|mimes:pdf,jpg,png',
            'program' => 'required|string|max:255',
            'intake' => 'required|string|max:10',
            'statement' => 'required|string',
        ]);

        $user = new NewUser($validatedData);

        if ($request->hasFile('certificate')) {
            $user->certificate = $request->file('certificate')->store('certificates');
        }

        $user->save();

        return redirect()->route('newuser.index')->with('success', 'User registered successfully');
    }

    public function show($id)
    {
        $user = NewUser::findOrFail($id);
        return view('admin.newuser.show', compact('user'));
    }

    public function edit($id)
    {
        $user = NewUser::findOrFail($id);
        return view('admin.newuser.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'dob' => 'required|date',
            'gender' => 'required|string|max:10',
            'nationality' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'kin_name' => 'required|string|max:255',
            'kin_relationship' => 'required|string|max:255',
            'kin_phone' => 'required|string|max:20',
            'kin_address' => 'required|string',
            'undergrad_degree' => 'required|string|max:255',
            'university' => 'required|string|max:255',
            'grad_year' => 'required|integer',
            'gpa' => 'required|numeric|between:0,4.00',
            'experience' => 'nullable|string',
            'certificate' => 'nullable|file|mimes:pdf,jpg,png',
            'program' => 'required|string|max:255',
            'intake' => 'required|string|max:10',
            'statement' => 'required|string',
        ]);

        $user = NewUser::findOrFail($id);
        $user->fill($validatedData);

        if ($request->hasFile('certificate')) {
            $user->certificate = $request->file('certificate')->store('certificates');
        }

        $user->save();

        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    public function toggleAdmission($id)
    {
        $user = NewUser::findOrFail($id);
        $user->admitted = !$user->admitted;
        $user->save();

        return redirect()->route('users.index')->with('success', 'User admission status updated');
    }

    public function destroy($id)
    {
        $user = NewUser::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }
}
