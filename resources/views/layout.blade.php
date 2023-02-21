
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>BizNews -  News  </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <!-- Favicon -->
    <link href="/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="/css/style.css" rel="stylesheet">
</head>
<body>

<div class="container-fluid d-none d-lg-block">
    <div class="row align-items-center bg-dark px-lg-5">
        <div class="col-lg-9">
            <nav class="navbar navbar-expand-sm bg-dark p-0">
                <ul class="navbar-nav ml-n2">
                    <li class="nav-item border-right border-secondary">
                        <a class="nav-link text-body small" href="#"><!----><!----><?php //echo  date("Y/m/d") ?></a>
                    </li>
                    <li class="nav-item border-right border-secondary">
                        <a class="nav-link text-body small" href="#">Advertise</a>
                    </li>
                    <li class="nav-item border-right border-secondary">
                        <a class="nav-link text-body small" href="#">Contact</a>
                    </li>

                                        @auth
                                        <li class="nav-item border-right border-secondary">
                                           <span class="nav-link text-body small" href="#">Welcome ,<span class="text-xs font-semibold text-yellow-500">{{ auth()->user()->name }}!</span> </span>
                                        </li>
                                        @writer
                                        <li class="nav-item border-right border-secondary">
                                        <a class="nav-link text-body small text-yellow-500" href="/admin/news/index">Admin Panel</a>
                                            </li>
                                        @endwriter

                                                <li class="nav-item">
                                                <form method="POST" action="/logout" class="text-xs font-semibold text-yellow-500 ml-2 mt-2 ">
                                                    @csrf
                                                    <button type="submit">Log Out</button>
                                                </form>
                                            </li>




                            @else
                                        <li class="nav-item border-right border-secondary">
                                            <a class="nav-link text-body small" href="/login">Login</a>
                                        </li>
                                        <li class="nav-item ">
                                            <a class="nav-link text-body small" href="/register">Register</a>
                                        </li>
                    @endauth

                </ul>
            </nav>
        </div>

    </div>
    <div class="row align-items-center bg-white py-3 px-lg-5">
        <div class="col-lg-4">
            <a href="/" class="navbar-brand p-0 d-none d-lg-block">
                <h1 class="m-0 display-4 text-uppercase text-primary">Hay<span class="text-secondary font-weight-normal">News</span></h1>
            </a>
        </div>
        <div class="col-lg-8 text-center text-lg-right">
            <a href=""><img class="img-fluid" src="/img/ads-728x90.png" alt=""></a>
        </div>
    </div>
</div>
<!-- Topbar End -->


