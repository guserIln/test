<div class="container">
    <div>
        <h3>Редактировать задачу</h3>
        <form action="index.php?url=tasks/editTask" method="POST">
            <label>Название</label>
            <input type="text" name="id" value="" required />
            <input type="text" name="name" value="" required />
            <label>Email</label>
            <input type="text" name="email" value="" required />
            <label>Текст</label>
            <input type="text" name="ztext" value="" />
            <input type="submit" name="submit_edit_task" value=Отправить" />
        </form>
    </div>
</div>
