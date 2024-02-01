<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.partials.head')
</head>

<body>
   
   
        @include('layouts.partials.header')
        <section class="main-wrapper">
            <main>
                
                <div class="main-content">
                    <div class="container">

                        @if(session('success'))
                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                            {{session('success')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    </div>
                    @yield('content')
                </div>
            </main>
        </section>
    @include('layouts.partials.scripts')
    @stack('after-scripts')
</body>

</html>