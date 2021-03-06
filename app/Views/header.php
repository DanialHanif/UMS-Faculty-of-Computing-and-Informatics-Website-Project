<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Universiti Malaysia Sabah - Faculty of Computing and Informatics">
    <title>Faculty of Computing and Informatics</title>
    <link rel="icon" href="<?= base_url('img/favicon.ico')?>" />
    <link rel="canonical" href="http://fki.ums.edu.my/fki/">
    <link rel="stylesheet" href="<?= base_url("css/bootstrap.css")?>">
    <link rel="stylesheet" href="<?= base_url("css/style.css")?>">
    <link rel="stylesheet" href="<?= base_url("css/video-js.css")?>">
    <script src="<?= base_url('js/videojs-ie8.min.js')?>"></script>
</head>

<!--HEADER-->
<header>
    <div class="d-flex mx-auto justify-content-between" style="max-width: 1200px; position:relative">
        <a class="navbar-brand my-auto" href="<?= base_url('Home')?>"><img class="w-100" src="<?= base_url('img/logo-white.png')?>"></a>
        
    </div>

</header>


<!--NAVIGATION-->
<div>
    <nav class="navbar navbar-expand-sm navbar-light bg-light shadow-sm my-4">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navBarResponsive">
                <span>Menu</span>
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse mx-auto" id="navBarResponsive" style="max-width: 1200px">
                <ul class="navbar-nav mx-auto flex-wrap justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link <?= (stristr(uri_string(), "Home")) || (uri_string() === '/') ? 'active' : '' ?>" href="<?= base_url('Home')?>">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="<?= base_url('About')?>">ADMISSIONS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="<?= base_url('About')?>">RESEARCH</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= (stristr(uri_string(), "About") ? 'active' : '') ?>" href="<?= base_url('About')?>">ABOUT US</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="about.html">ALUMNI</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= (stristr(uri_string(), "Contact")) ? 'active' : '' ?>" href="<?= base_url('Contact')?>">CONTACT</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle <?= (stristr(uri_string(), "Login")) ? 'active' : '' ?>" href="<?= base_url('Login')?>" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">LOGIN</a>
                        <div class="dropdown-menu">
                            <form class="px-4 py-3 mx-auto" action="<?= base_url('Login/verifyUser') ?>" method="post" novalidate>
                                <div class="form-group">
                                    <label for="emailForm">Email address</label>
                                    <input type="email" class="form-control" id="emailForm" placeholder="Email" name="cEmail">
                                </div>
                                <div class="form-group">
                                    <label for="passwordForm">Password</label>
                                    <input type="password" class="form-control" id="passwordForm" placeholder="Password" name="cPassword">
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="rememberCheck">
                                    <label class="form-check-label" for="rememberCheck">Remember me</label>
                                </div>
                                <hr class="my-2">
                                <div class="clearfix">
                                    <button type="submit" class="btn text-white" style="background-color: #D83963">Sign in</button>
                                </div>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?= base_url('Signup')?>">Don't have account? Sign up</a>
                                <a class="dropdown-item" href="">Forgot password?</a>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>