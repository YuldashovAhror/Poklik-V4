<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceComment;
use Illuminate\Http\Request;

class ServiceCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        $comments = ServiceComment::orderBy('id', 'desc')->get();
        return view('dashboard.servicecomment.crud', [
            'comments'=>$comments,
            'services'=>$services,
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
        $comments = new ServiceComment();
        $comments->service_id = $request->service;
        $comments->name_uz = $request->name_uz;
        $comments->name_ru = $request->name_ru;
        $comments->name_en = $request->name_en;
        $comments->discription_uz = $request->discription_uz;
        $comments->discription_ru = $request->discription_ru;
        $comments->discription_en = $request->discription_en;
        $comments->save();
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
        $comments = ServiceComment::find($id);
        $comments->service_id = $request->service;
        $comments->name_uz = $request->name_uz;
        $comments->name_ru = $request->name_ru;
        $comments->name_en = $request->name_en;
        $comments->discription_uz = $request->discription_uz;
        $comments->discription_ru = $request->discription_ru;
        $comments->discription_en = $request->discription_en;
        $comments->save();
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
        ServiceComment::find($id)->delete();
        return back();
    }
}
