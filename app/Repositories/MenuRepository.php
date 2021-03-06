<?php

namespace App\Repositories;

use App\Models\Menu;
use Illuminate\Support\Collection;
use Jenssegers\Mongodb\Eloquent\Builder;

class MenuRepository implements MenuRepositoriesInterface {

    public function create(array $args) : Menu {
        return Menu::create($args);
    }

    public function update(array $args) : Menu{
        $menu = Menu::where('id', $args['id']);

        if ($menu->exists()) {
            $menu->update($args, ['upsert' => true]);

            return $menu->first();
        }
    }

    public function find(array $args, array $selects) : Collection
    {
        $query = $this->makeSelect(Menu::query(), $selects);
       // $query = $this->makeWhere($query, $args);

        return $query->get();
    }

    private function makeSelect(Builder $query, array $selects) : Builder
    {
        $selectUsed = [];

        foreach ($selects as $select => $value) {
            if (is_array($value)) {
                array_push($selectUsed, $select);

                foreach ($value as $fieldDepthKey => $fieldDepthValue) {
                    $query->addSelect("$select.$fieldDepthKey");
                }
            }

            !in_array($select, $selectUsed) ? $query->addSelect($select) : null;
        }

        return $query;
    }

//    private function makeWhere(Builder $query, array $args) : Builder
//    {
//        if (!empty($args)) {
//            if (array_key_exists("id",$args)) {
//                $id = $args['id'];
//                $query->where('id', $id);
//            }
//
//            if (array_key_exists("lng",$args) && array_key_exists("lat",$args)) {
//                $query->where('address', 'nearSphere', [
//                    '$geometry' => [
//                        'type' => 'Point',
//                        'coordinates' => [
//                            (float) $args['lng'],
//                            (float) $args['lat']
//                        ],
//                    ],
//                    '$maxDistance' => 10000000,
//                ]);
//            }
//        }
//
//        return $query;
//    }
}