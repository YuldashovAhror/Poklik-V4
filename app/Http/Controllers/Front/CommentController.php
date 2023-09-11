<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\ClientComment;
use App\Models\Gallary;
use App\Models\Image;
use App\Models\Video;
use App\Models\Voice;
use Illuminate\Http\Request;


class CommentController extends Controller
{
    public function index()
    {
        $comments = ClientComment::orderBy('id', 'desc')->get();
        $videos = Video::orderBy('id', 'desc')->get();
        $voices = Voice::orderBy('id', 'desc')->get();
        $images = Image::orderBy('id', 'desc')->get();
        return view('front.comment', [
            'videos'=>$videos,
            'voices'=>$voices,
            'images'=>$images,
            'comments'=>$comments,
        ]);
    }
    public function gallery()
    {
        $videos = Video::orderBy('id', 'desc')->get();
        $images = Gallary::orderBy('id', 'desc')->get();
        return view('front.gallery', [
            'videos'=>$videos,
            'images'=>$images,
        ]);
    }

    public function comment(Request $request)
    {
        $comments = new ClientComment();
        $comments->name = $request->name;
        $comments->discription = $request->discription;
        $comments->save();
        return back();
    }

}
