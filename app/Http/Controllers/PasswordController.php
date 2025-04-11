<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasswordController extends Controller
{
    public function password_generator()
    {
        return view('password');
    }

    public function generate(Request $request)
    {
        $request->validate([
            'length' => 'required|integer|min:4|max:100',
        ]);

        $length = $request->input('length');
        $useLower = $request->has('lowercase');
        $useUpper = $request->has('uppercase');
        $useNumbers = $request->has('numbers');
        $useSymbols = $request->has('symbols');

        $symbols = ['!', '#', '$', '%', '&', '(', ')', '*', '+', '@', '^'];
        $lowercase = range('a', 'z');
        $uppercase = range('A', 'Z');
        $numbers = range(0, 9);

        $pool = [];

        if ($useLower) $pool = array_merge($pool, $lowercase);
        if ($useUpper) $pool = array_merge($pool, $uppercase);
        if ($useNumbers) $pool = array_merge($pool, $numbers);
        if ($useSymbols) $pool = array_merge($pool, $symbols);

        if (empty($pool)) {
            return back()->with('error', 'Select at least one character set!');
        }

        $password = '';
        for ($i = 0; $i < $length; $i++) {
            $password .= $pool[array_rand($pool)];
        }

        return back()->with('password', $password);
    }
}
