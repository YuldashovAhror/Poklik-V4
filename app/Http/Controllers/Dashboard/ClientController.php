<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ClientComment;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    
    public function index()
    {
        $comments = ClientComment::orderBy('id', 'desc')->get();
        return view('dashboard.clientcomments.crud', [
            'comments'=>$comments
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
        //
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
        $comment = ClientComment::find($id);
        return view('dashboard.clientcomments.answer', [
            'comment'=>$comment
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
        $comments = ClientComment::find($id);
        if (!empty($request->ok)){
            $comments->ok = 1;
        }
        if (empty($request->ok)){
            $comments->ok = 0;
        }
        $comments->answer_uz = $request->answer_uz;
        $comments->answer_ru = $request->answer_ru;
        $comments->answer_en = $request->answer_en;
        $comments->save();
        return redirect()->route('clientcomment.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ClientComment::find($id)->delete();
        return back();
    }
}
