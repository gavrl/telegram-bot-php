<?php

namespace App\Commands;

use Telegram\Bot\Commands\Command;

class HelloCommand extends Command
{
    protected $name = 'hello';
    protected $pattern = '{name}?';

    public function handle()
    {
        $arguments = collect($this->arguments);

        $this->replyWithMessage(
            [
                'text' => sprintf(
                    'Привет, %s!',
                    $arguments->get('name', 'мешок с мясом')
                )
            ]
        );
    }
}