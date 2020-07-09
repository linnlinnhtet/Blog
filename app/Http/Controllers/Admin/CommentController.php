<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(){
        $comments = Comment::latest()->get();
        return view('admin.comment', compact('comments'));
    }
    public function destroy($id){
        Comment::findOrFail($id)->delete();
        return redirect()->back()->with('successMsg','Comment Successfully Remove From List.');
    }
}
