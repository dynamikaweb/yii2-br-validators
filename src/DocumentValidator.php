<?php

namespace dynamikaweb\validators;

use yii\validators\Validator;

class DocumentValidator extends Validator {

    /**
     * @var bool whether the attribute value can removed non digits characteres. Defaults to false.
     */
    public $digitsOnly = false;

    /**
     * @inheritdoc
     */
    public function validateAttribute($model, $attribute)
    {
        if ($this->digitsOnly) {
            $model->$attribute = preg_replace('/\D+/', '', $model->$attribute);
        }
        parent::validateAttribute($model, $attribute);
    }

}
