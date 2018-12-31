<style>
    p,h3{
        margin: 0;
        padding: 0;
    }
    .task {
        max-width: 250px;
        max-height: 250px;
        background-color: grey;
        border: 1px solid black;
        padding: 5px;
        margin-top: 10px;

    }
    .task h3{
        color: white;
        text-align: center;
        margin-bottom: 5px;
    }
    .content-task {
        background-color: white;
        padding-left: 2px;
    }
</style>

<?php foreach ($tasks as $task): ?>

    <?php foreach ($users as $user): ?>
        <div class="task">
            <h3><?= $task['name'] ?></h3>
            <div class="content-task">
                <p> Исполнитель: <span><b><?=$user['name']?></b></span></p>
                <p>Описание:</p>
                <p><?=$task['description']?></p>
            </div>
        </div>
    <?php endforeach; ?>
<?php endforeach; ?>


