<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::orderBy('id', 'desc')->get();
        return view('dashboard.comment.crud', [
            'comments'=>$comments
        ]);

    }

    public function store(Request $request)
    {
        Comment::create($request->all());
        return back();
    }

    public function update(Request $request, $id)
    {
        Comment::find($id)->update($request->all());
        return back();
    }

    public function destroy($id)
    {
        Comment::find($id)->delete();
        return back();
    }
}