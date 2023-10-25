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
                <li>
                    <a href="{{ route('admin.leads.index') }}">All Leads</a>
                </li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Billing
            </a>
            <ul class="dropdown-menu">
                <li>
                    <a href="{{ route('admin.transactions.index') }}">Transactions</a>
                </li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Projects
            </a>
            <ul class="dropdown-menu">
                <li>
                    <a href="{{ route('admin.projects.index') }}">All Projects</a>
                </li>
                <li>
                    <a href="{{ route('admin.projects.create') }}">Create Project</a>
                </li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Support
            </a>
        </li>
        @role(['super admin', 'admin'])
            <li>
                <a href="{{ route('admin.activity-log.index') }}">Activity Log</a>
            </li>
        @endrole
    </ul>
