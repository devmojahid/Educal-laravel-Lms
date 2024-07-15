<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendBulkNewsLetterMail;

class BulkNewsLetterMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $subscriber;
    public $subject;
    public $message;
    /**
     * Create a new job instance.
     */
    public function __construct($email, $subject, $message)
    {
        $this->subscriber = $email;
        $this->subject = $subject;
        $this->message = $message;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->subscriber)->send(new SendBulkNewsLetterMail($this->subscriber, $this->subject, $this->message));
    }
}