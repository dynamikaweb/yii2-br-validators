dynamikaweb/yii2-br-validators 
====================================
[![Latest Stable Version](https://img.shields.io/github/v/release/dynamikaweb/yii2-br-validators)](https://github.com/dynamikaweb/yii2-br-validators/releases) [![Total Downloads](https://poser.pugx.org/dynamikaweb/yii2-br-validators/downloads)](https://packagist.org/packages/dynamikaweb/yii2-br-validators) [![License](https://poser.pugx.org/dynamikaweb/yii2-validators/license)](https://github.com/dynamikaweb/yii2-validators/blob/master/LICENSE) [![Codacy Badge](https://app.codacy.com/project/badge/Grade/30ccbeae82014496920d2f4f42f5b731)](https://www.codacy.com/gh/dynamikaweb/yii2-br-validators?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=dynamikaweb/yii2-br-validators&amp;utm_campaign=Badge_Grade) [![Build Test](https://scrutinizer-ci.com/g/dynamikaweb/yii2-br-validators/badges/build.png?b=master)](https://scrutinizer-ci.com/g/dynamikaweb/yii2-br-validators/) [![Latest Unstable Version](https://poser.pugx.org/dynamikaweb/yii2-br-validators/v/unstable)](https://github.com/dynamikaweb/yii2-br-validators/find/master)

About
------------
Brazilian document validator

 * Titulo de Eleitor: Número do documento eleitoral.


Installation
------------
The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```SHELL
$ composer require dynamikaweb/yii2-br-validators "*"
```

or add

```JSON
"dynamikaweb/yii2-br-validators": "*"
```

to the `require` section of your `composer.json` file.

Usage
-----
Add the rules as the following example


```php

use Yii;
use yii\base\Model;
use dynamikaweb\validators\TituloValidator;

class PersonExample extends Model
{
	public $name;
	public $titulo_eleitor;
    
	/**
	 * @return array the validation rules.
	 */
	public function rules()
	{
		return [
            		// name is required
			['name', 'required'],
			// Título Eleitoral validator
			['titulo_eleitor', TituloValidator::className()]
		];
	}
}
```
