<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'userManagement' => User::all(),
            'active' => 'userManagement',
        ];
        return view('pages.admin.user-management.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'userManagement' => User::all(),
            'active' => 'userManagement',
        ];
        return view('pages.admin.user-management.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'date' => 'nullable|date',
            'phone' => 'nullable|max:20|unique:users,phone',
            'address' => 'nullable|string|max:255',
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/^(?=.*[a-z])(?=.*[0-9\s!@#$%^&*()\-_=+{};:,<.>\/?\\[\]`~|]).*$/',
                'confirmed',
            ],
        ], [
            'name.required' => 'Full Name is required',
            'email.required' => 'Email is required',
            'email.email' => 'Email must be a valid email address',
            'email.unique' => 'Email has already been taken',
            'password.required' => 'Password is required',
            'password.min' => 'Password must be at least :min characters',
            'password.regex' => 'Password must contain at least one lowercase letter, one number, symbol, or whitespace character',
            'password.confirmed' => 'Password confirmation does not match',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->date = $request->date;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->password = Hash::make($request->password); // Enkripsi password menggunakan Hash
            $user->save();

            return redirect()->route('dashboard.user-management.index')->with('success', 'User added successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to add user');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = [
            'userManagement' => User::findOrFail($id),
            'active' => 'userManagement',
        ];
        return view('pages.admin.user-management.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = [
            'userManagement' => User::findOrFail($id),
            'active' => 'userManagement',
        ];
        return view('pages.admin.user-management.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'date' => 'nullable|date',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'old_password' => 'required_with:new_password',
            'new_password' => [
                'nullable',
                'string',
                'min:8',
                'regex:/^(?=.*[a-z])(?=.*[0-9\s!@#$%^&*()\-_=+{};:,<.>\/?\\[\]`~|]).*$/',
                'confirmed',
            ],
        ], [
            'name.required' => 'Full Name is required',
            'email.required' => 'Email is required',
            'email.email' => 'Email must be a valid email address',
            'email.unique' => 'Email has already been taken',
            'old_password.required_with' => 'Old password is required when setting a new password',
            'new_password.min' => 'Password must be at least :min characters',
            'new_password.regex' => 'Password must contain at least one lowercase letter, one number, symbol, or whitespace character',
            'new_password.confirmed' => 'Password confirmation does not match',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Check if the old password is provided and correct
        if ($request->filled('new_password')) {
            if (!Hash::check($request->old_password, $user->password)) {
                return redirect()->back()->withErrors(['old_password' => 'Old password is incorrect'])->withInput();
            }
        }

        try {
            // Update user details
            $user->name = $request->name;
            $user->email = $request->email;
            $user->date = $request->date;
            $user->phone = $request->phone;
            $user->address = $request->address;

            // Update password if new password is provided
            if ($request->filled('new_password')) {
                $user->password = Hash::make($request->new_password); // Encrypt new password
            }

            $user->save();

            return redirect()->route('dashboard.user-management.index')->with('success', 'User updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update user');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $userManagement = User::findOrFail($id);
            $userManagement->delete();
            return redirect()->back()->with('success', 'Data User delete successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data User failed to delete');
        }
    }
}
