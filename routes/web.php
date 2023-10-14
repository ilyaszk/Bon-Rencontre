<?php

use App\Models\Accueil;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MarcheController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\QrcodeController;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\VendeurController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EditMarcheController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\EditAccueilController;
use App\Http\Controllers\NosProduitsController;
use App\Http\Controllers\PageProduitController;
use App\Http\Controllers\ProducteursController;

use App\Http\Controllers\QuiSommeNousController;
use App\Http\Controllers\NouveauProduitController;
use App\Http\Controllers\EditEspaceProMaPageController;
use App\Http\Controllers\FinalizePaymentController;
use App\Http\Controllers\ModifierProduitController;
use App\Http\Controllers\EditQuiSommeNousController;
use App\Http\Controllers\EspaceProProduitsController;
use App\Http\Controllers\InfosCommercialesController;
use App\Http\Controllers\HistoriqueCommandeController;
use App\Http\Controllers\HistoriqueCommandesController;
use App\Http\Controllers\HistoriqueCommandesClientController;
use App\Http\Controllers\HistoriqueCommandesVendeurController;
use App\Http\Controllers\ParametresController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::any('/', [AccueilController::class, 'index']);
Auth::routes();

Route::middleware(['auth', 'isAdmin'])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('admin.index');
    // });
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    // ROUTES POUR LA NEWSLETTER
    Route::get('newsletter', [NewsletterController::class, 'index'])->name('newsletter.create');
    Route::post('newsletter/upload', [NewsletterController::class, 'upload'])->name('newsletter.upload');
    Route::post('newsletter/view', [NewsletterController::class, 'view'])->name('newsletter.view');
    Route::post('newsletter/send', [NewsletterController::class, 'send'])->name('newsletter.send');
    Route::get('/newsletter/success', function () {
        return view('newsletter.success');
    });
    // ROUTES EDIT
    Route::any('/EditQuiSommeNous', [EditQuiSommeNousController::class, 'index']);
    Route::any('/EditMarche', [EditMarcheController::class, 'index']);
    Route::any('/EditAccueil', [EditAccueilController::class, 'index']);
    // VALIDATION QRCODE
    Route::get('/qr-code/{id}', [QrcodeController::class, 'index'])->name('qrcode.index');
    Route::post('/qr-code/close/{id}', [QrcodeController::class, 'close'])->name('qrcode.close');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('/users', UserController::class);
});

Route::post('newsletter/inscription', [NewsletterController::class, 'inscription'])->name('newsletter.inscription');

Route::get('/marche', function () {
    return view('layouts.marche');
});

// SUCCES INSCRIPTION A LA NEWSLETTER
Route::get('/newsletter/succes-inscription', function () {
    return view('newsletter.inscription-success');
});

Route::any('/pageProduit', [PageProduitController::class, 'get']);

Route::get('/qui-sommes-nous', [QuiSommeNousController::class, 'index']);

Route::get('/politique-confidentialite', function () {
    return view('politique-confidentialite.index');
});
Route::get('/faq', [FaqController::class, 'index']);

Route::any('/nos-produits', [NosProduitsController::class, 'index']);
Route::get('/marche', [MarcheController::class, 'index']);


Route::get('/vendeur', [VendeurController::class, 'index']);

Route::middleware(['auth', 'isSeller'])->group(function () {
    // Route::get('/espace-pro', function () {
    //     return view('seller.index');
    // });
    Route::get('espace-pro', [InfosCommercialesController::class, 'index']);
    Route::post('addinfos', [InfosCommercialesController::class, 'add']);
    // Route::post('/espace-pro', [InfosCommercialesController::class, 'store']);
    Route::get('/ajouterProduit', [NouveauProduitController::class, 'index']);
    Route::post('/ajouterProduit', [NouveauProduitController::class, 'showUploadFile']);
    Route::get('/historiqueCommandes', [HistoriqueCommandeController::class, 'get'])->name('historique-commande-vendeur');
    Route::post('/historiqueCommandes', [HistoriqueCommandeController::class, 'change']);
    Route::get('/qr-code', function () {
        return view('qrcode.index');
    });
    Route::get('edit-espace-pro-ma-page', [EditEspaceProMaPageController::class, 'index']);
    Route::post('edit-espace-pro-ma-page', [EditEspaceProMaPageController::class, 'post']);
});


Route::get('/historique-commande-client', [HistoriqueCommandesClientController::class, 'get']);

Route::post('/commande', [CommandeController::class, 'get'])->name('commande-client');
Route::any('/panier', [PanierController::class, 'index']);

Route::any('/checkout', [Checkoutcontroller::class, 'get']);
Route::any('/checkout', [CheckoutController::class, 'get']);

Route::any('/payment-success', [FinalizePaymentController::class, 'index'])->name('paymentSuccess');

// Route::get('/admin/users', [UserController::class, 'index']);
// Route::get('/admin/users/edit', [UserController::class, 'edit']);


Route::get('espace-pro-produit', [EspaceProProduitsController::class, 'index'])->name('espace-pro-produit');
Route::post('espace-pro-produit', [EspaceProProduitsController::class, 'action']);

Route::any('/contact', [ContactController::class, 'html_email']);

Route::get('/mail-formulaire-contact', function () { //route pour visualiser le type de mail envoyé (non fonctionnel)
    return view('mail-formulaire-contact.index');
});
Route::get('modifierProduits', [ModifierProduitController::class, 'index'])->name('modifierProduits');
Route::post('modifierProduits', [ModifierProduitController::class, 'modifier']);
Route::any('producteurs', [ProducteursController::class, 'index']);


Route::get('/parametres', [ParametresController::class, 'index']);
//Route::post('identifiant', [ParametresController::class, 'storeId']);
Route::post('email', [ParametresController::class, 'storeEmail']);
Route::post('password', [ParametresController::class, 'storePassword']);
Route::post('newsletter', [ParametresController::class, 'storeNewsletterValue']);

Route::get('/parametres/succes-update', function () {
    return view('parametres.update-success');
});
