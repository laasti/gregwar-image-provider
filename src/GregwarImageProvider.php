<?php

namespace Laasti\GregwarImageProvider;

use Gregwar\Image\Image;
use League\Container\ServiceProvider\AbstractServiceProvider;

class GregwarImageProvider extends AbstractServiceProvider
{

    protected $provides = [
        'Gregwar\Image\Image'
    ];

    public function register()
    {
        $di = $this->getContainer();
        $config = [];
        if (isset($di->get('config')['gregwarImage']) && is_array($di->get('config')['gregwarImage'])) {
            $config = $di->get('config')['gregwarImage'];
        }

        $di->add('Gregwar\Image\Image', function($filepath = null, $w = null, $h = null) use ($config) {
            $image = new Image($filepath, $w, $h);
            if (isset($config['cache_dir'])) {
                $image->setCacheDir($config['cache_dir']);
            }
            return $image;
        });
    }

}
