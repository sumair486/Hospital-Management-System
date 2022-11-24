<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use BotMan\BotMan\Messages\Incoming\Answer;

use Illuminate\Http\Request;



class BotManController extends Controller
{
    public function handle()
    {
        $botman = app('botman');

        // $botman->hears('I want ([0-9]+)', function ($bot, $number) {
        //     $bot->reply('You will get: '.$number);

        // });

        $botman->hears('{message}', function($botman, $message) {



            // Reply message object

            if ($message == 'hi') {
                $this->askName($botman);
            }


            else{
                $botman->reply("write 'hi' for testing...");
            }



        });

        $botman->listen();



    }

    /**
     * Place your BotMan logic here.
     */
    public function askName($botman)
    {
        $botman->ask('Hello! What is your Name?', function(Answer $answer) {

            $name = $answer->getText();

            $this->say('Nice to meet you '.$name);
        });
    }

}
