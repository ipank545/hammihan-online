<?php namespace Pardisan\Repositories\Exceptions;


interface ArticleRepositoryInterface {

  public function createRaw(array $data);

  public function editById($id, $data);

  public function bulkDelete(array $deleteables);

  ///*public function showById($id);*/

  public function getAll();



}