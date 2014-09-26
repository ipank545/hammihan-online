<?php namespace Pardisan\Commands\Article;

class NewCommand {

    public $first_title;
    public $second_title;
    public $important_title;
    public $summary;
    public $body;
    public $publish_date;
    public $status_id;
    public $author;
    public $user_id;
    public $category;


    public function __construct(
        $first_title,
        $second_title,
        $important_title,
        $summary,
        $body,
        $publish_date,
        $status_id = null,
        $author,
        $user_id,
        $category_id = null
    ){
        $this->first_title = $first_title;
        $this->second_title = $second_title;
        $this->important_title = $important_title;
        $this->summary = $summary;
        $this->body = $body;
        $this->publish_date = $publish_date;
        $this->status_id = $status_id;
        $this->author = $author;
        $this->user_id = $user_id;
        $this->category_id = $category_id;

    }





} 
