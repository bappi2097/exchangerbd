<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{{asset("bootstrap/css/bootstrap.min.css")}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="{{asset('css/admin.min.css')}}" />
    <link rel="stylesheet" href="{{asset('bootstrap/css/dataTables.bootstrap4.min.css')}}" />
    <link rel="stylesheet" href="{{asset('bootstrap/css/toastr.min.css')}}">

    @stack('link-css')

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

<body>

    @include('admin.others.navbar')

    <div class="body">

        @include('admin.others.sidebar')

        <main>

            @yield('main')

        </main>
    </div>

    @stack('modals')

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

    <script src="{{asset('js/admin.js')}}"></script>
    <script>
        function copyToClipboard(str) {
            const el = document.createElement('textarea');
            el.value = str;
            el.setAttribute('readonly', '');
            el.style.position = 'absolute';
            el.style.left = '-9999px';
            document.body.appendChild(el);
            el.select();
            document.execCommand('copy');
            document.body.removeChild(el);
        };
    </script>

    @stack('js')

</body>

</html>