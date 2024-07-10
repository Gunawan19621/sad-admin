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
