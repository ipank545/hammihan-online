<?php namespace Pardisan\Repositories;


use Pardisan\Models\Article;
use Pardisan\Models\Category;


interface ArticleRepositoryInterface {

    public function createRaw(array $data);

    public function editById($id, $data);

    public function bulkDelete(array $deleteables);

    /*public function showById($id);*/

    public function getAll();
    public function getGuestCatArticles($catName, $count = 1);
    public function guestArticlesForCat(Category $cat, $count = 1);
    public function loadArticlesWithLargeImage($count = 3);
    public function randomHighlighted();
} 
