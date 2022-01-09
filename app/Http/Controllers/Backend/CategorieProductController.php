<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CategorieProduct;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class CategorieProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $categorieproduct = CategorieProduct::orderBy('created_at', 'desc')->get();

        return view('admin.categorieproduct.index', compact('categorieproduct'));
    }

    public function create()
    {
        return view('admin.categorieproduct.create');
    }

    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required|string',
        ]);


        if (empty($request->file('image'))) {
            CategorieProduct::create([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'description' => $request->description,
                'status' => $request->status == TRUE ? '1':'0',
                'popular' => $request->popular == TRUE ? '1':'0',
                'meta_title' => $request->meta_title,
                'meta_keywords' => $request->meta_keywords,
                'meta_descrip' => $request->meta_descrip,
                'image' => $request->image ?? '',
            ]);

            toast('Data Berhasil Ditambahkan','success');

            return redirect()->route('categorie-product.index');

        } else {

            CategorieProduct::create([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'description' => $request->description,
                'status' => $request->status == TRUE ? '1':'0',
                'popular' => $request->popular == TRUE ? '1':'0',
                'meta_title' => $request->meta_title,
                'meta_keywords' => $request->meta_keywords,
                'meta_descrip' => $request->meta_descrip,
                'image' => $request->file('image')->store('categorie-product'),
            ]);

            toast('Data Berhasil Ditambahkan','success');

            return redirect()->route('categorie-product.index');
        }
    }


    public function edit($id)
    {
        $categorieproduct = CategorieProduct::findOrFail($id);

        return view('admin.categorieproduct.edit', compact('categorieproduct'));
    }


    public function update(Request $request, $id)
    {
        request()->validate([
            'name' => 'required|string',
        ]);


        if (empty($request->file('image'))) {
            $categorieproduct = CategorieProduct::find($id);
            $categorieproduct->update([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'description' => $request->description,
                'status' => $request->status == TRUE ? '1':'0',
                'popular' => $request->popular == TRUE ? '1':'0',
                'meta_title' => $request->meta_title,
                'meta_keywords' => $request->meta_keywords,
                'meta_descrip' => $request->meta_descrip,
            ]);

            toast('Data Berhasil Diupdate','success');

            return redirect()->route('categorie-product.index');

        } else {

            $categorieproduct = CategorieProduct::find($id);
            Storage::delete($categorieproduct->image);
            $categorieproduct->update([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'description' => $request->description,
                'status' => $request->status == TRUE ? '1':'0',
                'popular' => $request->popular == TRUE ? '1':'0',
                'meta_title' => $request->meta_title,
                'meta_keywords' => $request->meta_keywords,
                'meta_descrip' => $request->meta_descrip,
                'image' => $request->file('image')->store('categorie-product'),
            ]);

            toast('Data Berhasil Diupdate','success');

            return redirect()->route('categorie-product.index');
        }
    }


    public function destroy($id)
    {
        abort_if(Gate::denies('role-destroy'), Response::HTTP_FORBIDDEN, 'Forbidden');

        $categorieproduct = CategorieProduct::find($id);

        Storage::delete($categorieproduct->image);
        $categorieproduct->delete();

        toast('Data Berhasil Dihapus','success');

        return redirect()->route('categorie-product.index');
    }
}
