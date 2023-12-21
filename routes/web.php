<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Shopper\SalesController;
use App\Http\Controllers\Welcome\WelcomeController;
use App\Http\Controllers\Welcome\ContactController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\Shopper\CartController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\Shopper\CartrentalController;
use App\Http\Controllers\OxfordController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MotorcycleController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\RentalPaymentsController;
use App\Models\Motorcycle;
use App\Models\Rental;
use App\Models\RentalPayment;
use Laravel\Cashier\Http\Controllers\PaymentController;
use App\Http\Controllers\RentalSignupController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('frontend.index');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Welcome Routes
Route::controller(WelcomeController::class)->group(function () {
    Route::get('/motorcycle-sales', 'BikesForSale')->name('sale-motorcycles');
    Route::get('/rentals-information', 'RentInformation')->name('rental-information');
    Route::get('/services', 'GetServices')->name('services');
    Route::get('/service-repairs', 'Repairs')->name('service-repairs');
    Route::get('/service-motorcycle', 'ServiceBike')->name('service-motorcycle');
    Route::get('/service-mot', 'ServiceMot')->name('service-mot');
    Route::get('/accident-management-services', 'AccidentClaim')->name('road-traffic-accidents');
    Route::get('/shop-motorcycle', 'MotorcycleShop')->name('shop-motorcycle');
    Route::get('/shop-accessories', 'MotorcycleAccessories')->name('shop-accessories');
    Route::get('/gps-tracker', 'GpsTracker')->name('gps-tracker');
    Route::get('/spare-parts', 'SpareParts')->name('spare-parts');
    Route::get('/about', 'AboutMethod')->name('about.page');

    // Legals
    Route::get('/cookie-and-privacy-policy', 'CookiePrivacyPolicy')->name('CookiePrivacyPolicy');
    Route::get('/terms-of-use', 'TermsOfUse')->name('TermsOfUse');
    Route::get('/shipping-policy', 'ShippingPolicy')->name('ShippingPolicy');
    Route::get('/refund-policy', 'RefundPolicy')->name('RefundPolicy');

    // Soon Come...lol
    Route::get('/coming-soon', 'SoonCome');
});

// Oxford Product Routes
Route::get('/category/{id}', [OxfordController::class, 'getProductCategory']);
Route::get('/product/{id}', [OxfordController::class, 'getOxfordProduct']);
Route::get('/helmets', [OxfordController::class, 'helmets'])->name('helmets');
Route::get('/mt-helmets', [OxfordController::class, 'MtHelmets'])->name('mt-helmets');

// Motorcycle Sales & Rental
Route::controller(SalesController::class)->group(function () {
    Route::get('/new-motorcycles', 'NewForSale')->name('motorcycles.new');
    Route::get('/new-motorcycle/{id}', 'NewBikeDetails')->name('new-motorcycle.detail');
    Route::get('/used-motorcycles', 'UsedForSale')->name('motorcycles.used');
    Route::get('/used-motorcycle/{id}', 'UsedBikeDetails')->name('detail.used-motorcycle');
    Route::get('/motorcycle-rentals', 'RentBike')->name('motorcycle.rentals');
    Route::get('/motorcycle-rental-hire', 'RentHire')->name('rental-hire');
    Route::get('/motorcycle-rental-detail', 'RentalHireDetail')->name('rental-hire-detail');
    Route::get('/rentals-motorcycle/{id}', 'RentalDetails')->name('rental-motorcycle.detail');
    Route::get('/honda-forza-125', 'Forza125')->name('forza-125');
    Route::get('/honda-pcx-125', 'Pcx125')->name('pcx-125');
    Route::get('/honda-sh-125', 'Sh125')->name('sh-125');
    Route::get('/honda-vision-125', 'Vision125')->name('vision-125');
    Route::get('/yamaha-nmax-125', 'Nmax125')->name('nmax-125');
    Route::get('/yamaha-xmax-125', 'Xmax125')->name('xmax-125');
});

