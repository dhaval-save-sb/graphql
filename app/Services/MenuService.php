<?php


namespace App\Services;


use App\Repositories\MenuRepositoriesInterface;


class MenuService {

    const SCHEMA_NAME = 'menus';
    private $pdvRepository;

    public function __construct(MenuRepositoriesInterface $pdvRepository)
    {
        $this->pdvRepository = $pdvRepository;
    }

    public function create(array $args)
    {
        return $this->pdvRepository->create($args);
    }

    public function find(array $args, array $selects)
    {
        return $this->pdvRepository->find($args, $selects);
    }
}