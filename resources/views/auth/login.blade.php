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
    <title>My Island App</title>
    <link rel="stylesheet" href="../maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <!-- Dashboard Core -->
    <link href="assets/css/dashboard.css" rel="stylesheet" />
    <script src="assets/js/dashboard.js"></script>
    <!-- c3.js Charts Plugin -->
    <link href="assets/plugins/charts-c3/plugin.css" rel="stylesheet" />
    <script src="assets/plugins/charts-c3/plugin.js"></script>
    <!-- Google Maps Plugin -->
    <link href="assets/plugins/maps-google/plugin.css" rel="stylesheet" />
    <script src="assets/plugins/maps-google/plugin.js"></script>
    <!-- Input Mask Plugin -->
    <script src="assets/plugins/input-mask/plugin.js"></script>
  </head>
  <body class="">
    <div class="page">
      <div class="page-single">
        <div class="container">
          <div class="row">
            <div class="col col-login mx-auto">
              <div class="text-center mb-6">
              <span style="font-weight:bold; font-size:40px;"> <img src="assets/img/island.png" style="height:50px"> My Island App</span>
              </div>

              <form class="card" method="POST" action="{{ route('login') }}">

      @if ($errors->has('email'))
      <div class="alert alert-danger">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </div>
                                @endif

                                        @if ($errors->has('password'))
                                        <div class="alert alert-danger">
                                        <strong>{{ $errors->first('password') }}</strong>
                                        </div>
                                @endif

              {{ csrf_field() }}

                <div class="card-body p-6">
                  
                  <div class="card-title">Είσοδος</div>
                  <div class="form-group">
                    <label class="form-label">Διεύθυνση Email</label>
                    <input id="email" type="email" class="form-control" name="email"  aria-describedby="emailHelp" placeholder="Διεύθυνση Email" value="{{ old('email') }}" required autofocus>
                  </div>
                  <div class="form-group">
                    <label class="form-label">
                    Κωδικός
                      <a href="{{ route('password.request') }}" class="float-right small">Ξέχασα τον κωδικό μου</a>
                    </label>
                    <input id="password" type="password" class="form-control" placeholder="Κωδικός" name="password" required>
                  </div>
                  <div class="form-group">
                    <label class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" name="remember" {{ old('remember') ? 'checked' : '' }}> 
                      <span class="custom-control-label">Να με θυμάσε</span>
                    </label>
                  </div>
                  <div class="form-footer">
                    <button type="submit" class="btn btn-primary btn-block">Είσοδος</button>
                  </div>
                </div>
              </form>
           
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>

</html>