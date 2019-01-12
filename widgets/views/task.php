<?php

use yii\helpers\Url;

?>

<div class="taskConteiner">
    <div class="task">
        <h4>Исполниель: <?= $model->responsible->login ?></h4>
        <div class="content-task">
            <a href="<?= Url::to(['task/one', 'id' => $model->id]) ?>">
                <p> Задание: <span><b><?= $model->name ?></b></span></p>
                <p>Описание:</p>
                <p><?= $model->description ?></p>
            </a>
        </div>
    </div>
</div>




