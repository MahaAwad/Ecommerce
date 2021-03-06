<?php

use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\VisitorController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\ProductCartController;
use App\Http\Controllers\Admin\ProductListController;
use App\Http\Controllers\Admin\SiteInfoController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ProductDetailsController;

use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\ForgetController;

use App\Http\Controllers\User\ResetController;
use App\Http\Controllers\User\UserController;

use App\Http\Controllers\Admin\ReviewController;

use App\Http\Controllers\Admin\FavouriteController;



// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });



 // Login Routes 
 Route::post('/login',[AuthController::class, 'Login']);

 // Register Routes 
Route::post('/register',[AuthController::class, 'Register']);

// Forget Password Routes 
Route::post('/forgetpassword',[ForgetController::class, 'ForgetPassword']);

Route::post('/resetpassword',[ResetController::class, 'ResetPassword']);

// Current User Route 
Route::get('/user',[UserController::class, 'User'])->middleware('auth:api');


 /////////////// End User Login API Start ////////////////////////

//get visitor
route::get('/getvisitor',[VisitorController:: class,'GetVisitorDetails']);

//post contact 
route::post('/postcontact',[ContactController:: class,'PostContactDetails']);

//siteinfo contact 
route::get('/allsiteinfo',[SiteInfoController:: class,'AllSiteinfo']);

//category 
route::get('/allcategory',[CategoryController:: class,'AllCategory']);

//category 
route::get('/productlistbyremark/{remark}',[ProductListController:: class,'ProductListByRemark']);

route::get('/productlistbycategory/{category}',[ProductListController:: class,'ProductListByCategory']);

route::get('/productlistbysubcategory/{category}/{subcategory}',[ProductListController:: class,'ProductListBySubCategory']);

//slider

route::get('/allslider',[SliderController:: class,'AllSlider']);

//product details
route::get('/productdetails/{id}',[ProductDetailsController:: class,'ProductDetails']);

//slider

route::get('/notification',[NotificationController:: class,'NotificationHistory']);

//product search
route::get('/search/{key}',[ProductListController:: class,'ProductListBySearch']);

// Similar Product Route
Route::get('/similar/{subcategory}',[ProductListController::class, 'SimilarProduct']);

// Review Product Route
// Route::get('/reviewlist/{id}',[ReviewController::class, 'ReviewList']);
Route::get('/reviewlist/{product_code}',[ReviewController::class, 'ReviewList']);

// Product Cart Route
Route::post('/addtocart',[ProductCartController::class, 'addToCart']);

// Cart Count Route
//Route::get('/cartcount/{product_code}',[ProductCartController::class, 'CartCount']);

Route::get('/cartcount/{email}',[ProductCartController::class, 'CartCount']);

// Favourite Route
Route::get('/favourite/{product_code}/{email}',[FavouriteController::class, 'AddFavourite']);

Route::get('/favouritelist/{email}',[FavouriteController::class, 'FavouriteList']);

Route::get('/favouriteremove/{product_code}/{email}',[FavouriteController::class, 'FavouriteRemove']);

// Cart List Route 
Route::get('/cartlist/{email}',[ProductCartController::class, 'CartList']);


Route::get('/removecartlist/{id}',[ProductCartController::class, 'RemoveCartList']);

Route::get('/cartitemplus/{id}/{quantity}/{price}',[ProductCartController::class, 'CartItemPlus']);

Route::get('/cartitemminus/{id}/{quantity}/{price}',[ProductCartController::class, 'CartItemMinus']);

// Cart Order Route
Route::post('/cartorder',[ProductCartController::class, 'CartOrder']);

Route::get('/orderlistbyuser/{email}',[ProductCartController::class, 'OrderListByUser']);


Route::post('/postreview',[ReviewController::class, 'PostReview']);