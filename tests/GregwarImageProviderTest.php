<?php

namespace Laasti\GregwarImageProvider\Tests;

use Gregwar\Image\Image;
use Laasti\GregwarImageProvider\GregwarImageProvider;
use League\Container\Container;

class GregwarImageProviderTest extends \PHPUnit_Framework_TestCase
{
    public function testNoConfig()
    {
        $container = new Container();
        $container->addServiceProvider(new GregwarImageProvider);

        $this->assertTrue($container->get('Gregwar\Image\Image') instanceof Image);
    }

    public function testProvider()
    {
        $container = new Container();
        $container->add('config.gregwarImage', [
            'cache_dir' => __DIR__.'/cache'
        ]);
        $container->addServiceProvider(new GregwarImageProvider);
        $image = $container->get('Gregwar\Image\Image');
        $cache = \PHPUnit_Framework_Assert::readAttribute($image, 'cache');
        $this->assertTrue(\PHPUnit_Framework_Assert::readAttribute($cache, 'cacheDirectory') === __DIR__.'/cache');
    }

}
