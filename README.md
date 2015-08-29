# Laasti/gregwar-image-provider

A league/container service provider for gregwar/image.

## Installation

```
composer require laasti/gregwar-image-provider
```

## Usage

```php

$container = new League\Container\Container;
$container->addServiceProvider('Laasti\GregwarImageProvider\Laasti\GregwarImageProvider');
$container->add('config.gregwarImage', ['cache_dir' => 'your-cache-directory']);

$image = $container->get('Gregwar\Image\Image');
```

## Contributing

1. Fork it!
2. Create your feature branch: `git checkout -b my-new-feature`
3. Commit your changes: `git commit -am 'Add some feature'`
4. Push to the branch: `git push origin my-new-feature`
5. Submit a pull request :D

## History

See CHANGELOG.md for more information.

## Credits

Author: Sonia Marquette (@nebulousGirl)

## License

Released under the MIT License. See LICENSE.txt file.