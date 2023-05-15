<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Gallary;
use App\Models\Image;
use App\Models\Service;
use App\Models\Type;
use App\Models\Video;
use App\Models\Voice;

class WelcomeController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('id', 'desc')->get();
        $categories = Category::orderBy('id', 'desc')->get();
        $videos = Video::orderBy('id', 'desc')->paginate(3);
        $voices = Voice::orderBy('id', 'desc')->paginate(3);
        $images = Image::orderBy('id', 'desc')->paginate(3);
        $gallaries = Gallary::orderBy('id', 'desc')->get();
        $types = Type::orderBy('id', 'desc')->get();
        return view('welcome', [
            'services'=>$services,
            'categories'=>$categories,
            'videos'=>$videos,
            'voices'=>$voices,
            'images'=>$images,
            'gallaries'=>$gallaries,
            'types'=>$types,
        ]);
    }


    public function show($id)
    {
        $gallaries = Gallary::orderBy('id', 'desc')->get();
        $service = Service::find($id);
        return view('front.services', [
            'service'=>$service,
            'gallaries'=>$gallaries,
        ]);
    }
}