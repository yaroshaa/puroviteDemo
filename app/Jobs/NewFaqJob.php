<?php

namespace App\Jobs;


use App\Mail\NewQuestionFaq;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Mail;

class NewFaqJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private string $name;
    private string $userEmail;
    private string $adminEmail;
    private string $question;


    /**
     * Create a new job instance.
     */
    public function __construct($data, $adminEmail)
    {
        $this->name = $data['name'];
        $this->userEmail = $data['email'];
        $this->adminEmail = $adminEmail;
        $this->question = $data['question'];
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->adminEmail)
            ->send(new NewQuestionFaq($this->name, $this->userEmail,$this->question ));
    }
}
