<?php namespace Controllers;

use Illuminate\Support\Facades\App;
use Laracasts\Commander\CommanderTrait;
use Laracasts\Validation\FormValidationException;

class ArticleController extends BaseController {

    public function store(
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

        try {
                // some execute
        } catch (FormValidationException $e) {

        }

    }
} 