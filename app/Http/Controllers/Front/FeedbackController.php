<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function store(Request $request)
    {
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