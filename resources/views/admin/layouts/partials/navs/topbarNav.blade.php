<div class="topBar">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <a href="{{ route('admin.dashboard') }}" class="topbar-brand">
                    <x-application-logo />
                </a>
                <button type="button" class="sidebarMenuToggler">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
            <div class="col-lg-6">
                <form action="" method="post" class="headerSearchForm">
                    <div class="input-group">
                        <input type="text" name="search" id="search" placeholder="Search here....">
                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                    </div>
                </form>
            </div>
            <div class="col-lg-3">
                <ul class="list-inline ms-auto topBarMainLinks">
                    <li class="list-inline-item">
                        <a href="">
                            <i class="fas fa-bell"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="">
                            <i class="fas fa-clipboard"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="">
                            <i class="fas fa-clock"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="">
                            <i class="fas fa-wrench"></i>
                        </a>
                    </li>
                    <li class="list-inline-item dropdown">
                        <a href="" class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            @if(auth()->user()->profile_picture)
                                <img class="img-fluid userAvatar" src="{{ Storage::url($client->profile_picture) }}">
                            @else
                                <img class="img-fluid userAvatar" src="{{ asset('images/male-avatar.jpg') }}">
                            @endif
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="" class="dropdown-link">
                                    My Profile
                                </a>
                            </li>
                            <li>
                                <a href="">My Notes</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
