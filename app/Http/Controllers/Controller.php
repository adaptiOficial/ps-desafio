<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Log;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function doLogs($variable)
    {
        $logMessage = 'O usuário ' . '[' . auth()->id() . '] - ' . auth()->user()->name . ' ' . $variable['text'] . ' ' . '[' . $variable['id'] . '] - ' . $variable['name'];
        Log::create(['log' => $logMessage, 'category' => $variable['category']]);
    } //Cria os logs
}
