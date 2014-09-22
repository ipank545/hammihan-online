<?php namespace Controllers\Admin\Api\V1;

use Controllers\BaseController;
use Illuminate\Http\Request;
use Laracasts\Validation\FormValidationException;
use Pardisan\Repositories\Exceptions\RepositoryException;

class RoleController extends BaseController {

    /**
     * @var Request
     */
    protected $request;

    /**
     * @param Request $request
     */
    public function __construct(
        Request $request
    ){
        $this->request = $request;
    }

    /**
     * Store a role in db
     */
    public function store()
    {
        $input = $this->request->only('name');

        try {

            $created = $this->execute(
                'Pardisan\Commands\Role\NewCommand',
                $input
            );

            return $this->responseJson($created, 200);

        }catch (RepositoryException $e){

            return $this->responseJson(['errors' => [$e->getMessage()]],422);

        }catch (FormValidationException $e){

            return $this->responseJson(['errors' => $e->getErrors()], 422);

        }
    }
} 
