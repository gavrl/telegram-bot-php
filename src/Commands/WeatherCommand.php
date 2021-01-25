<?php

namespace App\Commands;

use DateTime;
use Exception;
use Telegram\Bot\Commands\Command;

class WeatherCommand extends Command
{
    protected $name = 'weather';

    /**
     * @throws Exception
     */
    public function handle()
    {
        list($data, $currentTime) = $this->getWeather();

        $this->replyWithMessage(
            [
                'text' => "Погода в городе $data->name\n" .
                    'Дата: ' . (new DateTime())
                        ->setTimestamp($currentTime)
                        ->modify("+3 hour")
                        ->format("d-m-Y H:m"). "\n" .
                    ucwords($data->weather[0]->description) . "\n" .
                    'Минимальная температура: ' . $data->main->temp_min . " °C\n" .
                    'Максимальная температура: ' . $data->main->temp_max . " °C\n" .
                    'Влажность: ' . $data->main->humidity . "\n" .
                    'Ветер: ' . $data->wind->speed . " км/ч"
            ]
        );


    }

    /**
     * @return array
     */
    private function getWeather(): array
    {
        $request = curl_init();

        curl_setopt($request, CURLOPT_HEADER, 0);
        curl_setopt($request, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt(
            $request,
            CURLOPT_URL,
            sprintf(
                env('WEATHER_API_URL'),
                env('ROSTOV_ON_DON_ID'),
                env('WEATHER_API_KEY')
            )
        );
        curl_setopt($request, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($request, CURLOPT_VERBOSE, 0);
        curl_setopt($request, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($request);

        curl_close($request);
        $data = json_decode($response);
        $currentTime = time();

        return [$data, $currentTime];
    }
}