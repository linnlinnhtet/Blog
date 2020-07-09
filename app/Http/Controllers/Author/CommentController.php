<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Comment;
use Illuminate\Support\Facades\Auth;
class CommentController extends Controller
{
    public function index(){
        $posts = Auth::user()->posts;
        return view('author.comment', compact('posts'));
    }
    public function destroy($id){
        Comment::findOrFail($id)->delete();
        return redirect()->back()->with('successMsg','Comment Successfully Remove From List.');
    }
}
