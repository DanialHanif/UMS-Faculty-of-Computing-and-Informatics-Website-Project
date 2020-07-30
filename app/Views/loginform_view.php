<body class="d-flex flex-column h-100">
    <main role="main" class="mx-auto flex-shrink-0" style="max-width: 1200px; width: 100%; background-color: white;">
        <div class="m-4" style="background-color: white">
            <h1 class="text-center">Sign in</h1>
        </div>
        <div class="container">
            <?php if (isset($validation)) : ?>
                <div class="alert alert-danger" role="alert"><?= $validation->listErrors() ?></div>
            <?php endif; ?>
            <?php if (session()->get('login_status')) : ?>
                <div class="alert alert-danger" role="alert"><?= session()->get('login_status') ?></div>
            <?php endif; ?>
            <?php if (session()->get('success')) : ?>
                <div class="alert alert-success" role="alert"><?= session()->get('success') ?></div>
            <?php endif; ?>
            <form class="needs-validation col-md-4 mx-auto" id="formSignUp" action="<?= base_url('Login/verifyUser') ?>" method="post" novalidate>
                <hr class="my-4">
                <div class="form-group">
                    <label for="email"><b>Email</b></label>
                    <input type="email" class="form-control" placeholder="Enter Email" name="cEmail" value="<?= set_value('email') ?>" required>
                </div>
                <div class="form-group">
                    <label for="password"><b>Password</b></label>
                    <input type="password" class="form-control" placeholder="Enter Password" name="cPassword" value="<?= set_value('password') ?>" required>
                </div>

                <div class="clearfix">
                    <button type="submit" class="btn btn-success mt-4">Sign in</button>
                </div>
                <hr class="mb-5">
            </form>
        </div>
    </main>
</body>