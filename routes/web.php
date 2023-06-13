<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\Shopper\CartController;
use App\Http\Controllers\Shopper\SalesController;
use App\Http\Controllers\Shopper\OxfordController;
use App\Http\Controllers\Welcome\ContactController;
use App\Http\Controllers\Welcome\WelcomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\MotorcycleController;
use App\Http\Controllers\PaymentsController;
use App\Models\Motorcycle;
use App\Models\Payment;
use Laravel\Cashier\Http\Controllers\PaymentController;

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

// Welcome Routes
Route::controller(WelcomeController::class)->group(function () {
    Route::get('/', 'HomeMain')->name('home');
    Route::get('/motorcycle-sales', 'BikesForSale')->name('sale-motorcycles');
    Route::get('/rentals-information', 'RentInformation')->name('rental-information');
    Route::get('/services', 'GetServices')->name('services');
    Route::get('/service-repairs', 'Repairs')->name('service-repairs');
    Route::get('/service-motorcycle', 'ServiceBike')->name('service-motorcycle');
    Route::get('/service-mot', 'ServiceMot')->name('service-mot');
    Route::get('/accident-management-services', 'AccidentClaim')->name('road-traffic-accidents');
    // Route::get('/shop', 'GetProducts')->name('get-products');
    Route::get('/gps-tracker', 'GpsTracker')->name('gps-tracker');
    Route::get('/spare-parts', 'SpareParts')->name('spare-parts');
    Route::get('/about', 'AboutMethod')->name('about.page');
    Route::get('/contact', 'ContactMethod')->name('contact.page');
});

// Motorcycle Sales & Rental Routes
Route::controller(SalesController::class)->group(function () {
    Route::get('/new-motorcycles', 'NewForSale')->name('motorcycles.new');
    Route::get('/new-motorcycle/{id}', 'NewBikeDetails')->name('new-motorcycle.detail');
    Route::get('/used-motorcycles', 'UsedForSale')->name('motorcycles.used');
    Route::get('/used-motorcycle/{id}', 'UsedBikeDetails')->name('detail.used-motorcycle');
    Route::get('/motorcycle-rentals', 'RentBike')->name('motorcycle.rentals');
    Route::get('/rentals-motorcycle/{id}', 'RentalBikeDetails')->name('rental-motorcycle.detail');
});

// Oxford Product Routes
Route::controller(OxfordController::class)->group(function () {
    Route::get('/category/{category_id}', 'getProductCategory')->name('product.category');
    Route::get('/item/{id}', 'getOxfordProduct')->name('item.details');
});

// Cart Routes
Route::get('/cart', [CartController::class, 'index'])->name('product.cart');
Route::get('/add-product', [CartController::class, 'add'])->name('addproduct.cart');
Route::post('/cart/{id}', [CartController::class, 'store'])->name('store.cart');
Route::get('/checkout', [CartController::class, 'checkout'])->name('product.checkout');

// Route::controller(CartController::class)->group(function () {
//     Route::get('/cart', 'index')->name('product.cart');
//     Route::get('/add-product/{id}', 'add')->name('addproduct.cart');
//     Route::post('/cart', 'store')->name('cart.store');
// });

// Contact All Routes
Route::controller(ContactController::class)->group(function () {
    Route::get('/contact', 'Contact')->name('contact.me');
    Route::get('/contact/call-back', 'CallMeBack')->name('contact.call-back');
    Route::get('/contact/trade-account', 'TradeAccount')->name('contact.trade-account');
    Route::get('/contact/new-motorcycle/{id}', 'ContactNewSales')->name('contact.new-sales');
    Route::post('/store/message', 'StoreMessage')->name('store.message');
    Route::get('/contact/message', 'ContactMessage')->name('contact.message');
    Route::get('/delete/message/{id}', 'DeleteMessage')->name('delete.message');
});

Route::post('/mail', [MailController::class, 'sendMail']);

