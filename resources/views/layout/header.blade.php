<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Catering Platform</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @stack('style')
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light shadow" style="background-color: rgba(255,255,255,255)">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('Home') }}">
                <img src={{ asset("assets/images/image.png") }} height="50" width="80"
                    style="border-radius: 50%">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('Menu') }}">Browse Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('OrderFood') }}">Order Food</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('CustomerSupport') }}">Customer Support</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('showFAQ') }}">FAQs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('orderHistory') }}">Order History</a>
                    </li>
                </ul>
                <div class="d-flex">
                    @if (Auth::check())
                        <a class="nav-link btn btn-dark text-light btn-sm" aria-current="page"
                            href="{{ route('LogOut') }}">
                            Log Out
                        </a>
                    @else
                        <a class="nav-link active btn btn-dark text-light btn-sm" aria-current="page"
                            href="{{ route('login') }}">Log In
                        </a>
                    @endif

                </div>
            </div>
        </div>
        </div>
    </nav>
