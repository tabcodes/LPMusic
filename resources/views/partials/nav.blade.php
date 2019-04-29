<nav class="navbar navbar-expand-md navbar-dark bg-dark navbar-laravel py-0">
    <div class="container-fluid">
        
        <!-- Left Side Of Navbar -->
        
        <div class="navbar-brand">
            <a class="nav-link text-light" href="{{ route('site.index') }}">
                LitPro<b>Music</b>
            </a>
        </div>

        <!-- Right Side Of Navbar -->

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                
                <!-- Resource Navbar Links -->

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fa fa-guitar"></i> Bands
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="{{ route('band.index') }}"><i class="fa fa-list-ul"></i> Band List</a>
                        <a class="dropdown-item" href="{{ route('band.create') }}"><i class="fa fa-plus-square"></i> Add New Band</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-compact-disc"></i> Albums
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="{{ route('album.index') }}"><i class="fa fa-list-ul"></i> Album Collection</a>
                        <a class="dropdown-item" href="{{ route('album.create') }}"><i class="fa fa-plus-square"></i> Add New Album</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>