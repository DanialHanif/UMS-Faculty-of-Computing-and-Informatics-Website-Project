<body class="d-flex flex-column h-100">
    <main role="main" class="mx-auto flex-shrink-0" style="max-width: 1200px; width: 100%; background-color: white;">
        <div class="jumbotron" style="background-color: white">
            <h1>Sign Up</h1>
            <p>Please fill in this form to create an account.</p>
        </div>
        <div class="container">
            <hr class="my-4">
            <?php if (isset($validation)) : ?>
                <div class="alert alert-danger" role="alert"><?= $validation->listErrors() ?></div>
            <?php endif; ?>
            <form class="needs-validation" id="formSignUp" action="<?= base_url('Signup/addnew') ?>" method="post">
                <div class="form-group">
                    <label for="name"><b>Company Name</b></label>
                    <input type="text" class="form-control" placeholder="Enter company name" name="cName" value="<?= set_value('cName')?>" required>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name"><b>Contact Person's First Name</b></label>
                        <input type="text" class="form-control" placeholder="Enter Contact Person's First Name" name="cFirstName" value="<?= set_value('cFirstName')?>" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="name"><b>Contact Person's Last Name</b></label>
                        <input type="text" class="form-control" placeholder="Enter Contact Person's Last Name" name="cLastName" value="<?= set_value('cLastName')?>" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="name"><b>Phone Number</b></label>
                    <input type="text" class="form-control" placeholder="Enter Phone Number" name="cPhone" value="<?= set_value('cPhone')?>" required>
                </div>
                <div class="form-group">
                    <label for="name"><b>Address Line 1</b></label>
                    <input type="text" class="form-control" placeholder="Enter Address Line 1" name="cAddr1" value="<?= set_value('cAddr1')?>" required>
                </div>
                <div class="form-group">
                    <label for="name"><b>Address Line 2</b></label>
                    <input type="text" class="form-control" placeholder="Enter Address Line 2" name="cAddr2" value="<?= set_value('cAddr2')?>" required>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="name"><b>City</b></label>
                        <input type="text" class="form-control" placeholder="Enter City" name="cCity" value="<?= set_value('cCity')?>" required>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="name"><b>State</b></label>
                        <input type="text" class="form-control" placeholder="Enter State" name="cState" value="<?= set_value('cState')?>" required>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="name"><b>Postal Code</b></label>
                        <input type="text" class="form-control" placeholder="Enter Postal Code" name="cPostal" value="<?= set_value('cPostal')?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name"><b>County</b></label>
                    <select class="custom-select" name="cCountry" id="scountry">
                        <option value="" disabled="disabled" selected="selected">Please Select</option>
                        <option value="1">Malaysia</option>
                        <option value="2">Singapore</option>
                    </select>
                </div>


                <div class="form-group">
                    <label for="email"><b>Login Email</b></label>
                    <input type="email" class="form-control" placeholder="Enter Email" name="cEmail" value="<?= set_value('email')?>" required>
                </div>
                <div class="form-group">
                    <label for="password"><b>Login Password</b></label>
                    <input type="password" class="form-control" placeholder="Enter Password" name="cPassword" value="<?= set_value('password')?>" required>
                </div>

                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="remember" id="rememberBox">
                    <label class="form-check-label" for="rememberBox">Remember Me</label>
                </div>
                <p>By creating an account you agree to our <a href="#" style="color: dodgerblue;">Terms & Privacy</a></p>

                <div class="clearfix">
                    <button type="submit" class="btn btn-success m-3">Sign Up</button>
                </div>
                <hr class="my-4">
            </form>
        </div>
    </main>
</body>