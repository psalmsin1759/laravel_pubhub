<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Mail\MailHelper;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{

    public function sendWelcomeEmail(Request $request){
        $message = $request->message;
        $data = json_decode(base64_decode($message['data']), true);
        $email = $data['email'];
        $name = $data['name'];

        $body = $this->welcomeText($name);
        Mail::to($email)->send(new MailHelper("Welcome Email", $body));
    }

    private function welcomeText ($name){
        $body = "Dear " . $name . ",<br/><br/>

        Congratulations and a warm welcome to my tutorial. I hope this was helpful<br/><br/>
      
        Wishing you great success ahead!<br/><br/>
        
        Best regards,<br/>
        Samson Ude";
        
        return $body;
    }

}