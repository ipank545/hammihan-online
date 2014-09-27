<?php namespace Pardisan\Repositories;

use Pardisan\Models\Article;

interface TagRepositoryInterface {
    public function updateRawById($id, array $data);
    public function addTagsToArticle(Article $article, array $tags);
} 
