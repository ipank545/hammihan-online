<?php Pardisan\Commands\Article;

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


    public function __construct(
        $firstTitle,
        $secondTitle,
        $importantTitle,
        $summary,
        $body,
        $publishDate,
        $status_id,
        $author,
        $userId
    ){
        $this->$first_title = $firstTitle;
        $this->$second_title = $secondTitle;
        $this->$important_title = $importantTitle;
        $this->summary = $summary;
        $this->body = $body;
        $this->$publish_date = $publishDate;
        $this->status_id = $status_id;
        $this->author = $author;
        $this->$user_id = $userId;

    }





} 