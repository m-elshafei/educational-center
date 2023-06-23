<?php
namespace App\Traits;
trait ApiResponse
{
    public function apiresponse($data, $status = '200', $msg = 'success')
    {
        $array = [
            'data' => $data,
            'status' => $status,
            'msg' => $msg,
        ];
        return response($array, $status ,[$msg]);
    }
}