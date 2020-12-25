<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\Mail;
class MailController extends Controller
{
    public function sendmail()
    {
    	 	$data["email"]='useremail@gmail.com';
            $data["client_name"]='user_name';
            $data["subject"]='sending pdf as attachment';

            //Generating PDF with all the post details

            $pdf = PDF::loadView('userdata');  // this view file will be converted to PDF

            //Sending Mail to the corresponding user

            Mail::send([], $data, function($message)use($data,$pdf) {
            $message->to($data["email"], $data["client_name"])
            ->subject($data["subject"])
            ->attachData($pdf->output(), 'Your_Post_Detail.pdf', [
                       'mime' => 'application/pdf',
                   ])
            ->setBody('Hi, welcome user! this is the body of the mail');
            });

    }
}
