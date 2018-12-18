<?php
/**
 * Created by PhpStorm.
 * User: Posi_
 * Date: 18.12.2018
 * Time: 17:06
 */

namespace app\components;


use yii\validators\Validator;

class TaskValidator extends Validator
{
    public function init()
    {
        parent::init();
        $this->message = 'Название слишком длинное.';
    }

    public function validateAttribute($model, $attribute)
    {
        $value = $model->$attribute;
        if (strlen($value) >= 20) {
            $model->addError($attribute, $this->message);
        }
    }

    public function clientValidateAttribute($model, $attribute, $view)
    {
        $statuses = json_encode($model->$attribute);
        $message = json_encode($this->message, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        return <<< JS
                if ($statuses.length >= 20) {
                    messages.push($message);
                }
JS;
    }
}