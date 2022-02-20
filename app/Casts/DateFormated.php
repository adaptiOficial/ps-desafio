<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use DateTime;

class DateFormated implements CastsAttributes
{
    /**
     * Retorna uma data formatada de acordo com a linguagem da aplicação.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return mixed
     */
    public function get($model, string $key, $value, array $attributes)
    {
        $dateTime = new DateTime($value);
        $dateTimeFormated = null;

        switch (config('app.locale')) {

            case 'en': // US format
                $date = $dateTime->format('m/d/Y');
                $time = $dateTime->format('h:i A');

                $dateTimeFormated = $date . ' at ' . $time;
                break;

            default: // Brazilian format
                $date = $dateTime->format('d/m/Y');
                $time = $dateTime->format('H:i');

                $dateTimeFormated = $date . ' ás ' . $time;
                break;
        }

        return $dateTimeFormated;
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return mixed
     */
    public function set($model, string $key, $value, array $attributes)
    {
        return $value;
    }
}
