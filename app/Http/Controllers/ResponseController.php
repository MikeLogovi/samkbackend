<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResponseFormRequest;
use App\Models\Message;
use App\Models\Response;
use Illuminate\Http\Request;
use Illuminate\Notifications\Messages\MailMessage;

class ResponseController extends Controller
{
    public function sendResponse(ResponseFormRequest $request,Message $message,Response $response){
           $message->responses()->save($response);
           event(new SendNewMail($message,$response,'Response send successfully to'.$message->author_name));
           return redirect()->back();     
    }
}
