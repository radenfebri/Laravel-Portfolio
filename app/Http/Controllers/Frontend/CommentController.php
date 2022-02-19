<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $artikel)
    {
        $this->validate($request, ['comment' => 'required|max:1000']);
        $comment = new Comment();
        $comment->article_id = $artikel;
        $comment->user_id = Auth::id();
        $comment->comment = $request->comment;
        $comment->save();

        toast('Comment Berhasil di Post','success');
        return redirect()->back();
    }
}
