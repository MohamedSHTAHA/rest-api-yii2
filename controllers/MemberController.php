<?php

namespace app\controllers;

use app\models\Member;
use app\services\fractal\Fractal;
use app\traits\ResponseApi;
use app\transformers\MemberTransformer;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Serializer\ArraySerializer;

class MemberController extends \yii\rest\ActiveController
{
    use ResponseApi;
    public $modelClass = 'app\models\Member';
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            // 'captcha' => [
            //     'class' => 'yii\captcha\CaptchaAction',
            //     'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            // ],
        ];
    }
    public function actionIndex()
    {

        $members = Member::find()->all();


        $fractal = Fractal::collection($members, new MemberTransformer())->toArray();


        return $this->responseApi(data: $fractal);
    }


    public function actionView($id)
    {

        $member = Member::findOne($id);


        $fractal = Fractal::item($member, new MemberTransformer())->toArray();

        return $this->responseApi(data: $fractal);
    }
}
