<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestSendMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mailParameters = [])
    {
        $this->subjectContent = $mailParameters['subjectContent'] ?? '';
        $this->viewPath       = $mailParameters['viewPath'] ?? '';
        $this->data           = $mailParameters['data'] ?? [];
        $this->attachmentList = $mailParameters['attachmentList'] ?? [];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mail = $this->subject($this->subjectContent);

        if (!empty($this->viewPath)) {
            $mail->markdown($this->viewPath);
        }

        if (count($this->data) > 0) {
            $mail->with($this->data);
        }

        if (count($this->attachmentList) > 0) {
            foreach ($this->attachmentList as $attachment) {
                $options = [
                    'as'    => basename($attachment),
                    'mime'  => mime_content_type($attachment)
                ];
                $mail->attach($attachment, $options);
            }
        }

        return $mail;
    }
}