// Contact All Routes
Route::controller(ContactController::class)->group(function () {
    Route::get('/contact', 'Contact')->name('contact.me');
    Route::get('/contact/call-back', 'CallMeBack')->name('contact.call-back');
    Route::get('/contact/trade-account', 'TradeAccount')->name('contact.trade-account');
    Route::get('/contact/new-motorcycle/{id}', 'ContactNewSales')->name('contact.new-sales');
    Route::post('/store/message', 'StoreMessage')->name('store.message');
    Route::get('/contact/message', 'ContactMessage')->name('contact.message');
    Route::get('/delete/message/{id}', 'DeleteMessage')->name('delete.message');
    Route::post('/accident/management', 'AccidentManagement')->name('AccidentManagement');
    Route::post('/contacts', 'ThankYou')->name('contacts.thankyou');
});

// Cart Routes
Route::get('/cart', [CartController::class, 'index'])->name('product.cart');
Route::get('/add-product', [CartController::class, 'add'])->name('addproduct.cart');
Route::post('/cart/{id}', [CartController::class, 'store'])->name('store.cart');
Route::post('/cart-rental/{id}', [CartrentalController::class, 'storeRental'])->name('storeRental.cart');
Route::get('/cart-remove/{id}', [CartController::class, 'delete']);

// StripeController
Route::controller(StripePaymentController::class)->group(function () {
    Route::get('stripe', 'stripe');
    Route::post('stripe', 'stripePost')->name('stripe.post');

    Route::get('stripe-hire-reserve', 'stripeHireDeposit');
    Route::get('stripe/{id}', 'stripeReserve');
    Route::post('stripe', 'rentalReserve')->name('stripe.reserve');
});

// Subscriber Route
Route::post('/subscribe', [SubscriberController::class, 'subscribe']);

// Motorcycle Rental SignUp
Route::controller(RentalSignupController::class)->group(function () {
    Route::get('/rental-signup/{id}', 'rentalSignUp');
    Route::post('/rentalsignup', 'storeSignUp')->name('store.signup');
    Route::post('/customerrentalsignup', 'customerAddRental')->name('customer.add.rental');
    Route::get('/rental-agreement', 'showAgreement');
    Route::post('/signature-post', 'signedAgreement')->name('sign.agreement');
    Route::get('/pdf-agreement', 'PdfAgreement')->name('pdf.agreement');
});
Route::get('/rental-motorcycle/{motorcycle_id}/{user_id}', [RentalSignupController::class, 'customerBikeLink'])->name('rental.motorcycle.rental');

require __DIR__ . '/auth.php';

// Roles Gage Routes
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admindashboard', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard');
Route::get('staff/dashboard', [DashboardController::class, 'staffDashboard'])->name('staff.dashboard');
Route::get('customer/dashboard', [DashboardController::class, 'customerDashboard'])->name('customer.dashboard');

// Route::get('/dashboard', [DashboardController::class, 'redirectAfterLogin'])->middleware(['auth'])->name('dashboard');

// PDFs
Route::get('generate-pdf', [PdfController::class, 'generatePdf'])->name('generate-pdf');

// Email
Route::post('/mail', [MailController::class, 'sendMail']);

// Documents
Route::get('file-upload', [DocumentController::class, 'index']);
Route::post('file-upload', [DocumentController::class, 'store'])->name('file.store');
Route::get('/upload-files/{id}', [FileUploadController::class, 'createForm']);
Route::post('/upload-file/{id}', [FileUploadController::class, 'fileUpload'])->name('fileUpload');
Route::get('/file-dl-back/{id}', [FileUploadController::class, 'createDlBack'])->name('createDlBack');
Route::post('/upload-back/{id}', [FileUploadController::class, 'DlBack'])->name('DlBack');
Route::get('/file-dl-front/{id}', [FileUploadController::class, 'createDlFront'])->name('frontUpload');
Route::post('/upload-front/{id}', [FileUploadController::class, 'DlFront'])->name('DlFront');
Route::get('/file-poid/{id}', [FileUploadController::class, 'createIdProof'])->name('createIdProof');
Route::post('/upload-poid/{id}', [FileUploadController::class, 'IdProof'])->name('IdProof');
Route::get('/file-poadd/{id}', [FileUploadController::class, 'createAddProof'])->name('createAddProof');
Route::post('/upload-poadd/{id}', [FileUploadController::class, 'AddressProof'])->name('AddressProof');
Route::get('/file-poins/{id}', [FileUploadController::class, 'createInsProof'])->name('createInsProof');
Route::post('/upload-poins/{id}', [FileUploadController::class, 'InsuranceCertificate'])->name('InsuranceCertificate');
Route::get('/file-pocbt/{id}', [FileUploadController::class, 'createCbt'])->name('createCbt');
Route::post('/upload-pocbt/{id}', [FileUploadController::class, 'CbtProof'])->name('CbtProof');
Route::get('/remove-upload/{id}', [FileUploadController::class, 'delete']);

