    <ul class="sidebarNav">
        <li>
            <a href="">Dashboard</a>
        </li>
        <li class="dropdown">
            <a class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Clients
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
                <li>
                    <a href="{{ route('admin.clients.index') }}">All Clients</a>
                </li>
                <li>
                    <a href="{{ route('admin.clients.create') }}">New Client</a>
                </li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Leads
            </a>
            <ul class="dropdown-menu">

            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Billing
            </a>
            <ul class="dropdown-menu"></ul>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Projects
            </a>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Support
            </a>
        </li>
    </ul>
