<!doctype html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en" />
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <link rel="icon" href="favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>My Island App Web</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <link href="assets/css/dashboard.css" rel="stylesheet" />
  </head>
  <body class="">
    <div class="page">
      <div class="page-main">
        <div class="header py-4">
          <div class="container">
            <div class="d-flex">
              <a class="header-brand" href="index.html">
                <span><img src="assets/img/island.png" style="height:25px"></i> My Island App</span>
              </a>
              <div class="d-flex order-lg-2 ml-auto">
                <div class="nav-item d-none d-md-flex">
                  <a href="#" id="addplaceBtn" class="btn btn-sm btn-outline-primary"><i class="fas fa-plus"></i> Νέο μέρος</a>
                </div>
             
                <div class="dropdown">
                  <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
                    <span class="avatar" style="background-image: url(assets/img/user.png)"></span>
                    <span class="ml-2 d-none d-lg-block">
                      <span class="text-default">{{ Auth::user()->name }}</span>
                      <small class="text-muted d-block mt-1">Χρήστης</small>
                    </span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                    <a class="dropdown-item" href="{{ url('/logout') }}">
                   <i class="dropdown-icon fe fe-log-out"></i> Αποσύνδεση
                    </a>
                  </div>
                </div>
              </div>
              <a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse" data-target="#headerMenuCollapse">
                <span class="header-toggler-icon"></span>
              </a>
            </div>
          </div>
        </div>
        <div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-lg-3 ml-auto">
                <form class="input-icon my-3 my-lg-0">
                  <input type="search" class="form-control header-search" placeholder="Αναζήτηση..." tabindex="1">
                  <div class="input-icon-addon">
                    <i class="fe fe-search"></i>
                  </div>
                </form>
              </div>
              <div class="col-lg order-lg-first">
                <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
                <li class="nav-item">
                    <a href="{{ url('/') }}" class="nav-link {{ Request::is('/') ? 'active' : '' }}""><i class="fas fa-th-list"></i> &nbsp; Όλα τα μέρη</a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('/hotels') }}" class="nav-link {{ Request::is('hotels') ? 'active' : '' }}""><i class="fas fa-hotel"></i> &nbsp; Διαμονή</a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('/food') }}" class="nav-link {{ Request::is('food') ? 'active' : '' }}"><i class="fas fa-utensils"></i> &nbsp;Εστίαση</a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('/beaches') }}" class="nav-link {{ Request::is('beaches') ? 'active' : '' }}"><i class="fas fa-umbrella-beach"></i> &nbsp; Παραλίες</a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('/sights') }}" class="nav-link {{ Request::is('sights') ? 'active' : '' }}"><i class="fas fa-map-marked"></i>&nbsp; Αξιοθέατα</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>