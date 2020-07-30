<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Universiti Malaysia Sabah - Faculty of Computing and Informatics">
    <title>Faculty of Computing and Informatics</title>
    <link rel="icon" href="<?= base_url('img/favicon.ico') ?>" />
    <link rel="canonical" href="http://fki.ums.edu.my/fki/">
    <link rel="stylesheet" href="<?= base_url("css/bootstrap.css") ?>">
    <link rel="stylesheet" href="<?= base_url("css/style.css") ?>">
    <link rel="stylesheet" href="<?= base_url("css/video-js.css") ?>">
    <script src="<?= base_url('js/videojs-ie8.min.js') ?>"></script>
</head>

<!--HEADER-->
<header>
    <div class="d-flex mx-auto justify-content-between" style="max-width: 1200px; position:relative">
        <a class="navbar-brand my-auto" href="<?= base_url('Home') ?>"><img class="w-100" src="<?= base_url('img/logo-white.png') ?>"></a>

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
                        <a class="nav-link <?= (stristr(uri_string(), "Dashboard")) || (uri_string() === '/') ? 'active' : '' ?>" href="<?= base_url('Dashboard') ?>">DASHBOARD</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= (stristr(uri_string(), "Exams")) ? 'active' : '' ?>" href="<?= base_url('Exams') ?>">EXAMS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= (stristr(uri_string(), "News")) ? 'active' : '' ?>" href="<?= base_url('News') ?>">NEWS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= (stristr(uri_string(), "CurrentEvents")) ? 'active' : '' ?>" href="<?= base_url('CurrentEvents') ?>">EVENTS</a>
                    </li>
                    <?php

                    if (session()->get('logged_in')['type'] == 'staff') {

                        echo "
                        <li class=\"nav-item\"><a class=\"nav-link " . (stristr(uri_string(), "Contact") ? 'active' : '') . "\" href=".base_url('Messages').">MESSAGES</a></li>
                        <li class=\"nav-item\">
                        <a class=\"nav-link " . (stristr(uri_string(), "Students") ? 'active' : '') . "\" href=\"" . base_url('Students') . "\">STUDENTS</a>
                        </li>
                        <li class=\"nav-item\">
                        <a class=\"nav-link " . (stristr(uri_string(), "Staff") ? 'active' : '') . "\" href=\"" . base_url('Staff') . "\">STAFF</a>
                        </li>";
                    }

                    ?>

                    <li class="nav-item">
                        <a class="nav-link <?= (stristr(uri_string(), "Courses")) ? 'active' : '' ?>" href="<?= base_url('Courses') ?>">COURSES</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle <?= (stristr(uri_string(), "Login") ? 'active' : '') ?>" href="<?= base_url('Login') ?>" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">PROFILE</a>
                        <div class="dropdown-menu">
                            <div class="clearfix px-5 py-3 mx-auto">

                                <label>Hello <b><?= session()->get('logged_in')['firstName'] ?>! (<?= session()->get('logged_in')['type'] ?>)</b></label>
                                <label>(<?= session()->get('logged_in')['email'] ?>)</label>

                                <hr class="my-2">
                                <div class="row">
                                    <button onclick="location.href = '<?= base_url('Logout') ?>'" class="btn btn-danger text-white">Sign Out</button>
                                    <button onclick="location.href = '<?= base_url('Dashboard') ?>'" class="btn btn-primary float-right">Dashboard</button>
                                    <button onclick="location.href = '<?= base_url('UpdateDetails') ?>'" class="btn btn-primary float-right">Edit Profile</button>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>