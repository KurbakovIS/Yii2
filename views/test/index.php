<?php
/**
 * @var \app\models\tables\Tasks $model
 */
$form = \yii\widgets\ActiveForm::begin(['id' => 'taskForm']);


echo $form->field($model, 'name')->textInput();
echo $form->field($model,'description')->textarea();
echo \yii\helpers\Html::submitButton('Go',['class'=>['btn btn-success']]);

\yii\widgets\ActiveForm::end();