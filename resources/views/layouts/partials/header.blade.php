<header class="shadow-sm bg-app_dblue header">
    <nav class="navbar navbar-expand-lg navbar-light w-100">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="#" title="{{ config('app.name', trans('messages.application_title')) }}">
                <img src="{{ asset('images/iqvia-logo-white.svg') }}" alt="" srcset="" class="brand-logo me-4">
                Data enrichment orchestrator
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end ms-5" id="navbarNavAltMarkup">
                <ul class="navbar-nav">
                    <li class="nav-item {{Route::is('home') ? 'active' : '' }}">
                    <a class="nav-link fw-bold text-white" href="/">Home</a>
                    </li>
                   <li class="nav-item">
                    <a class="nav-link fw-bold text-white" href="#">Database connections</a>
                   </li>
                    <li class="nav-item {{Route::is('enrichement.*') ? 'active' : '' }}">
                    <a class="nav-link fw-bold text-white" href="{{route('enrichement.index')}}">GPT Enrichements</a>
                   </li>
                    <li class="nav-item">
                    
                    <a class="nav-link fw-bold text-white" href="#">Logs</a>
                   </li>
                    <li class="nav-item {{Route::is('semulate.*') ? 'active' : '' }}">
                    <a class="nav-link fw-bold text-white" href="{{route('semulate.index')}}">Simulate</a>
                </li></u
                l>
            </div>
        </div>
    </nav>
</header>