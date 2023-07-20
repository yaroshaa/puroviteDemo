<?php

namespace App\Jobs;

use App\Mail\NewMessageFromContactPage;
use App\Models\Settings;
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
    private string $userMessage;
    private string $adminEmail;

    /**
     * Create a new job instance.
     */
    public function __construct($data, $adminEmail)
    {
        $this->name = $data['name'];
        $this->userEmail = $data['email'];
        $this->userMessage = $data['message'];
        $this->adminEmail = $adminEmail;

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
