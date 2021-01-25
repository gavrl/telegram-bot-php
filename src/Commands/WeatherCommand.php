<?php

namespace App\Commands;

use Telegram\Bot\Commands\Command;

class WeatherCommand extends Command
{
    protected $name = 'weather';

    public function handle()
    {
        $this->replyWithMessage(
            [
                'text' => 'В Ростове-на-Дону грязь.'
            ]
        );
    }
}