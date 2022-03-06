<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CommentReply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentReplyController extends Controller
{
    public function store(Request $request, $comment)
    {
        $this->validate($request, ['message' => 'required|max:1000']);
        $commentReply = new CommentReply();
        $commentReply->comment_id = $comment;
        $commentReply->user_id = Auth::id();
        $commentReply->message = $request->message;
        $commentReply->save();

        toast('Comment Berhasil di Post','success');
        return redirect()->back();
    }
}
