<?php


namespace App\GraphQL\Types;


use App\Models\Menu;
use Rebing\GraphQL\Support\Type as GraphQLType;

class MenuType extends GraphQLType {

    protected $attributes = [
        'name'          => 'Menu',
        'description'   => 'menu of restaurants',
        'model'         => Menu::class,
    ];

    public function fields(): array
    {
        return (new Menu())->fields();
    }
}