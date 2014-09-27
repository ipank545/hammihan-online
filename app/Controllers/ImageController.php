<?php namespace Controllers; 

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Pardisan\Commands\Image\Exceptions\ImageNotFoundException;
use Pardisan\Commands\Image\Exceptions\InvalidRequestException;

class ImageController extends BaseController
{
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
     * @param $address
     */
    public function handleImage($address)
    {
        try {
            return $this->execute(
                'Pardisan\Commands\Image\GeneratorCommand',
                ['address' => $address]
            )->response(); // intervention response
        }catch (ImageNotFoundException $e){
            App::abort(404);
        }catch(InvalidRequestException $e){
            App::abort(404);
        }
    }
} 
