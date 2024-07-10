<?php

namespace App\Http\Controllers;

use App\Models\StayInTouch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StayInTouchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'stayInTouch' => StayInTouch::all(),
            'active' => 'stayInTouch',
        ];
        return view('pages.admin.layouts.stay_in_touch.index', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasi = Validator::make($request->all(), [
            'email' => 'required',
        ], [
            'email.required' => 'Email is required',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        try {
            $data = StayInTouch::findOrFail($id);
            $validatedData = $validasi->validated();

            $data->update($validatedData);

            return redirect()->back()->with('success', 'Data Stay In Touch updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data Quick Link failed to update');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $stayInTouch = StayInTouch::findOrFail($id);
            $stayInTouch->delete();
            return redirect()->back()->with('success', 'Data Stay In Touch delete successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data Stay In Touch failed to delete');
        }
    }
}
