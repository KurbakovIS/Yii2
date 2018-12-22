<?php
/**
 * Created by PhpStorm.
 * User: Posi_
 * Date: 17.12.2018
 * Time: 0:02
 */

namespace app\models;


use app\components\TaskValidator;
use yii\base\Model;

class Task extends Model
{
    public $id;
    public $name;
    public $content;
    public $condition;

    public function rules()
    {
        return [
            [['id', 'name', 'content', 'condition'], 'required'],
            ['name',TaskValidator::class]
        ];
    }

    public function getId()
    {
        return $this->id;
    }

}