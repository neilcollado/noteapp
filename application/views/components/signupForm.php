
<?php $this->flash('passwordError', 'alert alert-danger') ?>
<?php $this->flash('emailError', 'alert alert-danger') ?>
<h2>Create new account</h2>

    <form action="<?php echo BASEURL; ?>/userController/createUser" method="POST" class="mt-5">
    <div class="mb-3">
        <label for="firstName" class="form-label">First Name:</label>
        <input type="text" class="form-control" id="firstName" name="firstName" required>
    </div>
    <div class="mb-3">
        <label for="lastName" class="form-label">Last Name:</label>
        <input type="text" class="form-control" id="lastName" name="lastName" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email: </label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password: </label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <input type="submit" name="submit" value="Register" class="btn btn-success">
    </form>