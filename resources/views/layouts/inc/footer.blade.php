<hr class="hr-fade">
<footer>
    <div class="desktop-footer-aide">
        <h3>Aide & informations</h3>
        <a href="{{ url('/qui-sommes-nous') }}" class="textLink">Qui sommes nous ?</a>
        <a href="{{ url('/faq') }}" class="textLink">Questions/réponses</a>
        <a href="#" class="textLink">Nos conditions générales d'utilisation</a>
        <a href="{{ url('/politique-confidentialite') }}" class="textLink">Notre politique de confidentialité</a>
        <a href="{{ url('/contact') }}" class="textLink">Besoin d'aide ? Contactez-nous</a>


    </div>
    <div class="desktop-footer-nav">
        <h3>Navigation</h3>
        <a href="{{ url('/marche') }}" class="textLink">Marché</a>
        <a href="{{ url('/nos-produits') }}" class="textLink">Nos produits</a>
        <a href="{{ url('/producteurs') }}" class="textLink">Les producteurs</a>
        <a href="{{ url('/espace-pro') }}" class="textLink">Espace professionel</a>
    </div>
    <div class="desktop-footer-compteaccepte">
        <div class="desktop-footer-compte">
            <h3>Compte</h3>
            <a href="#" class="textLink">Commandes</a>
            <a href="{{ url('/panier') }}" class="textLink">Panier</a>
            <a href="#" class="textLink">Mes informations personnelles</a>
        </div>
        <div class="desktop-footer-accepte">
            <h3>Nous acceptons :</h3>
            <span class="iconify" data-icon="icons8:visa" style="color: #aeaeae;" data-height="40"></span>
            <span class="iconify" data-icon="brandico:mastercard" style="color: #aeaeae;"
                data-height="40"></span>
            <span class="iconify" data-icon="cib:cc-paypal" style="color: #aeaeae;" data-height="40"></span>
        </div>

    </div>
    <div class="desktop-footer-resnews">
        <div class="desktop-footer-res">
            <h3>Ou nous trouver</h3>
            <a href="#" class="textLink"><span class="iconify" data-icon="akar-icons:instagram-fill"
                    style="color: #aeaeae;" data-height="40"></span></a>
            <a href="#" class="textLink"><span class="iconify" data-icon="iconoir:facebook"
                    style="color: #aeaeae;" data-height="40"></span></a>
            <a href="#" class="textLink"><span class="iconify" data-icon="eva:twitter-outline"
                    style="color: #aeaeae;" data-height="40"></span></a>

        </div>
        <div class="desktop-footer-news">
            <h3>Inscrivez-vous à notre newsletter !</h3>
            <form class="news-form" action="{{ route('newsletter.inscription') }}" method="post">
                @csrf
                <input class="news-input" type="email" name="email" value="">
                <button class="btn-secondary" type="submit" name="button">S'abonner</button>
            </form>
        </div>

    </div>

    <div class="mobile-footer">
        <div class="mobile-footer-aide-event">
            <h3>Aide & Informations <span class="iconify" data-icon="ei:chevron-down"></span></h3>
        </div>

        <div class="mobile-footer-aide">
            <h3 class="h3-mobile-footer-aide">Aide & informations <span class="iconify"
                    data-icon="system-uicons:chevron-up"></h3>
            <a href="{{ url('/qui-sommes-nous') }}" class="textLink">Qui sommes nous ?</a>
            <a href="{{ url('/faq') }}" class="textLink">Questions/réponses</a>
            <a href="#" class="textLink">Nos conditions générales d'utilisation</a>
            <a href="{{ url('/politique-confidentialite') }}" class="textLink">Notre politique de
                confidentialité</a>
            <a href="{{ url('/contact') }}" class="textLink">Besoin d'aide ? Contactez-nous</a>
        </div>

        <div class="mobile-footer-nav">
            <h3>Navigation <span class="iconify" data-icon="ei:chevron-down"></span></h3>
        </div>

        <div class="mobile-footer-nav-event">
            <h3 class="h3-mobile-footer-nav-event">Navigation <span class="iconify"
                    data-icon="system-uicons:chevron-up"></h3>
            <a href="{{ url('/marche') }}" class="textLink">Marché</a>
            <a href="{{ url('/nos-produits') }}" class="textLink">Nos produits</a>
            <a href="{{ url('/producteurs') }}" class="textLink">Les producteurs</a>
            <a href="{{ url('/espace-pro') }}" class="textLink">Espace professionel</a>
        </div>

        <div class="mobile-footer-compte">
            <h3>Compte <span class="iconify" data-icon="ei:chevron-down"></span></h3>
        </div>

        <div class="mobile-footer-compte-event">
            <h3 class="h3-mobile-footer-compte-event">Compte <span class="iconify"
                    data-icon="system-uicons:chevron-up"></span></h3>
            <a href="#" class="textLink">Commandes</a>
            <a href="{{ url('/panier') }}" class="textLink">Panier</a>
            <a href="#" class="textLink">Mes informations personnelles</a>
        </div>

        <div class="mobile-footer-accepte">
            <h3>Nous acceptons :</h3>
            <span class="iconify" data-icon="icons8:visa" style="color: #aeaeae;" data-height="40"></span>
            <span class="iconify" data-icon="brandico:mastercard" style="color: #aeaeae;"
                data-height="40"></span>
            <span class="iconify" data-icon="cib:cc-paypal" style="color: #aeaeae;" data-height="40"></span>
        </div>

        <div class="mobile-footer-res">
            <h3>Ou nous trouver</h3>
            <a href="#" class="textLink"><span class="iconify" data-icon="akar-icons:instagram-fill"
                    style="color: #aeaeae;" data-height="40"></span></a>
            <a href="#" class="textLink"><span class="iconify" data-icon="iconoir:facebook"
                    style="color: #aeaeae;" data-height="40"></span></a>
            <a href="#" class="textLink"><span class="iconify" data-icon="eva:twitter-outline"
                    style="color: #aeaeae;" data-height="40"></span></a>
        </div>

        <div class="mobile-footer-news">
            <h3>Inscrivez-vous à notre newsletter !</h3>
            <form class="" action="index.html" method="post">
                <input type="email" name="" value="">
                <button class="btn-secondary" type="button" name="button">S'abonner</button>
            </form>
        </div>
    </div>






</footer>
