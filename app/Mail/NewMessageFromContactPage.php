<?php

namespace App\Mail;

use App\Models\PipedriveQuery;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection;

class NewMessageFromContactPage extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var Collection
     */
    public $programmes;

    /**
     * @var PipedriveQuery
     */
    public $query;
    /**
     * @var string|null
     */
    public $student;

    /**
     * Create a new message instance.
     *
     * @param Collection $programmes
     * @param PipedriveQuery $query
     * @param string|null $student
     */
    public function __construct(Collection $programmes, PipedriveQuery $query, string $student = null)
    {
        $this->query = $query;
        $this->programmes = $programmes;
        $this->student = $student;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mails.potential-student')
            ->subject("Prospect institution selected when 'Copy Chosen' or 'Send Chosen'");
    }
}
