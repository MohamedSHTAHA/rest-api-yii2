<?php

namespace app\traits;

use Yii;


trait ResponseApi 
{
    public function responseApi(int $code = 200,string $message = '',array|object $data = [])
    {
        Yii::$app->response->statusCode = $code;

        $response['status'] = in_array($code, [200, 201, 202]) ? true : false;
        $response['message'] = $message;
        $response['data'] = $data;
        return $this->asJson($response);

    }
}