<!-- Navbar Start -->
<div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-2 py-lg-0 px-lg-5">
        <a href="/" class="navbar-brand d-block d-lg-none">
            <h1 class="m-0 display-4 text-uppercase text-primary">Biz<span class="text-white font-weight-normal">News</span></h1>
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between px-0 px-lg-3" id="navbarCollapse">
            <div class="navbar-nav mr-auto py-0">
                <a href="/" class="nav-item nav-link">Home</a>
                <div x-data="{ show : false }" @click.away="show = false"  s >
                    <a style="cursor: pointer; margin-top: 0.79rem"
                       @click="show = ! show"
                       class="nav-item nav-link py-2 pl-3 pl-9 text-sm font-semibold w-full lg:w-32 text-left
                    flex lg:inline-flex ">
                        {{isset($currentCategory) ? ucwords($currentCategory->name): "Category"}}
                    </a>

                    {{--
                    {{--                    <a href=""--}}
                    {{--                       class="nav-link dropdown-toggle block text-left px-3 text-sm leading-6 --}}
                    {{--                       hover:text-white hover:bg-blue-500 focus:text-white focus:bg-blue-500">Category</a>--}}
                    <div x-show="show"  class="py-2 absolute bg-grey-100 mt-2 rounded-xl w-full z-50" style="display: none; position: relative">
                        @foreach($categories as $category)
                            <a href="/categories/<?=$category->slug?>" class=
                                "block text-left px-3 text-sm leading-6
                                hover:bg-blue-500 hover:text-white  focus:bg-blue-500 focus:text-white

                                {{isset($currentCategory) && $currentCategory->is($category) ? 'bg-blue-500 text-white' : ''}}
                                "> {{ucwords($category->name)}}
                                <br>
                            </a>


                        @endforeach
                    </div>
                </div>
                <a href="/contact" class="nav-item nav-link ">Contact</a>
            </div>
            <form method="get" action="#">
                <div class="input-group ml-auto d-none d-lg-flex" style="width: 100%; max-width: 300px;">

                    <input value="{{request('search')}}" type="text" name="search" class="form-control border-0" placeholder="Search">
                    <button class="input-group-text bg-primary text-dark border-0 px-3"><i
                            class="fa fa-search"></i></button>




                </div>
            </form>
        </div>
    </nav>
</div>
<x-flash />
<!-- Navbar End --

@yield('content')

<!-- Footer Start -->
<div class="container-fluid bg-dark pt-5 px-sm-3 px-md-5 mt-5">
    <div class="row py-4">
        <div class="col-lg-3 col-md-6 mb-5">
            <h5 class="mb-4 text-white text-uppercase font-weight-bold">Get In Touch</h5>
            <p class="font-weight-medium"><i class="fa fa-map-marker-alt mr-2"></i>Street Name, City, Armenia </p>
            <p class="font-weight-medium"><i class="fa fa-phone-alt mr-2"></i>+37498767890</p>
            <p class="font-weight-medium"><i class="fa fa-envelope mr-2"></i>info@example.com</p>
            <h6 class="mt-4 mb-3 text-white text-uppercase font-weight-bold">Follow Us</h6>
            <div class="d-flex justify-content-start">
                <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i class="fab fa-instagram"></i></a>
                <a class="btn btn-lg btn-secondary btn-lg-square" href="#"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
        {{--        <div class="col-lg-3 col-md-6 mb-5">--}}
        {{--            <h5 class="mb-4 text-white text-uppercase font-weight-bold">Popular News</h5>--}}
        {{--            <div class="mb-3">--}}
        {{--                <div class="mb-2">--}}
        {{--                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="">Business</a>--}}
        {{--                    <a class="text-body" href=""><small>Jan 01, 2045</small></a>--}}
        {{--                </div>--}}
        {{--                <a class="small text-body text-uppercase font-weight-medium" href="">Lorem ipsum dolor sit amet elit. Proin vitae porta diam...</a>--}}
        {{--            </div>--}}
        {{--            <div class="mb-3">--}}
        {{--                <div class="mb-2">--}}
        {{--                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="">Business</a>--}}
        {{--                    <a class="text-body" href=""><small>Jan 01, 2045</small></a>--}}
        {{--                </div>--}}
        {{--                <a class="small text-body text-uppercase font-weight-medium" href="">Lorem ipsum dolor sit amet elit. Proin vitae porta diam...</a>--}}
        {{--            </div>--}}
        {{--            <div class="">--}}
        {{--                <div class="mb-2">--}}
        {{--                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="">Business</a>--}}
        {{--                    <a class="text-body" href=""><small>Jan 01, 2045</small></a>--}}
        {{--                </div>--}}
        {{--                <a class="small text-body text-uppercase font-weight-medium" href="">Lorem ipsum dolor sit amet elit. Proin vitae porta diam...</a>--}}
        {{--            </div>--}}
        {{--        </div>--}}


    </div>
</div>
<div class="container-fluid py-4 px-sm-3 px-md-5" style="background: #111111;">
    <p class="m-0 text-center">&copy; <a href="#">Hay News</a>. All Rights Reserved. 2023

</div>
<!-- Footer End -->


<!-- Back to Top -->
<a href="#" class="btn btn-primary btn-square back-to-top"><i class="fa fa-arrow-up"></i></a>


<!-- JavaScript Libraries -->
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="/lib/easing/easing.min.js"></script>
<script src="/lib/owlcarousel/owl.carousel.min.js"></script>

<!-- Template Javascript -->
<script src="/js/main.js"></script>
</body>
