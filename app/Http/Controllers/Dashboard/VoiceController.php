<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Voice;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class VoiceController extends Controller
{
    public function index()
    {
        $voices = Voice::orderBy('id', 'desc')->get();
        return view('dashboard.voice.crud', [
            'voices'=>$voices
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'voice' => 'required|mimetypes:audio/mpeg,audio/mp3',
            'name_uz' => 'nullable',
            'name_ru' => 'nullable',
            'name_en' => 'nullable',
            'type_uz' => 'nullable',
            'type_ru' => 'nullable',
            'type_en' => 'nullable',
        ]);
        $voice = new Voice();
        if(!empty($validatedData['voice'])){
            $img_name = Str::random(10).'.'.$validatedData['voice']->getClientOriginalExtension();
            $validatedData['voice']->move(public_path('/image/voice'), $img_name);
            $voice->voice = '/image/voice/'.$img_name;
        }
        $voice->name_uz = $validatedData['name_uz'];
        $voice->name_ru = $validatedData['name_ru'];
        $voice->name_en = $validatedData['name_en'];
        $voice->type_uz = $validatedData['type_uz'];
        $voice->type_ru = $validatedData['type_ru'];
        $voice->type_en = $validatedData['type_en'];
        $voice->save();
        return redirect()->route('voice.index');
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'voice' => '|mimetypes:audio/mpeg,audio/mp3',
            'name_uz' => 'nullable',
            'name_ru' => 'nullable',
            'name_en' => 'nullable',
            'type_uz' => 'nullable',
            'type_ru' => 'nullable',
            'type_en' => 'nullable',
        ]);
        $voice = Voice::find($id);
        if(!empty($validatedData['voice'])){
            if(is_file(public_path($voice->voice))){
                unlink(public_path($voice->voice));
            }
            $img_name = Str::random(10).'.'.$validatedData['voice']->getClientOriginalExtension();
            $validatedData['voice']->move(public_path('/image/voice'), $img_name);
            $voice->voice = '/image/voice/'.$img_name;
        }
        $voice->name_uz = $validatedData['name_uz'];
        $voice->name_ru = $validatedData['name_ru'];
        $voice->name_en = $validatedData['name_en'];
        $voice->type_uz = $validatedData['type_uz'];
        $voice->type_ru = $validatedData['type_ru'];
        $voice->type_en = $validatedData['type_en'];
        $voice->save();
        return redirect()->route('voice.index');
    }

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
