<?php

namespace App\Http\Controllers;

use App\Models\SuadeAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserVisitorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'userVisitor' => SuadeAccount::all(),
            'active' => 'userVisitor',
        ];
        return view('pages.admin.user-visitor.index', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = [
            'userVisitor' => SuadeAccount::findOrFail($id),
            'active' => 'userVisitor',
        ];
        return view('pages.admin.user-visitor.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $request->validate([
            'firstname_account' => 'string|max:255',
            'lastname_account' => 'string|max:255',
            'email_account' => 'email|unique:tb_suade_account,email_account,' . $id,
            'birthdate_account' => 'nullable|date',
            'status_account' => 'nullable',
            'old_password' => 'required_with:new_password',
            'new_password' => [
                'nullable',
                'string',
                'min:8',
                'regex:/^(?=.*[a-z])(?=.*[0-9\s!@#$%^&*()\-_=+{};:,<.>\/?\\[\]`~|]).*$/',
                'confirmed',
            ],
        ], [
            'firstname_account.string' => 'First name must be a string',
            'firstname_account.max' => 'First name must not exceed 255 characters',
            'lastname_account.string' => 'Last name must be a string',
            'lastname_account.max' => 'Last name must not exceed 255 characters',
            'email_account.email' => 'Email must be a valid email address',
            'email_account.unique' => 'Email has already been taken',
            'birthdate_account.date' => 'Birthdate must be a valid date',
            'status_account.required' => 'Status is required',
            'old_password.required_with' => 'Old password is required when new password is provided',
            'new_password.string' => 'New password must be a string',
            'new_password.min' => 'New password must be at least 8 characters long',
            'new_password.regex' => 'New password must contain at least one letter, one number, and one special character',
            'new_password.confirmed' => 'New password confirmation does not match',
        ]);
        $user = SuadeAccount::findOrFail($id);

        // Check if the old password is provided and correct
        if ($request->filled('new_password')) {
            if (!Hash::check($request->old_password, $user->password_account)) {
                return redirect()->back()->withErrors(['old_password' => 'Old password is incorrect'])->withInput();
            }
        }

        try {
            $user->update([
                'firstname_account' => $request->input('firstname_account'),
                'lastname_account' => $request->input('lastname_account'),
                'email_account' => $request->input('email_account'),
                'birthdate_account' => $request->input('birthdate_account'),
                'status_account' => $request->input('status_account'),
            ]);

            if ($request->filled('new_password')) {
                $user->password_account = Hash::make($request->input('new_password'));
                $user->save();
            }

            return redirect()->route('dashboard.user-visitor.index')->with('success', 'User updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Failed to update user: ' . $e->getMessage()])->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $userVisitor = SuadeAccount::findOrFail($id)->delete();
            return redirect()->route('dashboard.user-visitor.index')->with('success', 'User deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Failed to delete user: ' . $e->getMessage()]);
        }
    }
}
