    <ul class="sidebarNav">
        <li>
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
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
                <li>
                    <a href="{{ route('admin.leads.create') }}">Create Lead</a>
                </li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Billing/Sales
            </a>
            <ul class="dropdown-menu">
                <li>
                    <a href="">Billable Items</a>
                </li>
                <li>
                    <a href="{{ route('admin.expenses.index') }}">Expenses</a>
                </li>
                <li>
                    <a href="{{ route('admin.invoices.index') }}">Invoices</a>
                </li>
                <li>
                    <a href="">Proposals</a>
                </li>
                <li>
                    <a href="">
                        Quotes
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.transactions.index') }}">Transactions</a>
                </li>
                <li>
                    <a href="{{ route('admin.timesheets.index') }}">Timesheets</a>
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
            <a href="" class="dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Contracts
            </a>
            <ul class="dropdown-menu">
                <li>
                    <a href="">All Contracts</a>
                </li>
                <li>
                    <a href="">Create Contract</a>
                </li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Support
            </a>
            <ul class="dropdown-menu">
                <li>
                    <a href="">All Support Tickets</a>
                </li>
                <li>
                    <a href="">Create Support Ticket</a>
                </li>

                <li>
                    <a href="">Knowledge base</a>
                </li>
            </ul>
        </li>
        @role(['super admin', 'admin'])
            <li>
                <a href="{{ route('admin.activity-log.index') }}">Activity Log</a>
            </li>
        @endrole
    </ul>
