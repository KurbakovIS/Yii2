<?php

use yii\helpers\Url;

?>

<div class="taskConteiner">
    <div class="task">
        <h4>Исполниель: <?= $model->responsible->login ?></h4>
        <div class="content-task">
            <a href="<?= Url::to(['task/one', 'id' => $model->id]) ?>">
                <p> <b>Задание:</b> <span><?= $model->name ?></span></p>
                <p><b>Описание:</b></p>
                <p><?= $model->description ?></p>
                <p><b>Дата создания:</b></p>
                <p><?= $model->date ?></p>
            </a>
        </div>
    </div>
</div>




