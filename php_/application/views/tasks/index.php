
<div class="container-fluid" width="100%">
    <div width="100%">
        <h3>Добавить задачу</h3>
        <form action="index.php?url=tasks/addTask" method="POST">
            <label>Имя пользователя</label>

            <input type="text" name="name" value="" required />
            <label>Email</label>
            <input type="text" name="email" value="" required />
            <label>Текст</label>
            <input type="text" name="ztext" value="" />
            <input type="submit" name="submit_add_task" value="Добавить" />
        </form>
    </div>

    <div>
        <h3>Количество задач </h3>
        <div>
            <?php echo $amount_of_tasks;   
?>
        </div>
          <form action="index.php?url=tasks/editTask" method="POST">
        <h3>Список задач</h3>
        <table>
            <thead style="background-color: #ddd; font-weight: bold;">
            <tr>
                <td>Id</td>
<td>Имя пользователя <br> <a href="index.php?url=tasks/sort/name/asc/1">asc</a><br><a href="index.php?url=tasks/sort/name/desc/1">desc</a></td>
<td>E-mail  <br>   <a href="index.php?url=tasks/sort/email/asc/1">asc</a><br><a href="index.php?url=tasks/sort/email/desc/1">desc</a></td>
                <td>Текст     </td>
                 <td>Статус  <br> <a href="index.php?url=tasks/sort/flag/asc/1">sort</a><br><a href="index.php?url=tasks/sort/flag/desc/1">desc</a></td>
                  

   <?php if (!User::isGuest()){ ?>
                 <td>Id</td>
                <td>Имя пользователя</td>
                <td>E-mail</td>
                <td>Текст</td>
                   <td>Статус</td>
                   <td>Отредактировано</td>
                   <td></td>
            <?php } ?>
            </tr>
            </thead>
            <tbody>
                
            <?php 

          
            foreach ($tasks as $task) {?>
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
                        <td>
                        <?php if (isset($task->flag) && $task->flag==true) { ?>
                            <?php echo 'выполнено';
                                  ?></a>
                        <?php } else {
                            echo 'не выполнено';
                        }
                        ?>
                    </td>
                    <?php if (!User::isGuest()){ ?>
                    <td><input type="text" name="id" value="<?php  if (isset($task->id)) echo $task->id; ?>"></td>
                    <td><input type="text" name="name" value="<?php if (isset($task->name)) echo $task->name; ?>"></td>
                    
                     <td><input type="text" name="email" value="<?php if (isset($task->email)) echo $task->email; ?>"></td>
                  

                     <td><input type="text" name="ztext" value="<?php if (isset($task->ztext)) echo $task->ztext; ?>"></td>
<td><input type="checkbox" name="flag<?php if (isset($task->id)) echo $task->id; ?>" value="yes" <?php if (isset($task->flag) && $task->flag==1) echo 'checked'?>></td> 
<td><?php if (isset($task->edited) && $task->edited == 1) echo 'Отредактировано администратором'; ?></td>
 <td> <input align="right" type="submit" name="submit_edit_task" value="Редактировать" />
               </td>    
                <?php } ?>
                </tr>
            <?php } ?>

            </tbody>

        </table>

    </form>
    </div>
</div>


