
<?php $this->flash('taskError', 'alert alert-danger') ?>

<h2>Create New Task</h2>

    <form action="<?php echo BASEURL; ?>/taskController/createTaskList" method="POST" class="mt-5">

    <div class="mb-3">
        <label for="taskName" class="form-label">Task Name: </label>
        <input type="text" class="form-control" id="taskName" name="taskName" required>
    </div>
    <div class="mb-3">
        <label for="taskDesc" class="form-label">Task Description: </label>
        <input type="text" class="form-control" id="taskDesc" name="taskDesc" required>
    </div>
    <input type="submit" name="submit" value="Add Task" class="btn btn-success">
    </form>