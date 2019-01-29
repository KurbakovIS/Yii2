<?php

use \yii\widgets\ActiveForm;
use \yii\helpers\Url;
use \yii\helpers\Html;

//var_dump($model->taskComments);
\app\assets\CalendarAsset::register($this);
?>

<div class="taskCustom">
    <div class="taskMain">
        <?php $form = ActiveForm::begin(['action' => Url::to(['task/save', 'id' => $model->id])]); ?>
        <?php echo $form->field($model, 'name')->textInput(); ?>
        <div class="row">
            <div class="col-lg-4">
                <?php echo $form->field($model, 'status')
                    ->dropDownList($statusesList) ?>
            </div>
            <div class="col-lg-4">
                <?php echo $form->field($model, 'responsible_id')
                    ->dropDownList($userList) ?>
            </div>
            <div class="col-lg-4">
                <?php echo $form->field($model, 'date')
                    ->textInput(['type' => 'datetime']) ?>
            </div>
        </div>
        <div>
            <?php echo $form->field($model, 'description')
                ->textarea() ?>
        </div>
        <?= Html::submitButton("Сохранить", ['class' => 'btn btn-success']) ?>
        <?php ActiveForm::end() ?>

    </div>
    <div class="attachments">
        <h3>Вложения</h3>
        <?php $form = ActiveForm::begin([
            'action' => Url::to(['task/add-attachment']),
            'options' => ['class' => "form-inline"]
        ]);
        ?>
        <?= $form->field($taskAttachmentForm, 'taskId')->hiddenInput(['value' => $model->id])->label(false); ?>
        <?= $form->field($taskAttachmentForm, 'file')->fileInput(); ?>
        <?= Html::submitButton("Добавить", ['class' => 'btn btn-default']); ?>
        <? ActiveForm::end() ?>
        <hr>
        <div class="attachmentsHistory">
            <? foreach ($model->taskAttachments as $file): ?>
                <a href="/img/tasks/<? $file->path ?>">
                    <img src="/img/tasks/small/<? $file->path ?>" alt="">
                </a>
            <? endforeach; ?>
        </div>
    </div>
    <div class="taskComments">
        <div class="comments">
            <h3>Комментарии</h3>
            <?php $form = ActiveForm::begin(['action' => Url::to(['task/add-comment'])]); ?>
            <?= $form->field($taskComments, 'user_id')->hiddenInput(['value' => $userId])
                ->label(false); ?>
            <?= $form->field($taskComments, 'task_id')->hiddenInput(['value' => $model->id])
                ->label(false); ?>
            <?= $form->field($taskComments, 'content')->textInput(); ?>
            <?= Html::submitButton("Добавить", ['class' => 'btn btn-success']) ?>
            <?php ActiveForm::end() ?>
            <hr>
            <div class="commentHistory">
                <? foreach ($model->taskComments as $comment): ?>
                    <p><b><?= $comment->user->login ?></b>: <?= $comment->content ?></p>
                <? endforeach; ?>
            </div>
        </div>
    </div>
</div>