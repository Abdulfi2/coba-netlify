<nav class="navbar navbar-expand-lg fixed-top column-2 d-flex justify-content-end">
    <li class="nav-item d-block">
        <a class="btn btn-success border border-dark-subtle shadow" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();">
            Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </li>
    {{-- <a href="/logout" class="btn btn-success border border-dark-subtle shadow">Logout</a> --}}
</nav>
