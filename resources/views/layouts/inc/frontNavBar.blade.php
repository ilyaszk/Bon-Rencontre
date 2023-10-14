<div class="menu-navbar">
    {{-- logo --}}
    <a href="{{ url('/') }}" class="logo">
        <img src="{{ asset('frontend/img/logo.png') }}" alt="" height="100" width="120" />
    </a>

    {{-- Barre de liens pour Desktop seulement --}}
    <nav class="menu-items">
        <a href="{{ url('/') }}" class="navLink">
            <span class="iconify" data-icon="iconoir:home-alt"></span>
            <h6>Accueil</h6>
        </a>
        <a href="{{ url('/qui-sommes-nous') }}" class="navLink">
            <span class="iconify" data-icon="clarity:help-info-line"></span>
            <h6>Qui sommes nous</h6>
        </a>
        <a href="{{ url('/nos-produits') }}" class="navLink">
            <span class="iconify" data-icon="fluent:shopping-bag-16-regular"></span>
            <h6>Nos produits</h6>
        </a>
        <a href="{{ url('/producteurs') }}" class="navLink">
            <span class="iconify" data-icon="icon-park-outline:road-sign-both"></span>
            <h6>Producteurs</h6>
        </a>
        <a href="{{ url('/marche') }}" class="navLink">
            <span class="iconify" data-icon="healthicons:market-stall-outline"></span>
            <h6>Marché</h6>
        </a>
        <a href="{{ url('/contact') }}" class="navLink">
            <span class="iconify" data-icon="fluent:mail-20-regular"></span>
            <h6>Contact</h6>
        </a>
        @if (session()->has('vendeur'))
        <a href="{{ url('/espace-pro') }}" class="navLink">
            <span class="iconify" data-icon="ic:outline-sell"></span>
            <h6>Espace Pro.</h6>
        </a>
        @endif
    </nav>

    {{-- Connexion - Inscription --}}
    @if (Auth::check())

    {{-- Boutons FAQ, USER, CART, pour version desktop seulement --}}
    {{-- FAQ --}}
    <div class=" secondary-menu-items ">
        <a href="{{ url('/faq') }}" class=" iconbtn ">
            <span class="iconify" data-icon="bi:patch-question"></span>
        </a>
        {{-- Popup Utilisateur --}}
        <div class="disabler" onclick="userMenuToggle()"></div>
        <div class="action">
            <a href=" # " class=" iconbtn " onclick="userMenuToggle();">
                <span class="iconify" data-icon="bx:bx-user"></span>
            </a>
            <div class="user-menu">
                <h3>{{ session()->get('prenom') }} {{ session()->get('nom') }}<br>
                    @if (session()->has('admin'))
                    <span>Compte administrateur</span>
                    @elseif (session()->has('client'))
                    <span>Compte client</span>
                    @elseif (session()->has('vendeur'))
                    <span>Compte professionnel</span>
                    @endif
                </h3>
                <ul>
                    {{-- Lien vers le back-office --}}
                    @if (session()->has('admin'))
                    <li>
                        <a href="{{ url('/dashboard') }}" class="user-navLink"><span class="iconify" data-icon="bx:bxs-dashboard"></span>Back-Office</a>
                    </li>
                    @endif
                    <li><a href="{{ url('/historique-commande-client') }}" class="user-navLink"><span class="iconify" data-icon="icon-park-outline:transaction-order"></span>Mes
                            commandes</a></li>
                    <li><a href="{{ url('/parametres') }}" class=" user-navLink"><span class=" iconify" data-icon="fluent:settings-16-regular"></span>Paramètres</a></li>
                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();" class="user-navLink"><span class="iconify" data-icon="ri:logout-circle-r-line"></span>Déconnexion</a>
                        <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        {{-- Panier --}}
        <a href="{{ url('/panier') }}" class=" iconbtn ">
            <span class="iconify" data-icon="fe:cart"></span>
        </a>
    </div>
    @else
    <div class=" secondary-menu-items hidden"></div>
    @if (Route::has('login'))
    <div class="secondary-menu-connexion">
        @auth
        @else
        <a href="{{ url('/faq') }}" class=" iconbtn ">
            <span class="iconify" data-icon="bi:patch-question"></span>
        </a>
        <a href="{{ url('/panier') }}" class=" iconbtn ">
            <span class="iconify" data-icon="fe:cart"></span>
        </a>

        <div class="connexion-wrapper">
            <a href="{{ route('login') }}" class="btn-secondary2 caption">Connexion</a>
            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="btn-secondary2 caption">S'enregistrer</a>
            @endif
        </div>
        @endauth
    </div>
    @endif
    @endif

</div>

{{-- PARTIE MOBILE --}}

<div class="mobile-navbar">
    {{-- nav-toggler pour la version mobile seulement --}}
    <button class="nav-toggler"><span></span></button>

    {{-- Menu pour mobile seulement --}}
    <nav class="mobile-menu-items">
        <a href="{{ url(' / ') }}" class="mobile-navlink">
            <span class="iconify" data-icon="iconoir:home-alt"></span>
            <span>Accueil</span>
        </a>
        <a href="{{ url('/qui-sommes-nous') }}" class="mobile-navlink">
            <span class="iconify" data-icon="clarity:help-info-line"></span>
            <span>Qui sommes nous</span>
        </a>
        <a href="{{ url('/nos-produits') }}" class="mobile-navlink">
            <span class="iconify" data-icon="fluent:shopping-bag-16-regular"></span>
            <span>Nos produits</span>
        </a>
        <a href="{{ url('/producteurs') }}" class="mobile-navlink">
            <span class="iconify" data-icon="icon-park-outline:road-sign-both"></span>
            <span>Producteurs</span>
        </a>
        <a href="{{ url('/marche') }}" class="mobile-navlink">
            <span class="iconify" data-icon="healthicons:market-stall-outline"></span>
            <span>Marché</span>
        </a>
        <a href="{{ url('/contact') }}" class="mobile-navlink">
            <span class="iconify" data-icon="fluent:mail-20-regular"></span>
            <span>Contact</span>
        </a>
        <a href="{{ url('/faq') }}" class="mobile-navlink">
            <span class="iconify" data-icon="bi:patch-question"></span>
            <span>Foire aux questions</span>
        </a>
        <a href="#" class="mobile-navlink">
            <span class="iconify" data-icon="icon-park-outline:transaction-order"></span>
            <span>Mes commandes</span>
        </a>
        <a href="#" class="mobile-navlink">
            <span class="iconify" data-icon="fluent:settings-16-regular"></span>
            <span>Paramètres</span>
        </a>
        <a href="{{ url('/espace-pro') }}" class="mobile-navlink">
            <span class="iconify" data-icon="ic:outline-sell"></span>
            <span>Espace pro.</span>
        </a>
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();" class="mobile-navlink">
            <span class="iconify" data-icon="ri:logout-circle-r-line"></span>
            <span>Déconnexion</span>
            <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </a>
    </nav>

    {{-- Titre pour version mobile seulement --}}
    <h2 class="menu-title">Accueil</h2>

    {{-- Bouton icone " panier " pour mobile seulement --}}
    <div class=" cart-mobile ">
        <a href="{{ url('/panier') }}" class=" cart-link ">
            <span class="iconify" data-icon="fe:cart"></span>
        </a>
    </div>
</div>

<hr class="hr-big">