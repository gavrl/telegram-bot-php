<?php

require 'bootstrap.php';

//telegram()->setWebhook(['url' => env('TELEGRAM_WEBHOOK')]);
telegram()->getAccessToken();

echo "Setup the Telegram webhook!";