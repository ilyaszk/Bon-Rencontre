<div class="sidebar">
    <ul class="nav-links">
        <li>
            <div class="icon-link">
                <a href="{{ url('/dashboard') }}">
                    <span class="iconify" data-icon="bx:bxs-dashboard"></span>
                    <span class="link-name">DashBoard</span>
                </a>
            </div>
            <div class="icon-link">
                <a href="">
                    <span class="iconify" data-icon="bx:bxs-dashboard"></span>
                    <span class="link-name">Utilisateurs</span>
                    <span id="arrow" class="iconify" data-icon="akar-icons:chevron-down"></span>
                </a>
            </div>
            <ul class="sub-menu">
                <span class="title-name">Utilisateurs</span>
                <li>
                    <a href="{{ url('/admin/users') }}">Tous</a>
                </li>
            </ul>
        </li>
        <li>
            <div class="icon-link">
                <a href="">
                    <span class="iconify" data-icon="bx:bxs-dashboard"></span>
                    <span class="link-name">Pages</span>
                    <span id="arrow" class="iconify" data-icon="akar-icons:chevron-down"></span>
                </a>
            </div>
            <ul class="sub-menu">
                <span class="title-name">Pages</span>
                <li>
                    <a href="{{ url('/EditAccueil') }}">Accueil</a>
                    <a href="">F.A.Q.</a>
                    <a href="{{ url('/EditQuiSommeNous') }}">Qui sommes nous</a>
                    <a href="{{ url('/EditMarche') }}">Marché</a>
                </li>
            </ul>
        </li>
        <li>
            <div class="icon-link">
                <a href="">
                    <span class="iconify" data-icon="bx:bxs-dashboard"></span>
                    <span class="link-name">Newsletter</span>
                    <span id="arrow" class="iconify" data-icon="akar-icons:chevron-down"></span>
                </a>
            </div>
            <ul class="sub-menu">
                <span class="title-name">Newsletter</span>
                <li>
                    <a href="{{ url('/newsletter') }}">Nouvelle campagne</a>
                </li>
            </ul>
        </li>
    </ul>

    <div class="logout">
        <a href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"
            class="user-navLink"><span class="iconify" data-icon="ri:logout-circle-r-line"></span></a>
        <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </div>
</div>
