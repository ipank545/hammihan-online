<?php namespace Pardisan\Commands\Article;

class NewCommand {

    public $first_title;
    public $second_title;
    public $important_title;
    public $summary;
    public $body;
    public $publish_date;
    public $state_id;
    public $author;
    public $user_id;
    public $category;
    public $tags;
    public $large_image;
    public $thumb_image;
    public $commentable;
    public $highlighted;


    public function __construct(
        $first_title,
        $second_title,
        $important_title,
        $summary,
        $body,
        $publish_date,
        $state_id = null,
        $author,
        $user_id,
        $category_id = null,
        $tags,
        $thumb_image,
        $large_image,
        $commentable = null,
        $highlighted = null
    ){
        $this->first_title = $first_title;
        $this->second_title = $second_title;
        $this->important_title = $important_title;
        $this->summary = $summary;
        $this->body = $body;
        $this->publish_date = $publish_date;
        $this->state_id = $state_id;
        $this->author = $author;
        $this->user_id = $user_id;
        $this->category_id = $category_id;
        $this->thumb_image = $thumb_image;
        $this->large_image = $large_image;
        $this->category_id = $category_id;
        $this->tags = $tags;
        $this->highlighted = (boolean) $highlighted;
        $this->commentable = (boolean) $commentable;
    }





} 
