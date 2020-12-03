<?php

use Illuminate\Support\Facades\Route;
use App\Models\District;

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

Route::get('/', function () {
    //return view('welcome');
});


//Email Routes
//use App\Mail\welcomeMail;

//Route::get('/emails', function(){
//	return new welcomeMail();
//});

//Navbar Routes
Route::get('/', 'Frontend\PagesController@index')->name('index');
Route::get('contact', 'Frontend\PagesController@contact')->name('contact');
Route::post('contact', 'Frontend\PagesController@store')->name('contact.store');
Route::get('blog', 'Frontend\PagesController@blog')->name('blog');
Route::get('blog/readmore/{id}', 'Frontend\PagesController@blogpost_detail')->name('blog.readmore');

//Frontent Products Routes
Route::group(['prefix' => 'products'], function(){
	Route::get('/', 'Frontend\ProductsController@index')->name('products');
	Route::get('/{slug}', 'Frontend\ProductsController@show')->name('products.show');
	Route::get('/sr/search', 'Frontend\PagesController@search')->name('search');

	//Categories Routes
	Route::get('/categories', 'Frontend\CategoriesController@index')->name('categories.index');
	Route::get('/categories/{id}', 'Frontend\CategoriesController@show')->name('categories.show');
});



//User Routes
Route::group(['prefix' => 'user'], function(){
	Route::get('/token/{token}', 'Frontend\VerificationController@verify')->name('user.verification');
	Route::get('/dashboard', 'Frontend\UsersController@dashboard')->name('user.dashboard');
	Route::get('/profile', 'Frontend\UsersController@profile')->name('user.profile');
	Route::post('/profile/update', 'Frontend\UsersController@profileUpdate')->name('user.profile.update');
});

//Cart Routes
Route::group(['prefix' => 'carts'], function(){
	Route::get('/', 'Frontend\CartsController@index')->name('carts');
	Route::post('/store', 'Frontend\CartsController@store')->name('carts.store');
	Route::post('/update/{id}', 'Frontend\CartsController@update')->name('carts.update');
	Route::post('/delete/{id}', 'Frontend\CartsController@destroy')->name('carts.delete');
});

//Checkouts Routes
Route::group(['prefix' => 'checkout'], function(){
	Route::get('/', 'Frontend\CheckoutsController@index')->name('checkouts');
	Route::post('/store', 'Frontend\CheckoutsController@store')->name('checkout.store');
});


