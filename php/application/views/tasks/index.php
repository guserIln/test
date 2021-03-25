<div class="container">
    <div>
        <h3>Добавить задачу</h3>
        <form action="index.php?url=tasks/addTask" method="POST">
            <label>Название</label>
            <input type="text" name="name" value="" required />
            <label>Email</label>
            <input type="text" name="email" value="" required />
            <label>Текст</label>
            <input type="text" name="ztext" value="" />
            <input type="submit" name="submit_add_task" value="Submit" />
        </form>
    </div>
    <!-- main content output -->
    <div>
        <h3>Количество задач </h3>
        <div>
            <?php echo $amount_of_tasks; ?>
        </div>
        <h3>Список задач</h3>
        <table>
            <thead style="background-color: #ddd; font-weight: bold;">
            <tr>
                <td>Id</td>
                <td>Название</td>
                <td>E-mail</td>
                <td>Текст</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($tasks as $task) {?>
                <tr>
                    <td><?php if (isset($task->id)) echo $task->id; ?></td>
                    <td><?php if (isset($task->name)) echo $task->name; ?></td>
                    <td><?php if (isset($task->email)) echo $task->email; ?></td>
                    <td>
                        <?php if (isset($task->ztext)) { ?>
                            <?php echo $task->ztext; ?></a>
                        <?php } 
                          
                          


                        ?>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
