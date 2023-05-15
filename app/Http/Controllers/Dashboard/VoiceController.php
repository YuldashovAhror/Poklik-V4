<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Voice;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class VoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $voices = Voice::orderBy('id', 'desc')->get();
        return view('dashboard.voice.crud', [
            'voices'=>$voices
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
        $voice = new Voice();
        if(!empty($request->file('voice'))){
            $img_name = Str::random(10).'.'.$request->file('voice')->getClientOriginalExtension();
            $request->file('voice')->move(public_path('/image/voice'), $img_name);
            $voice->voice = '/image/voice/'.$img_name;
        }
        $voice->name_uz = $request->name_uz;
        $voice->name_ru = $request->name_ru;
        $voice->name_en = $request->name_en;
        $voice->type_uz = $request->type_uz;
        $voice->type_ru = $request->type_ru;
        $voice->type_en = $request->type_en;
        $voice->save();
        return redirect()->route('voice.index');
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
        $voice = Voice::find($id);
        if(!empty($request->file('voice'))){
            if(is_file(public_path($voice->photo))){
                unlink(public_path($voice->photo));
            }
            $img_name = Str::random(10).'.'.$request->file('voice')->getClientOriginalExtension();
            $request->file('voice')->move(public_path('/image/voice'), $img_name);
            $voice->voice = '/image/voice/'.$img_name;
        }
        $voice->name_uz = $request->name_uz;
        $voice->name_ru = $request->name_ru;
        $voice->name_en = $request->name_en;
        $voice->type_uz = $request->type_uz;
        $voice->type_ru = $request->type_ru;
        $voice->type_en = $request->type_en;
        $voice->save();
        return redirect()->route('voice.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $voice = Voice::find($id);
        if(is_file(public_path($voice->photo))){
            unlink(public_path($voice->photo));
        }
        $voice->delete();
        return back();
    }
}
