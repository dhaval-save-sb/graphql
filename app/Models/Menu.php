<?php


namespace App\Models;


use App\Traits\Uuids;
use GraphQL\Type\Definition\Type;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Rebing\GraphQL\Support\Facades\GraphQL;

class Menu extends Eloquent{

    use Uuids;
    protected $connection = 'mongodb';
    protected $collection = 'menus';

    protected $fillable = ['id', 'name', 'restaurant_id','ingredients'];

    public $timestamps = false;
    public $incrementing = false;

    public function fields() : array
    {
        return [
            'id' => [
                'type' => Type::string(),
                'description' => 'The identifier of the menu',
            ],

            'name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The owner name of menu',
            ],

            'restaurant_id' => [
                'name' => 'restaurant_id',
                'description' => 'The address of restaurant',
                'type' => Type::listOf(
                        Type::string()
                ),
                'is_relation' => false
            ],
            'ingredients'=>[
                'name'=>'ingredients',
                'type' => Type::nonNull(
                    Type::listOf(
                        Type::string()
                    )
                ),
            ]
        ];
    }

}