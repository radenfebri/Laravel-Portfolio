<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;


class TagController extends Controller
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
    $tags = Tag::all();

    return view('admin.tag.index', compact('tags'));
}



public function create()
{
    $tags = Tag::all();

    return view('admin.tag.create', compact('tags'));
}


public function store(Request $request)
{
    request()->validate([
        'nama_tag' => 'required|string|min:4|unique:tags,nama_tag',
    ]);


    $tags = Tag::create([
        'nama_tag' => $request->nama_tag,
        'slug' => Str::slug($request->nama_tag)
    ]);

    toast('Data Berhasil Ditambahkan','success');

    return redirect()->route('tag.index');

}



public function edit($id)
{
    $tags = Tag::find($id);

    return view('admin.tag.edit', compact('tags'));
}


public function update(Request $request, $id)
{
    request()->validate([
        'nama_tag' => 'required|string|min:4|unique:tags,nama_tag',
    ]);


    $data = $request->all();
    $data['slug'] = Str::slug($request->nama_tag);

    $tags = Tag::findOrFail($id);
    $tags->update($data);

    toast('Data tag Berhasil Diupdate','info');

    return redirect()->route('tag.index');
}


public function destroy($id)
{
    abort_if(Gate::denies('role-destroy'), Response::HTTP_FORBIDDEN, 'Forbidden');

    $tags = Tag::find($id);
    $tags->delete();

    toast('Data Berhasil Dihapus','success');

    return redirect()->route('tag.index');
}
}
