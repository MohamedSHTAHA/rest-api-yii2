<?php

namespace app\transformers;

use app\models\Member;
use League\Fractal\TransformerAbstract;
use Yii;

class MemberTransformer extends TransformerAbstract
{
    public function transform(Member $member)
    {
        return [
            'id' => $member->id,
            'name'=>$member->name,
        ];
    }
}