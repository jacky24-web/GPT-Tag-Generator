<header class="shadow-sm bg-app_dblue header">
    <nav class="navbar navbar-expand-lg navbar-light w-100">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" title="{{ config('app.name', trans('messages.application_title')) }}">
                <img src="{{ asset('images/logo/logo.png') }}" alt="" srcset="" class="brand-logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link fw-bold text-white " aria-current="page" href="#">Home</a>
                    <a class="nav-link fw-bold text-white" href="#">Features</a>
                    <a class="nav-link fw-bold text-white" href="#">Pricing</a>
                   
                </div>

                {{-- <div class="my-2 my-xl-0 align-items-center">
                    <a role="button" class="btn btn-dark border-0 d-block mb-1" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        data-bs-toggle="tooltip"  title="{{ trans('messages.logout_text') }}" >
                        <i class="fas fa-power-off"></i>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    
                </div> --}}
            </div>
        </div>
    </nav>
</header>