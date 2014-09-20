<?php Pardisan\Commands\Article;

class NewArticleCommand {

    public $firstTitle;
    public $secondTitle;
    public $importantTitle;
    public $summary;
    public $body;
    public $publisheDate;
    public $status_id;
    public $author;
    public $userId;
    // how about slug_url???

    public function __construct(
        $firstTitle,
        $secondTitle,
        $importantTitle,
        $summary,
        $body,
        $publisheDate,
        $status_id,
        $author,
        $userId
    ){
        $this->firstTitle = $firstTitle;
        $this->secondTitle = $secondTitle;
        $this->importantTitle = $importantTitle;
        $this->summary = $summary;
        $this->body = $body;
        $this->publisheDate = $publisheDate;
        $this->status_id = $status_id;
        $this->author = $author;
        $this->userId = $userId;

    }





} 