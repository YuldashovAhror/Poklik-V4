<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class VideoController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::orderBy('id', 'desc')->get();
        return view('dashboard.video.crud', [
            'videos'=>$videos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $video = new Video();
        if(!empty($request->file('video'))){
            $img_name = Str::random(10).'.'.$request->file('video')->getClientOriginalExtension();
            $request->file('video')->move(public_path('/image/video'), $img_name);
            $video->video = '/image/video/'.$img_name;
        }
        $video->save();
        return redirect()->route('video.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $video = Video::find($id);
        if(!empty($request->file('video'))){
            if(is_file(public_path($video->video))){
                unlink(public_path($video->video));
            }
            $img_name = Str::random(10).'.'.$request->file('video')->getClientOriginalExtension();
            $request->file('video')->move(public_path('/image/video'), $img_name);
            $video->video = '/image/video/'.$img_name;
        }
        $video->save();
        return redirect()->route('video.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = Video::find($id);
        if(is_file(public_path($video->video))){
            unlink(public_path($video->video));
        }
        $video->delete();
        return back();
    }
}
