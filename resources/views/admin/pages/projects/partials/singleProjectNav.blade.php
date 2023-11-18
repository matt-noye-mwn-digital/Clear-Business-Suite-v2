<nav class="singleProjectNav">
    <ul>
        <li>
            <a href="{{ route('admin.projects.show', $project->id) }}" class="{{ Route::is('admin.projects.show') ? 'active' : '' }}">Overview</a>
        </li>
        <li>
            <a href="{{ route('admin.projects.tasks.index', ['id' => $project->id]) }}" class="{{ Route::is('admin.projects.tasks.*') ? 'active' : '' }}">Tasks</a>
        </li>
        <li><a href="{{ route('admin.projects.milestones.index', ['id' => $project->id]) }}" class="{{ Route::is('admin.projects.milestones.*') ? 'active' : '' }}">Milestones</a></li>
        <li><a href="">Notes</a></li>
        <li><a href="">Time Tracking</a></li>
        <li><a href="">Messages</a></li>
        <li><a href="">Files</a></li>
    </ul>
</nav>
