<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\EventParticipate;
use Illuminate\Http\Response;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MailController extends Controller
{
    public function basic_email(){
        $data = array('name'=>"Virat Gandhi");
     
        Mail::send(['text'=>'email.mail'], $data, function($message) {
           $message->to('abc@gmail.com', 'Tutorials Point')->subject
              ('Laravel Basic Testing Mail');
           $message->from('xyz@gmail.com','Virat Gandhi');
        });
        echo "Basic Email Sent. Check your inbox.";
     }
     public function html_email(){
        $data = array('name'=>"Virat Gandhi");
        Mail::send('mail', $data, function($message) {
           $message->to('abc@gmail.com', 'Tutorials Point')->subject
              ('Laravel HTML Testing Mail');
           $message->from('xyz@gmail.com','Virat Gandhi');
        });
        echo "HTML Email Sent. Check your inbox.";
     }
     public function attachment_email(){
        $data = array('name'=>"Virat Gandhi");
        Mail::send('mail', $data, function($message) {
           $message->to('abc@gmail.com', 'Tutorials Point')->subject
              ('Laravel Testing Mail with Attachment');
           $message->attach('C:\laravel-master\laravel\public\uploads\image.png');
           $message->attach('C:\laravel-master\laravel\public\uploads\test.txt');
           $message->from('xyz@gmail.com','Virat Gandhi');
        });
        echo "Email Sent with attachment. Check your inbox.";
     }

     public function sendEmail($id)
{
    $ticket = EventParticipate::findOrFail($id);
    try{
        Mail::send(['html' =>'back_end.event.ticket'], ['event_name' => $ticket->event->event_name, 'person' => $ticket->name, 'event_date' => $ticket->event->event_date, 'code' => $ticket->code], function ($message) use ($ticket)
        // Mail::send('emails.welcome', ['event_name' => $ticket->event->event_name, 'person' => $ticket->name, 'event_date' => $ticket->event->event_date, 'code' => $ticket->code], function ($message) use ($ticket)
        {
            $message->subject($ticket->event->event_name);
            $message->from('timnasku@gmail.com', 'timnasku');
            $message->to($ticket->email);
        });
        return back()->with('status','Berhasil Kirim Email');
        // return response()->json(['code' => 200, 'msg' => 'Sent successfully']);
    }
    catch (Exception $e){
        // return response (['status' => false,'errors' => $e->getMessage()]);
        // return response()->json(['code' => 200, 'msg' => 'Something went wrong, please try later.']);
    }
}
}
