<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::orderBy('id', 'desc')->get();
        return view('dashboard.service.index', [
            'services'=>$services
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.service.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request = $request->toArray();
        
        if (!empty($request['main_photo'])){
            $request['main_photo'] = $this->photoSave($request['main_photo'], 'image/service');
        }
        if (!empty($request['second_photo'])){
            $request['second_photo'] = $this->photoSave($request['second_photo'], 'image/service');
        }
        
        Service::create($request);
        return redirect()->route('service.index');
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
        $service = Service::find($id);
        return view('dashboard.service.edit', [
            'service'=>$service
        ]);
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
        $request = $request->toArray();
        
        if (!empty($request['main_photo'])){
            $this->fileDelete('\Service', $id, 'main_photo');
            $request['main_photo'] = $this->photoSave($request['main_photo'], 'image/service');
        }
        if (!empty($request['second_photo'])){
            $this->fileDelete('\Service', $id, 'second_photo');
            $request['second_photo'] = $this->photoSave($request['second_photo'], 'image/service');
        }
        
        Service::find($id)->update($request);
        return redirect()->route('service.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->fileDelete('\Service', $id, 'main_photo');
        $this->fileDelete('\Service', $id, 'second_photo');
        Service::find($id)->delete();
        return back();
    }
}
