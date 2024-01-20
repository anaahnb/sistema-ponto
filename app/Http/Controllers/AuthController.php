<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return view();
    }

    public function show()
    {
        return view();
    }

    public function store(Request $request)
    {
        return redirect()->route('');
    }

    public function edit($id)
    {
        // User::findOrFail($id);
        return view();
    }

    public function update($id)
    {
        User::findOrFail($id);
        return redirect()->route('');
    }

    public function destroy($id)
    {
        // User::findOrFail($id);
        return redirect()->route('');
    }
}
