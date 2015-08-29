<?php

namespace Laasti\GregwarImageProvider;

use Gregwar\Image\Image;
use League\Container\ServiceProvider;

class GregwarImageProvider extends ServiceProvider
{

    protected $provides = [
        'Gregwar\Image\Image'
    ];

    public function register()
    {
        $di = $this->getContainer();
        $config = [];
        if (isset($di['config.gregwarImage']) && is_array($di['config.gregwarImage'])) {
            $config = $di['config.gregwarImage'];
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
