<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/sendpdf','MailController@sendmail');
Route::get('/procedure/{id}','CheckController@callProcedure');
Route::get('/map',function(){
	return view('map');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/sendmailview','CheckController@sendmailview');
Route::post('/sendmail','CheckController@sendmail');
Route::get('/sendsms','CheckController@sendSMS');
Route::get('/datetimeformat','CheckController@datetime');
Route::get('/search/{search}/demo',function($search){
	return $search;
})->where('search','.*');
Route::fallback(function(){
	return 'route not found';
});
Route::get('/sendmarkdownmail','CheckController@sendMarkdownMail')->name('send-markdown-mail');
Route::get('/sendattachemntmail','CheckController@sendAttachmentMail')->name('send-attachment-mail'); 
Route::get('/userdata','CheckController@UserData')->name('userdata');
Route::get('/userrecord','UserController@userRecord')->name('userrecord');
Route::get('/userremindermail','UserController@userReminderMail')->name('user-reminder-mail');
Route::get('/addmonths','UserController@addMonths');
Route::get('/ckeditor',function(){
	return view('ckeditorform');
});
Route::post('/upload','UserController@uploadImage')->name('upload');
Route::get('/trackdistance','UserController@trackDistance')->name('track-distance');
Route::get('/carbonmethod','UserController@carbonDays');
Route::get('/stringtoarray','UserController@stringToArray');
Route::get('/stringtoobject','UserController@stringToObject');
Route::get('/convertsecondstohoursminute','UserController@convert_seconds_to_hours_minutes_seconds');
Route::get('/downloadzip','UserController@downloadZip')->name('download-zip');
Route::get('/setstartendweek','UserController@setStartEndWeek')->name('startendofweek');
Route::get('/statuslist','UserController@getStatus')->name('status-list');