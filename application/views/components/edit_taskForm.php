<h2>Update Task Form</h2>

<form action="<?php echo BASEURL; ?>/taskController/updateTask" method="POST" class="mt-5">
<input type="hidden" name="hiddenId" value="<?php echo $data['hiddenId']; ?>">
    <div class="mb-3">
        <label for="taskName" class="form-label">Task Name: </label>
        <input type="text" class="form-control" id="taskName" name="taskName" value="<?php echo $data['taskName']; ?>">
    </div>
    <div class="mb-3">
        <label for="taskDesc" class="form-label">Task Description: </label>
        <input type="text" class="form-control" id="taskDesc" name="taskDesc"value="<?php echo $data['taskDesc']; ?>">
    </div>
    <input type="submit" name="submit" value="Update Task" class="btn btn-success">
</form>