<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CategorieProduct;
use Illuminate\Support\Str;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->get();

        return view('admin.product.index', compact('products'));
    }


    public function create()
    {
        $categorieproduct = CategorieProduct::all();

        return view('admin.product.create', compact('categorieproduct'));
    }


    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required|string',
        ]);


        if (empty($request->file('image'))) {
            Product::create([
                'name' => $request->name,
                'categorie_id' => $request->categorie_id,
                'slug' => Str::slug($request->name),
                'small_description' => $request->small_description,
                'description' => $request->description,
                'original_price' => $request->original_price,
                'selling_price' => $request->selling_price,
                'tax' => $request->tax,
                'qty' => $request->qty,
                'status' => $request->status == TRUE ? '1':'0',
                'trending' => $request->trending == TRUE ? '1':'0',
                'meta_title' => $request->meta_title,
                'meta_keywords' => $request->meta_keywords,
                'meta_description' => $request->meta_description,
                'image' => $request->image ?? '',
            ]);

            toast('Data Berhasil Ditambahkan','success');

            return redirect()->route('product.index');

        } else {

            Product::create([
                'name' => $request->name,
                'categorie_id' => $request->categorie_id,
                'slug' => Str::slug($request->name),
                'small_description' => $request->small_description,
                'description' => $request->description,
                'original_price' => $request->original_price,
                'selling_price' => $request->selling_price,
                'tax' => $request->tax,
                'qty' => $request->qty,
                'status' => $request->status == TRUE ? '1':'0',
                'trending' => $request->trending == TRUE ? '1':'0',
                'meta_title' => $request->meta_title,
                'meta_keywords' => $request->meta_keywords,
                'meta_description' => $request->meta_description,
                'image' => $request->file('image')->store('image-product'),
            ]);

            toast('Data Berhasil Ditambahkan','success');

            return redirect()->route('product.index');
        }
    }


    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categorieproduct = CategorieProduct::all();

        return view('admin.product.edit', compact('product', 'categorieproduct'));
    }


    public function update(Request $request, $id)
    {
        request()->validate([
            'name' => 'required|string',
        ]);


        if (empty($request->file('image'))) {
            $product = Product::findOrFail($id);
            $product->update([
                'name' => $request->name,
                'categorie_id' => $request->categorie_id,
                'slug' => Str::slug($request->name),
                'small_description' => $request->small_description,
                'description' => $request->description,
                'original_price' => $request->original_price,
                'selling_price' => $request->selling_price,
                'tax' => $request->tax,
                'qty' => $request->qty,
                'status' => $request->status == TRUE ? '1':'0',
                'trending' => $request->trending == TRUE ? '1':'0',
                'meta_title' => $request->meta_title,
                'meta_keywords' => $request->meta_keywords,
                'meta_description' => $request->meta_description,
            ]);

            toast('Data Berhasil Ditambahkan','success');

            return redirect()->route('product.index');

        } else {

            $product = Product::findOrFail($id);
            Storage::delete($product->image);
            $product->update([
                'name' => $request->name,
                'categorie_id' => $request->categorie_id,
                'slug' => Str::slug($request->name),
                'small_description' => $request->small_description,
                'description' => $request->description,
                'original_price' => $request->original_price,
                'selling_price' => $request->selling_price,
                'tax' => $request->tax,
                'qty' => $request->qty,
                'status' => $request->status == TRUE ? '1':'0',
                'trending' => $request->trending == TRUE ? '1':'0',
                'meta_title' => $request->meta_title,
                'meta_keywords' => $request->meta_keywords,
                'meta_description' => $request->meta_description,
                'image' => $request->file('image')->store('image-product'),
            ]);

            toast('Data Berhasil Ditambahkan','success');

            return redirect()->route('product.index');
        }
    }



    public function destroy($id)
    {
        abort_if(Gate::denies('role-destroy'), Response::HTTP_FORBIDDEN, 'Forbidden');

        $product = Product::find($id);

        Storage::delete($product->image);
        $product->delete();

        toast('Data Berhasil Dihapus','success');

        return redirect()->route('product.index');
    }
}
