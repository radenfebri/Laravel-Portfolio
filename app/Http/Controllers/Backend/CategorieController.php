<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class CategorieController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = Categorie::all();

        return view('admin.categorie.index', compact('categories'));
    }



    public function create()
    {
        $categories = Categorie::all();

        return view('admin.categorie.create', compact('categories'));
    }


    public function store(Request $request)
    {
        request()->validate([
            'nama_kategori' => 'required|string|min:4',
        ]);


        $categories = Categorie::create([
            'nama_kategori' => $request->nama_kategori,
            'slug' => Str::slug($request->nama_kategori)
        ]);

        toast('Data Berhasil Ditambahkan','success');

        return redirect()->route('categorie.index');

    }



    public function edit($id)
    {
        $categories = Categorie::find($id);

        return view('admin.categorie.edit', compact('categories'));
    }


    public function update(Request $request, $id)
    {
        request()->validate([
            'nama_kategori' => 'required|string|min:4',
        ]);


        $data = $request->all();
        $data['slug'] = Str::slug($request->nama_kategori);

        $categories = Categorie::findOrFail($id);
        $categories->update($data);

        toast('Data Categorie Berhasil Diupdate','info');

        return redirect()->route('categorie.index');
    }


    public function destroy($id)
    {
        abort_if(Gate::denies('role-destroy'), Response::HTTP_FORBIDDEN, 'Forbidden');

        $categories = Categorie::find($id);
        $categories->delete();

        toast('Data Berhasil Dihapus','success');

        return redirect()->route('categorie.index');
    }
}
