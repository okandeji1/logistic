<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<!-- Developed by Okandeji https://kandesoft.herokuapp.com -->

<head>
    <title>{{ config('app.name', 'Coach Express') }}</title>
    <meta name="author" content="radtech.tech">
    <meta name="robots" content="index follow">
    <meta content="Developer" name="RadTech radtech.tech" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="keywords"
        content="cargo,shipping, Delivery, Coach,coach, coach express, delivery in lagos, logistics in lagos, logisticslagos, delivery lekki, lekki delivery, 247 delivery, lekki, logistics lekki, Ikoyi delivery">
    <meta name="description"
        content="Coach Express Delvery Service - Book your delivery instantly on our easy to web platform">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- google fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800%7CPoppins:300i,300,400,500,600,700,400i,500%7CDancing+Script:700%7CDancing+Script:700%7CGreat+Vibes:400%7CPoppins:400%7CDosis:800%7CRaleway:400,700,800&amp;subset=latin-ext"
        rel="stylesheet">
    <!-- animate -->
    <link rel="stylesheet" href="{{asset('site/css/animate.css')}}" />
    <!-- owl Carousel assets -->
    <link href="{{asset('site/css/owl.carousel.css" rel="stylesheet')}}">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{asset('site/css/owl.theme.css" rel="stylesheet')}}">
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{asset('site/css/bootstrap.min.css')}}">
    <!-- hover anmation -->
    <link rel="stylesheet" href="{{asset('site/css/hover-min.css')}}">
    <!-- flag icon -->
    <link rel="stylesheet" href="{{asset('site/css/flag-icon.min.css')}}">
    <!-- main style -->
    <link rel="stylesheet" href="{{asset('site/css/style.css')}}">
    <!-- elegant icon -->
    <link rel="stylesheet" href="{{asset('site/css/elegant_icon.css')}}">
    <!-- fontawesome  -->
    <link rel="stylesheet" href="{{asset('site/fonts/font-awesome/css/font-awesome.min.css')}}">
    <!-- REVOLUTION STYLE SHEETS -->
    <link rel="stylesheet" type="text/css"
        href="{{asset('site/rslider/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('site/rslider/fonts/font-awesome/css/font-awesome.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('site/rslider/css/settings.css')}}">
    <link rel='shortcut icon' type='image/x-icon' href='{{asset('site/images/favicon.ico')}}' />
</head>

<body>


    <!-- <div class="loaderz"></div> -->
    @include('site.partials.header')
    <!-- // Header  -->

    <!-- Main Content -->
    @yield('content')


    <!-- Footer -->
    @include('site.partials.footer')


    <!-- jquery library  -->
    <script src="{{asset('site/js/nile-slider.js')}}"></script>
    <script src="{{asset('site/js/jquery-3.2.1.min.js')}}"></script>
    <!-- REVOLUTION JS FILES -->
    <script src="{{asset('site/rslider/js/jquery.themepunch.tools.min.js')}}"></script>
    <script src="{{asset('site/rslider/js/jquery.themepunch.revolution.min.js')}}"></script>
    <!-- SLIDER REVOLUTION 5.0 EXTENSIONS -->
    <script src="{{asset('site/rslider/js/extensions/revolution.extension.actions.min.js')}}"></script>
    <script src="{{asset('site/rslider/js/extensions/revolution.extension.carousel.min.js')}}"></script>
    <script src="{{asset('site/rslider/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
    <script src="{{asset('site/rslider/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
    <script src="{{asset('site/rslider/js/extensions/revolution.extension.migration.min.js')}}"></script>
    <script src="{{asset('site/rslider/js/extensions/revolution.extension.navigation.min.js')}}"></script>
    <script src="{{asset('site/rslider/js/extensions/revolution.extension.parallax.min.js')}}"></script>
    <script src="{{asset('site/rslider/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
    <script src="{{asset('site/rslider/js/extensions/revolution.extension.video.min.js')}}"></script>
    <script src="{{asset('site/js/YouTubePopUp.jquery.js')}}"></script>
    <script src="{{asset('site/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('site/js/imagesloaded.min.js')}}"></script>
    <script src="{{asset('site/js/custom.js')}}"></script>
    <script src="{{asset('site/js/popper.min.js')}}"></script>
    <script src="{{asset('site/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('site/js/main.js')}}"></script>
    <script>
        function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
    </script>

</body>
<!-- Developed by Okandeji https://kandesoft.herokuapp.com -->

</html>
