<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $comment = Comment::latest()->get();
        return view('admin.article.comment.index', compact('comment'));
    }


    public function destroy($id)
    {
        abort_if(Gate::denies('role-destroy'), Response::HTTP_FORBIDDEN, 'Forbidden');

        $comment = Comment::find($id);
        $comment->delete();

        toast('Data Berhasil Dihapus','success');

        return redirect()->route('comment.index');
    }
}
