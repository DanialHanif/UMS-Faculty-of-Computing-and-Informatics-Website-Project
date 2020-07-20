<body class="d-flex flex-column h-100">
    <main role="main" class="mx-auto flex-shrink-0" style="max-width: 1200px; width: 100%; background-color: white;">
        <div class="m-4" style="background-color: white">
            <h1 class="text-center">Sign in</h1>
        </div>
        <div class="container">
            <?= \Config\Services::validation()->listErrors() ?>
            <form class="needs-validation col-md-4 mx-auto" id="formSignUp" action="Signup/addnew" method="post" novalidate>
            <hr class="my-4">
                <div class="form-group">
                    <label for="email"><b>Email</b></label>
                    <input type="email" class="form-control" placeholder="Enter Email" name="cEmail" required>
                </div>
                <div class="form-group">
                    <label for="password"><b>Password</b></label>
                    <input type="password" class="form-control" placeholder="Enter Password" name="cPassword" required>
                </div>

                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="remember" id="rememberBox">
                    <label class="form-check-label" for="rememberBox">Remember Me</label>
                </div>                
                <div class="clearfix">
                    <button type="submit" class="btn btn-success mt-4">Sign in</button>
                </div>
                <hr class="mb-5">
            </form>
        </div>
    </main>
</body>