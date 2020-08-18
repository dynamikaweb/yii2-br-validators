<?php

namespace dynamikaweb\validators;

use Yii;
use yii\helpers\Json;

class TituloValidator extends DocumentValidator
{

    public function init() 
    {
        parent::init();
        if ($this->message === null) {
            $this->message = Yii::t('yii', "{attribute} is invalid.");
        }
    }
    
    protected function validateValue($value)
    {
        $valid = true;
        $input = preg_replace('/[^\d]/', '', $value);

        $uf = substr($input, -4, 2);
        
        if (
            ((mb_strlen($input) < 5) || (mb_strlen($input) > 13)) ||
            (str_repeat($input[1], mb_strlen($input)) == $input) ||
            ($uf < 1 || $uf > 28)
        ) {
            $valid = false;
        }

        if ($valid) {
            $dv = substr($input, -2);
            $sequencia = substr($input, 0, -4);
            $base = 2;

            for ($i = 0; $i < 2; $i++) {
                $fator = 9;
                $soma = 0;

                for ($j = (mb_strlen($sequencia) - 1); $j > -1; $j--) {
                    $soma += $sequencia[$j] * $fator;

                    if ($fator == $base) {
                        $fator = 10;
                    }

                    $fator--;
                }

                $digito = $soma % 11;
                if (($digito == 0) and ($uf < 3)) {
                    $digito = 1;
                } elseif ($digito == 10) {
                    $digito = 0;
                }

                if ($dv[$i] != $digito) {
                    $valid = false;
                }

                switch ($i) {
                    case '0':
                        $sequencia = $uf . $digito;
                        break;
                }
            }
        }
        return ($valid) ? [] : [$this->message, []];
    }

    public function clientValidateAttribute($object, $attribute, $view)
    {
        $options = [
            'message' => Yii::$app->getI18n()->format($this->message, [
                'attribute' => $object->getAttributeLabel($attribute),
            ], Yii::$app->language)
        ];

        if ($this->skipOnEmpty) {
            $options['skipOnEmpty'] = 1;
        }

        ValidationAsset::register($view);
        return 'dynamikaweb.validation.titulo(value, messages, ' . Json::encode($options) . ');';
    }
    
}