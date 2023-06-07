<?php

namespace App\Events;

use App\Model\User;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TestEventThree
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $test;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->test = 'TestEventThree';
    }
}
