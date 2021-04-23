<?php


namespace App\Repositories;


interface MenuRepositoriesInterface {

    public function create(array $args);
    public function update(array $args);
    public function find(array $args, array $selects);
}