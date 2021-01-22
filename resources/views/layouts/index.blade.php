<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Exchanger BD</title>
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" /> --}}
    <link rel="stylesheet" href="{{asset("bootstrap/css/bootstrap.min.css")}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="{{asset('bootstrap/css/dataTables.bootstrap4.min.css')}}" />
    <link rel="stylesheet" href="{{asset('bootstrap/css/toastr.min.css')}}">

    <link rel="stylesheet" href="{{asset('css/style.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/mobile.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/tab.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/modal.min.css')}}" />

    @stack('link-css')


    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-175468826-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-175468826-1');
    </script>

    @guest
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src='https://embed.tawk.to/5f377dcb4c7806354da68d2c/default';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
        })();
    </script>
    @endguest

    @auth
    <script type="text/javascript">
        var Tawk_API=Tawk_API||{};
        Tawk_API.visitor = {
        name : "{{Auth::user()->username}}",
        email : "{{Auth::user()->email}}"
        };
        var Tawk_LoadStart=new Date();
        (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src='https://embed.tawk.to/5f377dcb4c7806354da68d2c/default';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
        })();
    </script>
    <!-- rest of the tawk.to widget code -->
    @endauth
    <!--End of Tawk.to Script-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

    @stack('link-js')

</head>

<body onload="load()" id="bappi-1">

    @include('users.partials.navbar')

    @yield('body')

    @auth
    @include('users.modals.feedback')
    @endauth

    @guest
    @include('users.modals.login')
    @include('users.modals.registration')
    @endguest

    @stack('modals')

    @include('users.partials.footer')

    @auth
    <script src="{{asset('js/feedback-form.js')}}"></script>
    @endauth

    @guest
    <script src="{{asset('js/login.js')}}"></script>
    <script src="{{asset('js/registration.js')}}"></script>
    @endguest

    <script src="{{asset('js/app2.js')}}"></script>

    @if($errors->any())
    @foreach ($errors->all() as $error)
    <script>
        toastr.error("{{ $error }}");
    </script>
    @endforeach
    @endif


    @if(Session::has('message'))
    <script>
        var type="{{Session::get('alert-type','info')}}"
            switch(type){
                case 'info':
                    toastr.info("{{ Session::get('message') }}");
                    break;
                case 'success':
                    toastr.success("{{ Session::get('message') }}");
                    break;
                case 'warning':
                    toastr.warning("{{ Session::get('message') }}");
                    break;
                case 'error':
                    toastr.error("{{ Session::get('message') }}");
                    break;
            }
    </script>
    @endif
    @stack('js')
</body>

</html>