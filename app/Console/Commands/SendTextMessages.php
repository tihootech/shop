<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\TextMessageController;
use App\Queue;

class SendTextMessages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:sms';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sends Sms In background';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $messages = Queue::where('sent',0)->get();
        foreach ($messages as $key => $message) {
            $tokens = explode('---', $message->tokens);
            $result = TextMessageController::lookup($message->mobile, $tokens, $message->method);
            $message->sent = 1;
            $message->save();
        }
    }
}
