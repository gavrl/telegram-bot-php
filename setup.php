<?php

require 'bootstrap.php';

telegram()->setWebhook(['url' => env('TELEGRAM_WEBHOOK')]);

echo "Setup the Telegram webhook!";

echo print_r(telegram()->getUpdates(), true);