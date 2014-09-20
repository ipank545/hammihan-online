<?php namespace Pardisan\Repositories\Exceptions;

use Illuminate\Database\Eloquent\Model;

interface ArticleRepositoryInterface {

    public function create(array $data);

    public function edit($id);

    public function delete($id);

    public function showById($id);

    public function showAll();


} 