//Admin Routes
Route::group(['prefix' => 'admin'], function(){
	Route::get('/', 'Backend\AdminController@index')->name('admin.index');

	// Admin Login Routes
	Route::get('/login', 'Auth\Admin\LoginController@showLoginForm')->name('admin.login');
	Route::post('/login/submit', 'Auth\Admin\LoginController@login')->name('admin.login.submit');
	Route::post('/logout', 'Auth\Admin\LoginController@logout')->name('admin.logout');

	//Admin Password Email Send
	Route::get('/password/reset', 'Auth\Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
	Route::post('/password/reset-email', 'Auth\Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');

    //Admin Reset Password
    Route::get('/password/reset/{token}', 'Auth\Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
	Route::post('/password/reset', 'Auth\Admin\ResetPasswordController@reset')->name('admin.password.reset.post');


	//Product Routes
	Route::group(['prefix' => '/products'], function(){
		Route::get('/', 'Backend\AdminProductController@index')->name('admin.all_products');
		Route::get('/create', 'Backend\AdminProductController@create')->name('admin.product.create');
		Route::post('/store', 'Backend\AdminProductController@store')->name('admin.product.store');
		Route::get('/edit/{id}', 'Backend\AdminProductController@edit')->name('admin.product.edit');
		Route::post('/edit/{id}', 'Backend\AdminProductController@update')->name('admin.product.update');
		Route::post('/delete/{id}', 'Backend\AdminProductController@delete')->name('admin.product.delete');
	});

	//Product Criteria Routes
	Route::group(['prefix' => '/criteria'], function(){
		Route::get('/', 'Backend\AdminProductCriteriaController@index')->name('admin.all_criterias');
		Route::get('/create', 'Backend\AdminProductCriteriaController@create')->name('admin.criteria.create');
		Route::post('/store', 'Backend\AdminProductCriteriaController@store')->name('admin.criteria.store');
		Route::get('/edit/{id}', 'Backend\AdminProductCriteriaController@edit')->name('admin.criteria.edit');
		Route::post('/edit/{id}', 'Backend\AdminProductCriteriaController@update')->name('admin.criteria.update');
		Route::post('/delete/{id}', 'Backend\AdminProductCriteriaController@delete')->name('admin.criteria.delete');
	});

    //Order Routes
    Route::group(['prefix' => '/orders'], function(){
        Route::get('/', 'Backend\OrdersController@index')->name('admin.all_orders');
        Route::get('/view/{id}', 'Backend\OrdersController@show')->name('admin.order.show');
        Route::post('/delete/{id}', 'Backend\OrdersController@delete')->name('admin.order.delete');
        Route::post('/completed/{id}', 'Backend\OrdersController@completed')->name('admin.order.completed');
        Route::post('/paid/{id}', 'Backend\OrdersController@paid')->name('admin.order.paid');
        Route::post('/charge-update/{id}', 'Backend\OrdersController@chargeUpdate')->name('admin.order.charge');
        Route::get('/invoice/{id}', 'Backend\OrdersController@generateInvoice')->name('admin.order.invoice');

    });

	//Category Routes
	Route::group(['prefix' => '/categories'], function(){
		Route::get('/', 'Backend\AdminCategoryController@index')->name('admin.all_categories');
		Route::get('/create', 'Backend\AdminCategoryController@create')->name('admin.category.create');
		Route::post('/store', 'Backend\AdminCategoryController@store')->name('admin.category.store');
		Route::get('/edit/{id}', 'Backend\AdminCategoryController@edit')->name('admin.category.edit');
		Route::post('/edit/{id}', 'Backend\AdminCategoryController@update')->name('admin.category.update');
		Route::post('/delete/{id}', 'Backend\AdminCategoryController@delete')->name('admin.category.delete');
	});

	//Brand Routes
	Route::group(['prefix' => '/brands'], function(){
		Route::get('/', 'Backend\AdminBrandController@index')->name('admin.all_brands');
		Route::get('/create', 'Backend\AdminBrandController@create')->name('admin.brand.create');
		Route::post('/store', 'Backend\AdminBrandController@store')->name('admin.brand.store');
		Route::get('/edit/{id}', 'Backend\AdminBrandController@edit')->name('admin.brand.edit');
		Route::post('/edit/{id}', 'Backend\AdminBrandController@update')->name('admin.brand.update');
		Route::post('/delete/{id}', 'Backend\AdminBrandController@delete')->name('admin.brand.delete');
	});

	//Division Routes
	Route::group(['prefix' => '/divisions'], function(){
		Route::get('/', 'Backend\AdminDivisionController@index')->name('admin.all_divisions');
		Route::get('/create', 'Backend\AdminDivisionController@create')->name('admin.division.create');
		Route::post('/store', 'Backend\AdminDivisionController@store')->name('admin.division.store');
		Route::get('/edit/{id}', 'Backend\AdminDivisionController@edit')->name('admin.division.edit');
		Route::post('/edit/{id}', 'Backend\AdminDivisionController@update')->name('admin.division.update');
		Route::post('/delete/{id}', 'Backend\AdminDivisionController@delete')->name('admin.division.delete');
	});

	//District Routes
	Route::group(['prefix' => '/districts'], function(){
		Route::get('/', 'Backend\AdminDistrictController@index')->name('admin.all_districts');
		Route::get('/create', 'Backend\AdminDistrictController@create')->name('admin.district.create');
		Route::post('/store', 'Backend\AdminDistrictController@store')->name('admin.district.store');
		Route::get('/edit/{id}', 'Backend\AdminDistrictController@edit')->name('admin.district.edit');
		Route::post('/edit/{id}', 'Backend\AdminDistrictController@update')->name('admin.district.update');
		Route::post('/delete/{id}', 'Backend\AdminDistrictController@delete')->name('admin.district.delete');
	});

    //Slider Routes
    Route::group(['prefix' => '/sliders'], function(){
        Route::get('/', 'Backend\SlidersController@index')->name('admin.all_sliders');
        //Route::get('/create', 'Backend\SlidersController@create')->name('admin.slider.create');
        Route::post('/store', 'Backend\SlidersController@store')->name('admin.slider.store');
        Route::post('/edit/{id}', 'Backend\SlidersController@update')->name('admin.slider.update');
        Route::post('/delete/{id}', 'Backend\SlidersController@delete')->name('admin.slider.delete');
    });

    //Contact Details Routes
	Route::group(['prefix' => '/contactDetails'], function(){
		Route::get('/', 'Backend\AdminContactDetailsController@index')->name('admin.all_contactDetails');
		// Route::get('/create', 'Backend\AdminContactDetailsController@create')->name('admin.contactDetails.create');
		Route::post('/store', 'Backend\AdminContactDetailsController@store')->name('admin.contactDetails.store');
		// Route::get('/edit/{id}', 'Backend\AdminContactDetailsController@edit')->name('admin.contactDetails.edit');
		Route::post('/edit/{id}', 'Backend\AdminContactDetailsController@update')->name('admin.contactDetails.update');
		Route::post('/delete/{id}', 'Backend\AdminContactDetailsController@delete')->name('admin.contactDetails.delete');
	});

	//Contact Emails Routes
	Route::group(['prefix' => '/contactEmails'], function(){
		Route::get('/', 'Backend\AdminContactEmailsController@index')->name('admin.all_contactEmails');
		// Route::get('/create', 'Backend\AdminContactDetailsController@create')->name('admin.contactDetails.create');
		Route::post('/store', 'Backend\AdminContactEmailsController@store')->name('admin.contactEmails.store');
		// Route::get('/edit/{id}', 'Backend\AdmincontactEmailsController@edit')->name('admin.contactEmails.edit');
		//Route::post('/edit/{id}', 'Backend\AdminContactEmailsController@update')->name('admin.contactEmails.update');
		Route::post('/delete/{id}', 'Backend\AdminContactEmailsController@delete')->name('admin.contactEmails.delete');
	});

	//Contact Map Routes
	Route::group(['prefix' => '/contactMap'], function(){
		Route::get('/', 'Backend\AdminContactMapController@index')->name('admin.all_contactMap');
		//Route::get('/create', 'Backend\AdminContactDetailsController@create')->name('admin.contactDetails.create');
		Route::post('/store', 'Backend\AdminContactMapController@store')->name('admin.contactMap.store');
		// Route::get('/edit/{id}', 'Backend\AdmincontactEmailsController@edit')->name('admin.contactEmails.edit');
		Route::post('/edit/{id}', 'Backend\AdminContactMapController@update')->name('admin.contactMap.update');
		Route::post('/delete/{id}', 'Backend\AdminContactMapController@delete')->name('admin.contactMap.delete');
	});

	//Blog Posts Routes
	Route::group(['prefix' => '/blogPosts'], function(){
		Route::get('/', 'Backend\AdminBlogPostsController@index')->name('admin.all_blogPosts');
		//Route::get('/create', 'Backend\AdminContactDetailsController@create')->name('admin.contactDetails.create');
		Route::post('/store', 'Backend\AdminBlogPostsController@store')->name('admin.blogPosts.store');
		// Route::get('/edit/{id}', 'Backend\AdmincontactEmailsController@edit')->name('admin.contactEmails.edit');
		Route::post('/edit/{id}', 'Backend\AdminBlogPostsController@update')->name('admin.blogPosts.update');
		Route::post('/delete/{id}', 'Backend\AdminBlogPostsController@delete')->name('admin.blogPosts.delete');
	});

	//Blog Post Criterias Routes
	Route::group(['prefix' => '/blogCriterias'], function(){
		Route::get('/', 'Backend\AdminBlogCriteriasController@index')->name('admin.all_blog_criterias');
		//Route::get('/create', 'Backend\AdminContactDetailsController@create')->name('admin.contactDetails.create');
		Route::post('/store', 'Backend\AdminBlogCriteriasController@store')->name('admin.blogCriterias.store');
		// Route::get('/edit/{id}', 'Backend\AdmincontactEmailsController@edit')->name('admin.contactEmails.edit');
		Route::post('/edit/{id}', 'Backend\AdminBlogCriteriasController@update')->name('admin.blogCriterias.update');
		Route::post('/delete/{id}', 'Backend\AdminBlogCriteriasController@delete')->name('admin.blogCriterias.delete');
	});

});





Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

//API routes
Route::get('get-districts/{id}', function ($id){
    return json_encode(District::where('division_id', $id)->get());
});


//Socialite (Google Login) Routes
//Route::get('login/google', 'Auth\LoginController@redirectToProvider')->;
//Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallback')->name('login/google/callback');

Route::get('oauth/{driver}', 'Auth\LoginController@redirectToProvider')->name('social.oauth');
Route::get('oauth/{driver}/callback', 'Auth\LoginController@handleProviderCallback')->name('social.callback');

//Socialite (Facebook Login) Routes
//Route::get('login/facebook/{driver}', 'Auth\LoginController@redirectToProvider');
//Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback')->name('login/facebook/callback');

