<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function apiSuccess($data = [], $msg = '', $code = 200)
    {
        return [
            'code' => $code,
            'data' => $data,
            'message' => $msg,
        ];
    }

    public function apiFaild($msg = '', $code = 300)
    {
        return [
            'code' => $code,
            'message' => $msg,
        ];
    }
}