// Subscriber Route
Route::post('/subscribe', [SubscriberController::class, 'subscribe']);

// DOCUMENTS ////////////////////////////////////////////////////////////////////////////////////////////////////////////
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
//  PDFs
Route::get('generate-pdf', [FileUploadController::class, 'generatePDF'])->name('generatePDF');

// Home Routes
Route::group(['namespace' => 'App\Http\Controllers'], function () {
    /**
     * Home Routes
     */
    // Route::get('/', 'HomeController@index')->name('home.index');
    Route::get('/dashboard', 'HomeController@dashboard')->name('home.dashboard'); // Edit later to use the correct controller
    Route::resource('rentals', 'RentalController');

    // Rental Resources
    Route::resource('rentals', 'RentalController');

    // Payment Resources
    Route::resource('payments', 'PaymentsController');
    Route::get('/create-payment/{id}', [PaymentsController::class, 'userPayment'])->name('userPayment');
    Route::get('/create-rental/{id}', [PaymentsController::class, 'createRental'])->name('createRental');
    Route::post('/store-rental', [PaymentsController::class, 'storeRental'])->name('storeRental');
    Route::get('/payment/{id}', [PaymentsController::class, 'voidPayment'])->name('voidPayment');

    // Notes
    Route::resource('/notes', 'NotesController');

    // MOTORCYCLE
    Route::resource('motorcycles', 'MotorcycleController');
    Route::get('/is-for-rent', [MotorcycleController::class, 'isForRent'])->name('isForRent');
    Route::get('/is-rented', [MotorcycleController::class, 'isRented'])->name('isRented');
    Route::get('/is-for-sale', [MotorcycleController::class, 'isForSale'])->name('isForSale');
    Route::get('/in-for-repairs', [MotorcycleController::class, 'inForRepairs'])->name('inForRepairs');
    Route::get('/cat-b', [MotorcycleController::class, 'catB'])->name('catB');
    Route::get('/claim-in-progress', [MotorcycleController::class, 'claimInProgress'])->name('claimInProgress');
    Route::get('/is-sold', [MotorcycleController::class, 'isSold'])->name('isSold');
    Route::get('/find-motorcycle', [MotorcycleController::class, 'findMotorcycle'])->name('findMotorcycle');
    Route::post('/registration-number', [MotorcycleController::class, 'registrationNumber'])->name('registrationNumber');
    Route::get('/motorcycles-for-rent/{id}', [MotorcycleController::class, 'clientForRent'])->name('clientForRent');
    Route::post('/update-deposit/{id}', [MotorcycleController::class, 'updateDeposit'])->name('updateDeposit');
    Route::get('/create-payment/{id}', [MotorcycleController::class, 'createPayment'])->name('createPayment');
    Route::post('/take-payment/{id}', [MotorcycleController::class, 'takePayment'])->name('takePayment');
    Route::get('/rental/{motorcycle_id}', [MotorcycleController::class, 'addToClient'])->name('motorcycles.users.update');
    Route::get('/remove-rental/{motorcycle_id}', [MotorcycleController::class, 'removeFromClient'])->name('removeFromClient');
    Route::get('/check-vehicle-reg', [MotorcycleController::class, 'vehicleCheckForm'])->name('vehicleCheckForm');
    Route::post('/vehicle-check', [MotorcycleController::class, 'vehicleCheck'])->name('vehicleCheck');

    // User Resources
    Route::resource('users', 'UserController');
    // Route::get('/users/show/{user_id}', 'UserController@show')->name('users.show');

    Route::group(['middleware' => ['guest']], function () {
        /**
         * Register Routes
         */
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');
    });

    Route::group(['middleware' => ['auth']], function () {
        /**
         * Logout Routes
         */
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
    });
});

// Admin Route Grouping
// Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
//     Route::resource('rentals', [RentalController::class]);
//     // Route::resource('products', 'ProductController');
// });
