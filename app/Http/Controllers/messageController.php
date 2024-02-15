<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class messageController extends Controller
{

    public function message(Request $request)
    {


        \app\models\Message::create([
            'username' => $request->input('username'),
            'body' => $request->input('message')

        ]);

        event(new \app\events\Message($request->input('username'), $request->input('message')));

        return [];
    }

    public function index()
    {
      $message =  \app\models\Message::all();

        return response()->json($message);
    }
}
