<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- facebook meta --}}
    <meta property="og:url" content="{{ url()->current() }}" >
    <meta property="og:image" content="{{ config('app.url') }}@yield('og:image')" >
    <meta property="og:title" content="@yield('og:title')" >
    <link rel="shortcut icon" href='{{ asset('assets/img/favicon.png') }}' type="image/x-icon">

    <title>Mutiara Property</title>

    {{-- Bootstrap css --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    {{-- RemixIcon --}}
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

    {{-- swipper css --}}
    <link rel="stylesheet" href="/css/swiper-bundle.min.css">

    {{-- main css --}}
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/search.css">
    <link rel="stylesheet" href="/css/choices.css">
    <link rel="stylesheet" href="/css/whatsapp.css">

    <style>
        a {
            text-decoration: none;
            color: var(--title-color);
        }
        a:hover {
            color: var(--title-color-alt);
        }

    </style>

    @stack('styles')

    @livewireStyles

</head>
<body>
    
    @livewire('form-pengunjung')

    @livewire('home.navbar')

    <main class="main">
        {{ $slot }}
    </main>
    <!-- FOOTER -->
    @livewire('home.footer')
    
    <div id='tawk_60f823da649e0a0a5ccd46e1'></div>
    @livewire('whatsapp')
    </div>

    {{-- Blade Ui Kit --}}
    
    {{-- Bootstrap js --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    {{-- swipper.js --}}
    <script src="/js/swiper-bundle.min.js"></script>
    
    {{-- main.js --}}
    <script src="/js/main.js"></script>

    
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/60f823da649e0a0a5ccd46e1/1fbr1n8v4';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->

    @stack('scripts')

    @livewireScripts
</body>
</html>