<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <a class="nav-link" href="/">
        <i class=" fas fa-building"></i><span>Dashboard</span>
    </a>
</li>
<li class="side-menus {{ Request::is('books*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('books.index') }}"><i class="fas fa-building"></i><span>Books</span></a>
</li>

<li class="side-menus {{ Request::is('autors*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('autors.index') }}"><i class="fas fa-building"></i><span>Autors</span></a>
</li>

