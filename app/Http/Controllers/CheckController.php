<?php

namespace App\Http\Controllers;

use DB;
use Mail;
use App\User;
use App\ImgUpload;
use Carbon\Carbon;
use App\Mail\WelcomeMail;
use App\Jobs\SendEmailJob;
use Illuminate\Http\Request;
use App\Mail\TestReportExportMail;
use Illuminate\Support\Facades\Storage;

class CheckController extends Controller
{
    public function callProcedure()
    {
    	// Calling Stored Procedure from MySQL
    	$alluser = DB::select('call getalluser()');
    	return $alluser;
    }
    public function sendmailview()
    {
    	return view('sendmail');
    }
    public function sendmail(Request $request)
    {
    	$email = $request->email;
    	SendEmailJob::dispatch($email)->delay(now()->addSeconds(5));
    }
    public function sendSMS()
    {
        $basic  = new \Nexmo\Client\Credentials\Basic('fc14a005', 'Zhw4SFHQsObZgS5h');
        $client = new \Nexmo\Client($basic);

        $message = $client->message()->send([
            'to' => '919556501640',
            'from' => 'Vonage APIs',
            'text' => 'test message from studywithkishan'
        ]);
        return 'message sent';
    }
    public function sendImage(Request $request)
    {
        $image=new ImgUpload;  
        if($request->hasfile('image'))  
        {  
            $file=$request->file('image');  
            $extension=$file->getClientOriginalExtension();  
            $filename=time().'.'.$extension;  
            $file->move('public/upload/userimg/',$filename);  
            $image->image=$filename;  
        }  
        else  
        {  
            return $request;  
            $image->image='';  
        }  
        $image->save();
        return response()->json(['response'=>['code'=>'200','message'=>'image uploaded successfull']]);
    }
    public function datetime()
    {
       $id = 1;
       $date = User::select('created_at')->where('id',$id)->get();
       $date = $date[0]->created_at;
       // return $date;
       return $date->toDayDateTimeString();
    }
    public function sendMarkdownMail()
    {
        $emails = ['mail1@gmail.com','mail2@gmail.com','mail3@gmail.com']; 

        $data['name'] = 'your name';
        $data['subject'] = 'Signup Mail';
        $data['from'] = 'studywithkishan@gmail.com';

        Mail::to($emails)->send(new WelcomeMail($data));

    }
    public function sendAttachmentMail()
    {
                    $file_name = 'TestReport' . "_" . time() . '.'.$format;
                    $storage_path = 'public/TestReport';
                    $filePath = $storage_path . '/' . $file_name;
                    // Generating file and storing it on the server
                    // dd($filePath);
                    $exl = Excel::store(new TestReportExport($data,$subject,$report_name), $filePath);
                    // return $exl;
                    if($exl)
                    {
                    $fileurl = asset('storage/TestReport').'/'.$file_name;
                
                    }
                    $fileurl = Storage::path('public/TestReport/'.$file_name);

                    //Sending Mail with pdf or csv attachment to multiple email ids
                    $mail = Mail::to($emails)->send(new TestReportExportMail($fileurl));
    }
    public function UserData()
    {
        $data = DB::table('users')->where('id','<',4)->pluck('name','id');
        return gettype($data);
    }
}