// User Resources
Route::get('/users', [UserController::class, 'index'])->name('users');
Route::get('/users/{id}', [UserController::class, 'show'])->name('show.user');
Route::get('/users-create', [UserController::class, 'create'])->name('create.user');
Route::post('/users', [UserController::class, 'store'])->name('store.users');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('edit.user');
Route::patch('/users/{id}', [UserController::class, 'update'])->name('update.users');

// Customer Dashboard Resources
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/client-motorcycle/{id}', [DashboardController::class, 'ClientMotorcycle'])->name('client.motorcycles');

Route::get('/client-upload-files/{id}', [DashboardController::class, 'createForm']);
Route::post('/client-upload-file/{id}', [DashboardController::class, 'fileUpload'])->name('client.fileUpload');
Route::get('/client-file-dl-back/{id}', [DashboardController::class, 'createDlBack'])->name('client. createDlBack');
Route::post('/client-upload-back/{id}', [DashboardController::class, 'DlBack'])->name('client. DlBack');
Route::get('/client-file-dl-front/{id}', [DashboardController::class, 'createDlFront'])->name('client. frontUpload');
Route::post('/client-upload-front/{id}', [DashboardController::class, 'DlFront'])->name('client.DlFront');
Route::get('/client-file-poid/{id}', [DashboardController::class, 'createIdProof'])->name('client.createIdProof');
Route::post('/client-upload-poid/{id}', [DashboardController::class, 'IdProof'])->name('client.IdProof');
Route::get('/client-file-poadd/{id}', [DashboardController::class, 'createAddProof'])->name('client.createAddProof');
Route::post('/client-upload-poadd/{id}', [DashboardController::class, 'AddressProof'])->name('client.AddressProof');
Route::get('/client-file-poins/{id}', [DashboardController::class, 'createInsProof'])->name('client.createInsProof');
Route::post('/client-upload-poins/{id}', [DashboardController::class, 'InsuranceCertificate'])->name('client.InsuranceCertificate');
Route::get('/client-file-pocbt/{id}', [DashboardController::class, 'createCbt'])->name('client.createCbt');
Route::post('/client-upload-pocbt/{id}', [DashboardController::class, 'CbtProof'])->name('client.CbtProof');
Route::get('/client-file-statementfact/{id}', [DashboardController::class, 'createStatementOfFact'])->name('createStatementOfFact');
Route::post('/client-upload-statementoffact/{id}', [DashboardController::class, 'statementOfFact'])->name('statementOfFact');
Route::get('/client-file-ni/{id}', [DashboardController::class, 'createNationalInsurance'])->name('createStatementOfFact');
Route::post('/client-upload-ni/{id}', [DashboardController::class, 'nationalInsurance'])->name('statementOfFact');

Route::get('/client-remove-upload/{id}', [DashboardController::class, 'delete']);

// ADMIN DASHBOARD RESOURCES
Route::get('/motorcycles', [MotorcycleController::class, 'index'])->name('motorcycles');
Route::get('/motorcycle-show/{id}', [MotorcycleController::class, 'show'])->name('motorcycle.show');
Route::get('/motorcycles-create', [MotorcycleController::class, 'create'])->name('create.motorcycle');
Route::get('/motorcycles-new-rental', [MotorcycleController::class, 'findMotorcycle'])->name('new-rental.motorcycle');
Route::post('/motorcycles', [MotorcycleController::class, 'store'])->name('store.motorcycles');
Route::get('/motorcycles/{id}/edit', [MotorcycleController::class, 'edit'])->name('edit.motorcycle');
Route::patch('/motorcycles/{id}', [MotorcycleController::class, 'update'])->name('update.motorcycles');

