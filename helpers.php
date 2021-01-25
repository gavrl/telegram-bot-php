<?php

use Telegram\Bot\Api;
use Telegram\Bot\Exceptions\TelegramSDKException;

/**
 * @return Api
 * @throws TelegramSDKException
 */
function telegram(): Api
{
    return new Api(
        env('TELEGRAM_BOT_TOKEN')
    );
}