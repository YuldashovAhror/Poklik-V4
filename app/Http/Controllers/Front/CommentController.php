<?php 

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Video;
use App\Models\Voice;

class CommentController extends Controller
{
    public function index()
    {
        $videos = Video::orderBy('id', 'desc')->get();
        $voices = Voice::orderBy('id', 'desc')->get();
        $images = Image::orderBy('id', 'desc')->get();
        return view('front.comment', [
            'videos'=>$videos,
            'voices'=>$voices,
            'images'=>$images,
        ]);
    }
}