<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Universiti Malaysia Sabah - Faculty of Computing and Informatics">
    <title>Faculty of Computing and Informatics</title>
    <link rel="icon" href="img/favicon.ico" />
    <link rel="canonical" href="http://fki.ums.edu.my/fki/">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/video-js.css">
    <script src="js/videojs-ie8.min.js"></script>
</head>

<!--HEADER-->
<header>
    <div class="d-flex mx-auto justify-content-between" style="max-width: 1200px; position:relative">
        <a class="navbar-brand my-auto" href="index.html"><img class="w-100" src="img/logo-white.png"></a>
        <button onclick="showSearchBox()" data-toggle="tooltip" data-placement="left" title="Search" class="btn m-3 searchlink" id="searchButton"><i class="fas fa-search"></i></button>
        <div id="search-form" class="search-form shadow">
            <form class="form-inline">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn my-2 my-sm-0 text-white" style="background-color: #D83963;" type="submit">Search</button>
            </form>
        </div>
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
                        <a class="nav-link <?php echo ((stristr(uri_string(), "Home")) || (uri_string() === '/') ? 'active' : '') ?>" href="Home">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="about.html">ADMISSIONS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="about.html">RESEARCH</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ((stristr(uri_string(), "About")) ? 'active' : '') ?>" href="About">ABOUT US</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="about.html">ALUMNI</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ((stristr(uri_string(), "Contact")) ? 'active' : '') ?>" href="Contact">CONTACT</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle <?php echo ((stristr(uri_string(), "Login")) ? 'active' : '') ?>" href="Login" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">LOGIN</a>
                        <div class="dropdown-menu">
                            <form class="px-4 py-3 mx-auto">
                                <div class="form-group">
                                    <label for="emailForm">Email address</label>
                                    <input type="email" class="form-control" id="emailForm" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="passwordForm">Password</label>
                                    <input type="password" class="form-control" id="passwordForm" placeholder="Password">
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="rememberCheck">
                                    <label class="form-check-label" for="rememberCheck">Remember me</label>
                                </div>
                                <hr class="my-2">
                                <div class="clearfix">
                                    <button type="submit" class="btn text-white" style="background-color: #D83963">Sign in</button>
                                </div>
                            </form>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="Signup">Don't have account? Sign up</a>
                            <a class="dropdown-item" href="">Forgot password?</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>