Route::get('/motorcycles-for-rent/{id}', [MotorcycleController::class, 'clientForRent'])->name('admin.motorcycles');
// Route::get('/admin-motorcycle/{motorcycle_id}', [MotorcycleController::class, 'addToClient'])->name('admin.motorcycle.rental');

Route::get('added-payment/{id}', [MotorcycleController::class, 'show'])->name('manually.paid');

Route::get('/stolen', [MotorcycleController::class, 'stolen'])->name('stolen');
Route::get('/missing', [MotorcycleController::class, 'missing'])->name('missing');
Route::get('/accident', [MotorcycleController::class, 'accident'])->name('accident');
Route::get('/impounded', [MotorcycleController::class, 'impounded'])->name('impounded');
Route::get('/is-for-rent', [MotorcycleController::class, 'isForRent'])->name('isForRent');
Route::get('/is-rented', [MotorcycleController::class, 'isRented'])->name('isRented');
Route::get('/is-for-sale', [MotorcycleController::class, 'isForSale'])->name('isForSale');
Route::get('/in-for-repairs', [MotorcycleController::class, 'inForRepairs'])->name('inForRepairs');
Route::get('/cat-b', [MotorcycleController::class, 'catB'])->name('catB');
Route::get('/claim-in-progress', [MotorcycleController::class, 'claimInProgress'])->name('claimInProgress');
Route::get('/is-sold', [MotorcycleController::class, 'isSold'])->name('isSold');
Route::get('/mot-due', [MotorcycleController::class, 'motDue'])->name('motDue');
Route::get('/tax-due', [MotorcycleController::class, 'taxDue'])->name('taxDue');

Route::get('/find-motorcycle', [MotorcycleController::class, 'findMotorcycle'])->name('findMotorcycle');
Route::post('/registration-number', [MotorcycleController::class, 'registrationNumber'])->name('registrationNumber');

Route::post('/update-deposit/{id}', [MotorcycleController::class, 'updateDeposit'])->name('updateDeposit');
Route::get('/create-payment/{id}', [MotorcycleController::class, 'createPayment'])->name('createPayment');
Route::post('/take-payment/{id}', [MotorcycleController::class, 'takePayment'])->name('takePayment');

Route::get('/remove-rental/{motorcycle_id}', [MotorcycleController::class, 'removeFromClient'])->name('removeFromClient');
Route::get('/check-vehicle-reg', [MotorcycleController::class, 'vehicleCheckForm'])->name('vehicleCheckForm');
Route::post('/vehicle-check', [MotorcycleController::class, 'vehicleCheck'])->name('vehicleCheck');
Route::get('/create-new-motorcycle', [MotorcycleController::class, 'createNewMotorcycle'])->name('createNewMotorcycle');
Route::post('/brand-new-motorcycle', [MotorcycleController::class, 'storeNewMotorcycle'])->name('storeNewMotorcycle');

// Rental Resources
Route::get('/rentals', [RentalController::class, 'index'])->name('rentals');

// Payment Resources
Route::get('/rentalpayments', [RentalPaymentsController::class, 'index'])->name('rentalpayments');
Route::get('/create-payment/{id}', [RentalPaymentsController::class, 'userPayment'])->name('userPayment');
Route::get('/create-rental/{id}', [RentalPaymentsController::class, 'createRental'])->name('createRental');
Route::post('/store-rental', [RentalPaymentsController::class, 'storeRental'])->name('storeRental');
Route::get('/payment/{id}', [RentalPaymentsController::class, 'voidPayment'])->name('voidPayment');
Route::get('/outstanding-deposits', [RentalPaymentsController::class, 'outstandingDeposits'])->name('outstandingDeposits');
Route::post('/void-payment', [RentalPaymentsController::class, 'voidPayment'])->name('voidPayment');
Route::post('/manual-payment', [RentalPaymentsController::class, 'manualPayment'])->name('manualPayment');
Route::post('/discount-payment', [RentalPaymentsController::class, 'discountPayment'])->name('discountPayment');

// Notes
Route::get('/notes', [NotesController::class, 'index'])->name('notes');
Route::post('/notes', [NotesController::class, 'UserNote'])->name('notes');
Route::post('/user-notes/{id}', [NotesController::class, 'UserNote'])->name('user-note');
