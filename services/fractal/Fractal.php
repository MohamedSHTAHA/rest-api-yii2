<?php

namespace app\services\fractal;

use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use League\Fractal\TransformerAbstract;
use Yii;


class Fractal 
{
    public static function collection(object|array $data ,TransformerAbstract $transformer)
    {
        $manager = new Manager();

        $resource = new Collection($data,$transformer );


        return $manager =  $manager->setSerializer(new DataArraySerializer())->createData($resource);

    }

    public static function item(object|array $data ,TransformerAbstract $transformer)
    {
        $manager = new Manager();

        $resource = new Item($data,$transformer );

        return  $manager =  $manager->setSerializer(new DataArraySerializer())->createData($resource);

    }
}
