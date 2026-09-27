<!doctype html>
<html lang="en" data-bs-theme="dark">

<head>
     <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="title" content="{{__('Delicious Burgers & Fresh Food | Best Online Burger Shop')}}">
<meta name="description" content="{{__('Order the most delicious, juicy burgers and fresh food online. We serve mouthwatering burgers made from high-quality ingredients — fast delivery and unbeatable taste!')}}">
<meta name="keywords" content="{{__('burgers, burger shop, online burger delivery, delicious burgers, cheeseburgers, gourmet burgers, fast food, best burgers, fresh food, burger restaurant, burger takeaway')}}">
 <meta property="og:image" content="{{asset('ico/favicon-32x32.png')}}">
   <title>@yield('title') {{ config('app.name', 'Laravel') }} - {{__('Delicious Burgers & Fresh Food | Best Online Burger Shop')}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/dark-mode.css') }}?v={{ uniqid() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('ico/apple-touch-icon.png')}}">
<link rel="icon" type="image/png" sizes="32x32" href="{{asset('ico/favicon-32x32.png')}}">
<link rel="icon" type="image/png" sizes="16x16" href="{{asset('ico/favicon-16x16.png')}}">
<link rel="manifest" href="{{asset('ico/site.webmanifest')}}">
<meta name="theme-color" content="#000000">
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
      {{-- google analytics --}}
      <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-WSYZRPENSJ"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-WSYZRPENSJ');
</script>
    @livewireStyles
</head>
<body>
    <div id="app">
        <main>
            {{-- @yield('content') --}}
           <div class="container">
             {{ $slot }}
           </div>
            {{-- end content  --}}
            @php
            $status = App\Models\ShopStatus::whereDate('closing_date', today())
                ->where('status_name', 'closed')
                ->first();
        @endphp
        @if ($status)
        <div class="theme-notice-wrap">
            <div class="theme-notice">
                <p>{{ $status->status_color}}</p>
            </div>
        </div>
        @endif
            <div style="height:200px"></div>
            {{-- footer --}}
           @include('inc.footer')
            {{-- footer --}}
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
    @livewireScripts
   <script>
    window.addEventListener("scroll", () => {
  const div = document.getElementById("topnav");

  if (window.scrollY > 0) {
    div.classList.add("scrolled");
  } else {
    div.classList.remove("scrolled");
  }
});
   </script>
   <script>
        function openSB() {
            const navbar = document.getElementById("side_nav_bar");
            navbar.style.right = 0;
            navbar.style.width = "100%";
           

        }

        function closeSB() {
            const navbar = document.getElementById("side_nav_bar");
            navbar.style.width = "400px";
            navbar.style.right = "-400px";
        }
    </script>
</body>

</html>
