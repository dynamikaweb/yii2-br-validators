<?php

namespace dynamikaweb\validators;

use yii\web\AssetBundle;

class ValidationAsset extends AssetBundle
{
    public $sourcePath = '@dynamikaweb/validators/assets';
    public $js = [
        'dynamikaweb.validator.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
