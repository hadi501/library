<ul class="list-unstyled components mb-5">
    
    <li>
        <a href="/">Home</a>
    </li>

    <li>
        <a href="#">Dashboard</a>
    </li>

    <li>
        <a href="#bookSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Book</a>
        <ul class="collapse list-unstyled" id="bookSubmenu">
            <li>
                <a href="/book">Home</a>
            </li>
            <li>
                <a href="/lend">Lend</a>
            </li>
            <li>
                <a href="/fine">Fine</a>
            </li>
        </ul>
    </li>

    @if (Auth::user()->role == '3')
    <li>
        <a href="#userSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">User</a>
        <ul class="collapse list-unstyled" id="userSubmenu">
            <li>
                <a href="/user">Home</a>
            </li>
        </ul>
    </li>
    @endif

    @if (Auth::user()->role == '2' or Auth::user()->role == '3')
    <li>
        <a href="#financeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Finance</a>
        <ul class="collapse list-unstyled" id="financeSubmenu">
            <li>
                <a href="#">Home</a>
            </li>
        </ul>
    </li>
    @endif

    <li>
        <a href="/logout">Logout</a>
    </li>
</ul>