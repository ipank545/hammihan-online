<?php namespace Pardisan\Repositories\Exceptions;

use Illuminate\Database\Eloquent\Model;

interface ArticleRepositoryInterface {

    public function createRaw(array $data);

    public function editById($id, $data);

    public function deleteById($id);

    /*public function showById($id);

    public function showAll();*/




} 