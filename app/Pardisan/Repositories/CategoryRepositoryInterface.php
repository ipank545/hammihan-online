<?php namespace Pardisan\Repositories; 

use Pardisan\Models\User;

interface CategoryRepositoryInterface {
    public function getPaginated($int);

    public function createRaw(array $data);

    public function updateRawById($id, array $array);

    public function getAll();

    public function getUserCategories(User $user);

    public function addCategoriesToUser(User $user, array $categories);

    public function loadUserAvailableCats(User $user);

    public function loadCatsByName(array $cats);

}
