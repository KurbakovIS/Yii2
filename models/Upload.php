<?php
/**
 * Created by PhpStorm.
 * User: Posi_
 * Date: 20.01.2019
 * Time: 13:14
 */

namespace app\models;


use yii\base\Model;
use yii\imagine\Image;
use yii\web\UploadedFile;

class Upload extends Model
{
    public $title;
    public $content;
    /**@var UploadedFile */
    public $file;

    public function rules()
    {
        return [
            [['title', 'content'], 'safe'],
            [['file'], 'file', 'extensions' => 'png, jpg']
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $filename = $this->file->getBaseName() . "." . $this->file->getExtension();
            $filePath = \Yii::getAlias("@img/{$filename}");
            $this->file->saveAs($filePath);

            Image::thumbnail($filePath, 100, 100)
                ->save(\Yii::getAlias("@img/small/{$filename}"));
        }

    }
}