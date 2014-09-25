<?php namespace Pardisan\Repositories; 

interface CategoryRepositoryInterface {
    public function getPaginated($int);

    public function createRaw($data);

    public function updateRawById($id, $array);
}
