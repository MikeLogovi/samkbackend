<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResponseFormRequest;
use App\Models\Message;
use App\Models\Response;
use Illuminate\Http\Request;
use Illuminate\Notifications\Messages\MailMessage;
use App\Events\SendNewMail;

class ResponseController extends Controller
{
    public function sendResponse(ResponseFormRequest $request,Message $message){
           $response=new Response();
           $response->content=$request->content;
           $message->responses()->save($response);
           event(new SendNewMail($message,$response,'Response send successfully to'.$message->author_name));
           return redirect()->back();     
    }
}
