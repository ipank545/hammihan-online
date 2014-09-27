<?php namespace Pardisan\Commands\Tag; 

use Pardisan\Models\Article;

class StrListCommand
{
    public $article;
    public $tagListStr;
    public $delimiter;

    public function __construct(
        Article $article,
        $tagListStr,
        $delimiter = '،'
    ){
        $this->article = $article;
        $this->tagListStr = $tagListStr;
        $this->delimiter = $delimiter;
    }
} 
