<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class BankEwalletController extends Controller
{
    public function index()
    {
        $payment = Payment::get();
        return view('admin.payment.index', compact('payment'));
    }


    public function create()
    {
        return view('admin.payment.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'kategorie' => 'required',
            'name' => 'required',
            'nomor' => 'required',
        ]);

        Payment::create([
            'kategorie' => $request->kategorie,
            'name' => $request->name,
            'nomor' => $request->nomor,
        ]);

        toast('Data Berhasil Ditambahkan','success');

        return redirect()->route('payment.index');
    }


    public function edit($id)
    {
        $payment = Payment::findOrFail($id);

        return view('admin.payment.edit', compact('payment'));

    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'kategorie' => 'required',
            'name' => 'required',
            'nomor' => 'required',
        ]);


        $data = $request->all();
        $data['name'] = $request->name;
        $data['nomor'] = $request->nomor;
        $data['kategorie'] = $request->kategorie;

        $payment = Payment::findOrFail($id);
        $payment->update($data);

        toast('Data Categorie Berhasil Diupdate','info');

        return redirect()->route('payment.index');
    }


    public function destroy($id)
    {
        $payment = Payment::find($id);
        $payment->delete();

        toast('Data Berhasil Dihapus','success');

        return redirect()->route('payment.index');
    }
}
