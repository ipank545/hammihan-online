<?php namespace Pardisan\Repositories; 

interface CategoryRepositoryInterface {
    public function getPaginated($int);

    public function createRaw(array $data);

    public function updateRawById($id, array $array);
}
