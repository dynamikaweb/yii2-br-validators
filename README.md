dynamikaweb/yii2-validators 
====================================

Brazilian document validator

*Titulo de Eleitor: Número do documento eleitoral.

[![Latest Stable Version](https://img.shields.io/github/v/release/dynamikaweb/yii2-validators)](https://packagist.org/packages/dynamikaweb/yii2-validators) [![Total Downloads](https://poser.pugx.org/dynamikaweb/yii2-validators/downloads)](https://packagist.org/packages/dynamikaweb/yii2-validators) [![License](https://poser.pugx.org/dynamikaweb/yii2-validators/license)](https://github.com/dynamikaweb/yii2-validators/blob/master/LICENSE)[![Codacy Badge](https://app.codacy.com/project/badge/Grade/4c3e83068e31436f916c7bb3e5a8ff57)](https://www.codacy.com/gh/dynamikaweb/yii2-validators?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=dynamikaweb/yii2-validators&amp;utm_campaign=Badge_Grade) [![Build Test](https://scrutinizer-ci.com/g/dynamikaweb/yii2-validators/badges/build.png?b=master)](https://scrutinizer-ci.com/g/dynamikaweb/yii2-validators/) [![Latest Unstable Version](https://poser.pugx.org/dynamikaweb/yii2-validators/v/unstable)](https://packagist.org/packages/dynamikaweb/yii2-validators)

Installation
------------
The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```SHELL
$ composer require dynamikaweb/yii2-validators "*"
```

or add

```JSON
"dynamikaweb/yii2-validators": "*"
```

to the `require` section of your `composer.json` file.

Usage
-----
Add the rules as the following example


```php

use Yii;
use yii\base\Model;
use dynamikaweb\validator\TituloValidator;

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
