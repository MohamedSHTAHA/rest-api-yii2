<?php

namespace app\transformers;

use app\models\Book;
use app\models\Member;
use League\Fractal\TransformerAbstract;
use Yii;

class BookTransformer extends TransformerAbstract
{
    public function transform(Book $book)
    {
        return [
            'id' => $book->id,
            'name'=>$book->name,
            'author'=>$book->author,
            'release_year'=>$book->release_year,
            'is_available_for_loan'=>$book->is_available_for_loan ? 'yesss' : 'noooo',
        ];
        
    }
}