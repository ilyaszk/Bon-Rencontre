@extends('layouts.contact')

@section('adresseMairie')
    <div>
        <span class="iconify" data-icon="bx:bx-map" data-flip="horizontal" style="color: #aeaeae;"
            data-height="50"></span>
        <h6>39 Rte de la Forge,<br>38470 Notre-Dame-de-l'Osier</h6>
    </div>
@endsection

@section('telephoneMairie')
    <div>
        <span class="iconify" data-icon="carbon:phone-voice" style="color: #aeaeae;" data-height="50"></span>
        <h6>04 76 36 61 77</h6>
    </div>
@endsection

@section('mailMairie')
    <div>
        <span class="iconify" data-icon="fluent:mail-20-regular" style="color: #aeaeae;" data-height="50"></span>
        <h6>ndomairie@wanadoo.fr</h6>
    </div>
@endsection

@section('horaireMairie')
    <div class="horaire">
        <h6>Heures d'ouverture :</h6>
        <p>lundi : 09h00 à 13h00 / 14h00 à 17h00</p>
        <p>mercredi : 09h00 à 13h00</p>
        <p>vendredi : 09h00 à 13h00 </p>
    </div>
@endsection



@section('fullName')
    <div class="name">
        <span class=" iconify" data-icon="bx:bx-user" style="color: #aeaeae;" data-height="80"></span>
        <input class="contact-input" minlength="4" maxlength='40' type="text" name="fullName" placeholder="Nom prenom"
            required>
    </div>
@endsection



@section('email')
    <div>
        <span class="iconify" data-icon="fluent:mail-20-regular" style="color: #aeaeae;" data-height="80"></span>
        <input class="contact-input" type="email" name="email" placeholder="xyz@example.com" required>
    </div>
@endsection
@section('numero')
    <div>
        <span class="iconify" data-icon="carbon:phone-voice" style="color: #aeaeae;" data-height="80"></span>
        <input class="contact-input" minlength="10" type="tel" name="numero" placeholder="+33">
    </div>
@endsection
@section('text')
    <div class="message">

        <span class="iconify" data-icon="ic:outline-message" data-flip="horizontal" style="color: #aeaeae;"
            data-height="80"></span>
        <textarea name="msg" minlength='10' maxlength="450" placeholder="entrer votre demande ici !" required></textarea>

    </div>
@endsection

@section('bouton')
    <button onclick="popUpConfirmationEnvoi()" type="submit" class="btn-primary" name="envoi"
        value="true">ENVOYER</button>
@endsection
