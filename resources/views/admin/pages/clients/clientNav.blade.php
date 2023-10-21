<ul class="clientProfileNav">
    <li><a href="{{ route('admin.clients.show', $client->id) }}" class="{{ Route::is('admin.clients.show') ? 'active' : '' }}">Summary</a></li>
    <li><a href="{{ route('admin.clients.edit', $client->id) }}" class="{{ Route::is('admin.clients.edit') ? 'active' : '' }}">Profile</a></li>
    <li><a href="">Projects</a></li>
    <li><a href="">Tasks</a></li>
    <li><a href="">Files</a></li>
    <li><a href="">Products/Services</a></li>
    <li><a href="">Billable Items</a></li>
    <li><a href="">Invoices</a></li>
    <li><a href="">Quotes</a></li>
    <li><a href="">Transactions</a></li>
    <li><a href="">Emails</a></li>
    <li><a href="">Messages</a></li>
    <li><a href="">Notes</a></li>
    <li><a href="">Log</a></li>
</ul>
