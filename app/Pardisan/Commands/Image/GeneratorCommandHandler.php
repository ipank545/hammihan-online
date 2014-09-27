<?php namespace Pardisan\Commands\Image; 

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Laracasts\Commander\CommandHandler;
use Pardisan\Commands\AbstractCommandHandler;
use Pardisan\Commands\Image\Exceptions\ImageNotFoundException;
use Pardisan\Commands\Image\Exceptions\InvalidRequestException;
use Symfony\Component\Finder\Finder;

class GeneratorCommandHandler extends AbstractCommandHandler implements CommandHandler
{
    protected $imageManager;
    protected $fileSystem;
    protected $request;
    protected $type;

    protected static $types = [
        '_pardisan_highlighted_'       =>  [
            'width'      =>  '253',
            'height'    =>  '152',
            'method'    =>  'fit'
        ],
        '_pardisan_thumb_'             => [
            'width'     =>  '64',
            'height'    =>  '64',
            'method'    =>  'fit'
        ],
        '_pardisan_slide_'             => [
            'width'     =>  '555',
            'height'    =>  '278',
            'method'    =>  'fit'
        ]
    ];

    public function __construct(
        ImageManager $imageManager,
        Finder $fileSystem,
        Request $request
    ){
        $this->imageManager = $imageManager;
        $this->fileSystem = $fileSystem;
        $this->request = $request;
    }

    /**
     * Handle the command
     *
     * @param $command
     * @return mixed
     */
    public function handle($command)
    {
        $this->setCommand($command);
        return $this->doGenerate();
    }

    protected function doGenerate()
    {
        $originalFile = $this->getOriginalFileAddress($this->command->address);
        $this->checkOriginal($originalFile);
        $img = $this->imageManager->make($originalFile);
        $type = self::$types[$this->type];
        $img->{$type['method']}($type['width'], $type['height']);
        $img->save($this->command->address);
        return $img;
    }

    protected function checkOriginal($originalFile)
    {
        if (! file_exists($originalFile)){
            throw new ImageNotFoundException("Image not found");
        }
    }

    protected function getOriginalFileAddress($rawName)
    {
        foreach(self::$types as $type => $values){
            $replaced = str_replace($type, '', $rawName);
            if ( $replaced != $rawName){
                $this->type = $type;
                return $replaced;
            }
        }
        throw new InvalidRequestException("No available types found for this iamge");
    }
}
