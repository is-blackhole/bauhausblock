Bauhaus Block - Rendering of block elements
---

[![Latest Stable Version](https://poser.pugx.org/krafthaus/bauhausblock/v/stable.png)](https://packagist.org/packages/krafthaus/bauhausblock)
[![Latest Unstable Version](https://poser.pugx.org/krafthaus/bauhausblock/v/unstable.png)](https://packagist.org/packages/krafthaus/bauhausblock)
[![Total Downloads](https://poser.pugx.org/krafthaus/bauhausblock/downloads.png)](https://packagist.org/packages/krafthaus/bauhausblock)
[![License](https://poser.pugx.org/krafthaus/bauhausblock/license.png)](https://packagist.org/packages/krafthaus/bauhausblock)

Handle rendering of block element. A block is a small unit with its own logic and templates. A block can be inserted anywhere in a current laravel template.

Installation
---
Add bauhaus block to your composer.json file:
```
"require": {
	"krafthaus/bauhausblock": "dev-master"
}
```

Use composer to install this package
```
$ composer update
```

Register the package
---
```php
'providers' => array(
	'KraftHaus\BauhausBlock\BauhausBlockServiceProvider'
),

'aliases' => array(
	'Block' => 'KraftHaus\BauhausBlock\Facades\Block'
)
```

Add the `blocks` folder to the `app/` directory and put the following line in your composer.json file:
```
"autoload": {
	"classmap": [
		"app/blocks"
	]
}
```
Then run `$ composer dump-autoload` and you're done.

Your first block
---
This quick tutorial explains how to create a RSS reader block.
A block is nothing more than a class defining properties that renders a block partial.

Every block you create for your project should be located in the `app/blocks` folder. So lets create an `RssBlock.php` file in that folder with the following contents:
```php
<?php

use KraftHaus\BauhausBlock\Block;
use KraftHaus\BauhausBlock\Resolver\OptionResolver;

class RssBlock extends Block
{

    /**
     * Configure the block with this method.
     * Use the OptionResolver instance to set or get options for this block.
     */
	public function configure(OptionResolver $resolver)
	{
		$resolver
			->set('url',  'https://github.com/krafthaus/bauhaus/commits/master.atom')
			->set('view', 'blocks.rss');
	}

    /**
     * This method is called every time a block is rendered and used to
     * initialize the block with data.
     */
	public function execute()
	{
		$options = $this->getOptionResolver();

		$content = file_get_contents($options->get('url'));
		$feed    = simplexml_load_string($content);

		$options->set('feed', $feed->entry);

		return $this;
	}

}
```

Create the view for this block at `app/views/blocks/rss` with the following contents:
```php
<ul>
    @foreach ($options->feed as $item)
        <li>{{ $item->title }}</li>
    @endforeach
</ul>
```

To render the block just call:
```php
{{ Block::render('rss') }}
```

That's it!

Support
---
Have a bug? Please create an issue here on GitHub that conforms with [necolas's guidelines](https://github.com/necolas/issue-guidelines).

License
---
This package is available under the [MIT license](LICENSE).