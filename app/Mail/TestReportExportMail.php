<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestReportExportMail extends Mailable
{
    use Queueable, SerializesModels;
    protected $fileurl;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($fileurl)
    {
        $this->fileurl = $fileurl;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('Email.TestReport')->from('studywithkishan@gmail.com')->subject('Testing Attachment')->attach($this->fileurl);
    }
}
