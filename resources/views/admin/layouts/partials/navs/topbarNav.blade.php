<header>
    <div class="topBar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <a href="{{ route('admin.dashboard') }}" class="topbar-brand">
                        <x-application-logo />
                    </a>
                    <div class="dropdown quickCreateDropdown">
                        <button type="button" class="dropdown-toggle " data-bs-toggle="dropdown" aria-expanded="false" title="Quick create menu">
                            <i class="fas fa-plus"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a href="{{ route('admin.clients.create') }}">
                                    Create Client
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.leads.create') }}">Create Lead</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.transactions.create') }}">Create Transaction</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.todos.create') }}">Create Todo</a>
                            </li>
                        </ul>
                    </div>
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
                            <button type="button" class="sidebarMenuToggler" title="Open/Close Sidebar">
                                <i class="fas fa-times"></i>
                            </button>
                        </li>
                        <li class="list-inline-item">
                            <a href="">
                                <i class="fas fa-bell"></i>
                            </a>
                        </li>
                        <li class="list-inline-item todoMenuItem">
                            <a href="{{ route('admin.todos.index') }}">
                                @if($todoCount > 0)
                                    <span class="itemCount">
                                        {{ $todoCount }}
                                    </span>
                                @endif
                                <i class="fas fa-clipboard"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="">
                                <i class="fas fa-clock"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="{{ route('admin.settings.index') }}">
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
                                    <a href="">
                                        My Profile
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.notes.index') }}">My Notes</a>
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
</header>
