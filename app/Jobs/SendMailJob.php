<?php

namespace App\Jobs;

use App\Mail\NewMessageFromContactPage;
use GuzzleHttp\Psr7\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Mail;

class SendMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private string $name;
    private string $userEmail;
    private string $adminEmail;
    private string $userMessage;


    /**
     * Create a new job instance.
     */
    public function __construct($data)
    {
        $this->name = $data->name;
        $this->userEmail = $data->email;
        $this->adminEmail = config('mail.to');
        $this->userMessage = $data->message;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->adminEmail)
            ->send(new NewMessageFromContactPage($this->name, $this->userEmail,$this->userMessage ));
    }
}
