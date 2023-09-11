<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceImage;
use Illuminate\Http\Request;

class ServiceImageController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        $images = ServiceImage::with('services')->orderBy('id', 'desc')->get();
        return view('dashboard.serviceimage.crud', [
            'services'=>$services,
            'images'=>$images,
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
        $images = new ServiceImage();
        $images->service_id = $request->service;
        $images->name_uz = $request->name_uz;
        $images->name_ru = $request->name_ru;
        $images->name_en = $request->name_en;
        if($request->file('photo')){
            $images['photo'] = $this->photoSave($request->file('photo'), 'image/serviceimages');
        }
        $images->save();
        return back();
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
        $images = ServiceImage::find($id);
        $images->service_id = $request->service;
        $images->name_uz = $request->name_uz;
        $images->name_ru = $request->name_ru;
        $images->name_en = $request->name_en;
        if($request->file('photo')){
            if(is_file(public_path($images->photo))){
                unlink(public_path($images->photo));
            }
            $images['photo'] = $this->photoSave($request->file('photo'), 'image/serviceimages');
        }
        $images->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $images = ServiceImage::find($id);
        if(is_file(public_path($images->photo))){
            unlink(public_path($images->photo));
        }
        $images->delete();
        return back();
    }
}
