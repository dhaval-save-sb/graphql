<?php


namespace App\GraphQL\Queries;


use App\Services\MenuService;
use Closure;
use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class MenuQuery extends Query {

    private $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    protected $attributes = [
        'name' => 'Menu',
        'description' => 'Query to Restaurant data and relations data (coverageArea, address).'
    ];
    public function type(): Type {

        return Type::listOf(GraphQL::type('Menu'));
    }

    public function args(): array
    {
        return [
            'id' => ['name' => 'id', 'type' => Type::string()],
            'name' => ['name' => 'name', 'type' => Type::string()],

        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $fields = $resolveInfo->getFieldSelection($depth = 3);

        return $this->menuService->find($args, $fields);
    }
}