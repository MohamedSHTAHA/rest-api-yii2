<?php

namespace app\controllers;

use app\models\Book;
use app\services\fractal\Fractal;
use app\traits\ResponseApi;
use app\transformers\BookTransformer;

class BookController extends \yii\rest\ActiveController
{
    use ResponseApi;
    
    public $enableCsrfValidation = false;

    public $modelClass = 'app\models\Book';

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

        $books = Book::find()->all();


        $fractal = Fractal::collection($books, new BookTransformer())->toArray();


        return $this->responseApi(data: $fractal);
    }


    public function actionView($id)
    {

        $book = Book::findOne($id);


        $fractal = Fractal::item($book, new BookTransformer())->toArray();

        return $this->responseApi(data: $fractal);
    }

}
