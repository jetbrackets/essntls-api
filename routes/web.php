<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

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

Route::middleware(['auth'])->group(function () {
    route::get('/', [Controller::class, 'index']);
});


route::get('/index', [UserController::class, 'index']);
route::get('/index', [UserController::class, 'index']);
route::get('/accordion', [UserController::class, 'accordion']);
route::get('/alerts', [UserController::class, 'alerts']);
route::get('/avatar', [UserController::class, 'avatar']);
route::get('/background', [UserController::class, 'background']);
route::get('/badge', [UserController::class, 'badge']);
route::get('/blog', [UserController::class, 'blog']);
route::get('/border', [UserController::class, 'border']);
route::get('/breadcrumbs', [UserController::class, 'breadcrumbs']);
route::get('/buttons', [UserController::class, 'buttons']);
route::get('/calendar', [UserController::class, 'calendar']);
route::get('/cards', [UserController::class, 'cards']);
route::get('/carousel', [UserController::class, 'carousel']);
route::get('/chartchartjs', [UserController::class, 'chartchartjs']);
route::get('/chartechart', [UserController::class, 'chartechart']);
route::get('/chartflot', [UserController::class, 'chartflot']);
route::get('/chartmorris', [UserController::class, 'chartmorris']);
route::get('/chartsparkpeity', [UserController::class, 'chartsparkpeity']);
route::get('/chat', [UserController::class, 'chat']);
route::get('/collapse', [UserController::class, 'collapse']);
route::get('/contacts', [UserController::class, 'contacts']);
route::get('/counters', [UserController::class, 'counters']);
route::get('/cryptobuysell', [UserController::class, 'cryptobuysell']);
route::get('/cryptocurrencyexchange', [UserController::class, 'cryptocurrencyexchange']);
route::get('/cryptodashbaord', [UserController::class, 'cryptodashbaord']);
route::get('/cryptomarket', [UserController::class, 'cryptomarket']);
route::get('/cryptotranscations', [UserController::class, 'cryptotranscations']);
route::get('/cryptowallet', [UserController::class, 'cryptowallet']);
route::get('/dangermessage', [UserController::class, 'dangermessage']);
route::get('/darggablecard', [UserController::class, 'darggablecard']);
route::get('/display', [UserController::class, 'display']);
route::get('/dropdown', [UserController::class, 'dropdown']);
route::get('/ecommerceaccount', [UserController::class, 'ecommerceaccount']);
route::get('/ecommercecart', [UserController::class, 'ecommercecart']);
route::get('/ecommercecheckout', [UserController::class, 'ecommercecheckout']);
route::get('/ecommercedashboard', [UserController::class, 'ecommercedashboard']);
route::get('/ecommerceorders', [UserController::class, 'ecommerceorders']);
route::get('/ecommerceproductdetails', [UserController::class, 'ecommerceproductdetails']);
route::get('/ecommerceproducts', [UserController::class, 'ecommerceproducts']);
route::get('/empty', [UserController::class, 'empty']);
route::get('/extras', [UserController::class, 'extras']);
route::get('/faq', [UserController::class, 'faq']);
route::get('/flex', [UserController::class, 'flex']);
route::get('/forgot', [UserController::class, 'forgot']);
route::get('/formadvanced', [UserController::class, 'formadvanced']);
route::get('/formeditor', [UserController::class, 'formeditor']);
route::get('/formelements', [UserController::class, 'formelements']);
route::get('/formlayouts', [UserController::class, 'formlayouts']);
route::get('/formvalidation', [UserController::class, 'formvalidation']);
route::get('/formwizards', [UserController::class, 'formwizards']);
route::get('/gallery', [UserController::class, 'gallery']);
route::get('/height', [UserController::class, 'height']);
route::get('/icons01', [UserController::class, 'icons01']);
route::get('/icons02', [UserController::class, 'icons02']);
route::get('/icons03', [UserController::class, 'icons03']);
route::get('/icons04', [UserController::class, 'icons04']);
route::get('/icons05', [UserController::class, 'icons05']);
route::get('/icons06', [UserController::class, 'icons06']);
route::get('/icons07', [UserController::class, 'icons07']);
route::get('/icons08', [UserController::class, 'icons08']);
route::get('/icons09', [UserController::class, 'icons09']);
route::get('/icons10', [UserController::class, 'icons10']);
route::get('/icons11', [UserController::class, 'icons11']);
route::get('/invoice', [UserController::class, 'invoice']);
route::get('/listgroup', [UserController::class, 'listgroup']);
route::get('/lockscreen', [UserController::class, 'lockscreen']);
route::get('/mailinbox', [UserController::class, 'mailinbox']);
route::get('/mapmapel', [UserController::class, 'mapmapel']);
route::get('/mapvector', [UserController::class, 'mapvector']);
route::get('/margin', [UserController::class, 'margin']);
route::get('/mediaobject', [UserController::class, 'mediaobject']);
route::get('/modals', [UserController::class, 'modals']);
route::get('/navigation', [UserController::class, 'navigation']);
route::get('/padding', [UserController::class, 'padding']);
route::get('/pagination', [UserController::class, 'pagination']);
route::get('/popover', [UserController::class, 'popover']);
route::get('/position', [UserController::class, 'position']);
route::get('/pricing', [UserController::class, 'pricing']);
route::get('/profile', [UserController::class, 'profile']);
route::get('/progress', [UserController::class, 'progress']);
route::get('/rating', [UserController::class, 'rating']);
route::get('/reset', [UserController::class, 'reset']);
route::get('/search', [UserController::class, 'search']);
route::get('/signin', [UserController::class, 'signin']);
route::get('/signup', [UserController::class, 'signup']);
route::get('/spinners', [UserController::class, 'spinners']);
route::get('/successmessage', [UserController::class, 'successmessage']);
route::get('/sweetalert', [UserController::class, 'sweetalert']);
route::get('/tablebasic', [UserController::class, 'tablebasic']);
route::get('/tabledata', [UserController::class, 'tabledata']);
route::get('/tags', [UserController::class, 'tags']);
route::get('/thumbnails', [UserController::class, 'thumbnails']);
route::get('/timeline', [UserController::class, 'timeline']);
route::get('/toast', [UserController::class, 'toast']);
route::get('/tooltip', [UserController::class, 'tooltip']);
route::get('/typography', [UserController::class, 'typography']);
route::get('/underconstruction', [UserController::class, 'underconstruction']);
route::get('/userlist', [UserController::class, 'userlist']);
route::get('/viewmail', [UserController::class, 'viewmail']);
route::get('/warningmessage', [UserController::class, 'warningmessage']);
route::get('/widgets', [UserController::class, 'widgets']);
route::get('/width', [UserController::class, 'width']);
route::get('/error404', [UserController::class, 'error404']);
route::get('/error500', [UserController::class, 'error500']);








Auth::routes();
