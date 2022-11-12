<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii 2 Basic Project Template</h1>
    <br>
</p>

Yii 2 Basic Project Template is a skeleton [Yii 2](http://www.yiiframework.com/) application best for
rapidly creating small projects.

The template contains the basic features including user login/logout and a contact page.
It includes all commonly used configurations that would allow you to focus on adding new
features to your application.

[![Latest Stable Version](https://img.shields.io/packagist/v/yiisoft/yii2-app-basic.svg)](https://packagist.org/packages/yiisoft/yii2-app-basic)
[![Total Downloads](https://img.shields.io/packagist/dt/yiisoft/yii2-app-basic.svg)](https://packagist.org/packages/yiisoft/yii2-app-basic)
[![build](https://github.com/yiisoft/yii2-app-basic/workflows/build/badge.svg)](https://github.com/yiisoft/yii2-app-basic/actions?query=workflow%3Abuild)

ROUTES 
-------------------

    'GET api/members' => 'member/index',
    'GET api/members/<id:\d+>' => 'member/view',
    'GET api/books' => 'book/index',
    'GET api/books/<id:\d+>' => 'book/view',
    'GET api/loans' => 'loan/index',
    'POST api/loans' => 'loan/borrow'

FRACTAL
------------
Fractal provides a presentation and transformation layer for complex data output, the like found in RESTful APIs, and works really well with JSON. Think of this as a view layer for your JSON/YAML/etc.

When building an API it is common for people to just grab stuff from the database and pass it to json_encode(). This might be passable for “trivial” APIs but if they are in use by the public, or used by mobile applications then this will quickly lead to inconsistent output.


FRACTAL HELPER FUNCTION
-------------------

    $book = Book::findOne($id);
    $fractal = Fractal::item($book, new BookTransformer())->toArray();
    ------------
    $books = Book::find()->all();
    $fractal = Fractal::collection($books, new BookTransformer())->toArray();


RESPONES  HELPER FUNCTION
-------------------

    --[  you can use function responseApi(code,message,data)   ] 

    public function actionIndex()
    {
        $books = Book::find()->all();
        $fractal = Fractal::collection($books, new BookTransformer())->toArray();
        return $this->responseApi( 200 , 'Success' ,$fractal);
    }