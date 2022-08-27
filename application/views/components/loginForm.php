<?php $this->flash('accountCreated', 'alert alert-success') ?>
<?php $this->flash('passwordError', 'alert alert-danger') ?>
<?php $this->flash('emailError', 'alert alert-danger') ?>

<h2>User Login</h2>

    <form action="<?php echo BASEURL; ?>/userController/userLogin" method="POST" class="mt-5">

    <div class="mb-3">
        <label for="email" class="form-label">Email: </label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password: </label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <input type="submit" name="submit" value="Login" class="btn btn-success">
    </form>