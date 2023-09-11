<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use App\Models\Type;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function store(Request $request)
    {
        // dd($request->all());
        
        $token = '6009160734:AAGJ8ltyAphlPaOvZGV1JWuRe7x-ek_lB8E';
        if($request->type != null){
        $group = [
            'text' => "Имя: " . $request->name . "\n" . "Телефон: " . $request->phone . "\n" ."Тип:" . Type::find($request->type)->name_ru."\n" . "Ширина:".$request->width . "\n". "Высота:".$request->height . "\n" . "Проект: Poklik", 'chat_id' => '-814757227'];
        file_get_contents("https://api.telegram.org/bot$token/sendMessage?" . http_build_query($group));
        }
        
        if($request->type == null){
            $group = [
            'text' => "Имя: " . $request->name . "\n" . "Телефон: " . $request->phone . "\n" . "Проект: Poklik", 'chat_id' => '-814757227'];
        file_get_contents("https://api.telegram.org/bot$token/sendMessage?" . http_build_query($group));
        }
        
        $feedback = new Feedback();
        $feedback->name = $request->name;
        $feedback->phone = $request->phone;
        $feedback->type_id = $request->type;
        $feedback->width = $request->width;
        $feedback->height = $request->height;
        $feedback->save();
        // Feedback::create($request->all());
        return back();
    }
}