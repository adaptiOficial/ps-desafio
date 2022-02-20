<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;

class LogController extends Controller
{

    private $logs;

    public function __construct(Log $logs)
    {
        $this->logs = $logs;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logs = $this->logs->all();
        return view('admin.log.index', compact('logs'));
    }
}
