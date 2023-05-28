<?php

namespace App\Http\Controllers;

use App\Models\Calculator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CalculatorController extends Controller
{
    // Fungsi menampilkan Halaman UI
    public function index()
    {
        $data = Calculator::all();
        $previous = DB::table('calculator')->latest('id')->first();
        return view('calculator', compact('data', 'previous'));
    }

    // Fungsi OOP untuk operasi bilangan
    public function calculator(Request $request)
    {

        // Inisiasi inputan bilangan dan operasi
        $bilangan1 = $request->input('bilangan1');
        $bilangan2 = $request->input('bilangan2');
        $operation = $request->input('operation');

        // Rumus dari operasi kalkulator
        if ($operation == '+') {
            $result = $bilangan1 + $bilangan2;
        } elseif ($operation == '-') {
            $result = $bilangan1 - $bilangan2;
        } elseif ($operation == '*') {
            $result = $bilangan1 * $bilangan2;
        } elseif ($operation == ':' && $bilangan2 != '0') {
            $result = $bilangan1 / $bilangan2;
        } elseif ($operation == '%') {
            $result = $bilangan1 % $bilangan2;
        } else $result = 0;

        // Validasi data inputan
        $request->validate([
            'bilangan1' => ['required'],
            'bilangan2' => ['required'],
            'operation' => ['required'],
        ]);

        // Fungsi Insert ke dalam database
        Calculator::create([
            'bilangan1' => $request->bilangan1,
            'bilangan2' => $request->bilangan2,
            'operation' => $request->operation,
            'result' => $result,
        ]);

        return redirect('/')->with('result', 'Hasil dari Operasi adalah', $result);
    }

    // Fungsi untuk menggunakan value operasi sebelumnya
    public function previous()
    {
        $previous = DB::table('calculator')->latest('id')->first();
        $data = Calculator::all();
        return view('previous', compact('previous', 'data'));
    }
}
