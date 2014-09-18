<?php namespace Controllers;

use Illuminate\Support\Facades\App;
use Laracasts\Commander\CommanderTrait;
use Laracasts\Validation\FormValidationException;
use Pardisan\Repositories\LogRepositoryInterface;
use Pardisan\Repositories\Exceptions\NotFoundException;

class LogController extends BaseController {

    use CommanderTrait;
    protected $logRepo;

    public function __construct(LogRepositoryInterface $logRepo)
    {
        $this->logRepo = $logRepo;
    }

    public function getLog($message){
        try {
            $this->execute('Pardisan\Commands\NewLogCommand', ['message' => $message]);
        }catch (FormValidationException $e){
            return $e->getMessage();
        }
    }

    public function findLog($id)
    {
        try {
            return $this->logRepo->findById($id);

        }catch (NotFoundException $e){
            App::abort(404);
        }
    }
}