 <?php

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
    return view('welcome');
});

Auth::routes();


$router->group(['middleware' => 'auth'], function() {
    // lots of routes that require auth middleware
    Route::get('/home', 'HomeController@index')->name('home'); 
    Route::post('/step_one', 'HomeController@step_one')->name('step_one');
    Route::post('/step_two', 'HomeController@step_two')->name('step_two'); 
    Route::post('/step_three', 'HomeController@step_three')->name('step_three');
    Route::post('/step_four', 'HomeController@step_four')->name('step_four'); 
    Route::post('/step_five', 'HomeController@step_five')->name('step_five'); 
    Route::post('/step_six', 'HomeController@step_six')->name('step_six'); 
    Route::post('/findstep', 'HomeController@findstep')->name('findstep'); 
    Route::any('/customers', 'HomeController@customerList')->name('customerList'); 
    Route::any('/customers/data', 'HomeController@customerData')->name('customer.list'); 

   /* Customer Record Route */
    Route::post('/addCustomer', 'HomeController@addCustomer')->name('addCustomer'); 
    Route::post('/editCustomer/{user}', 'HomeController@editCustomer')->name('editCustomer'); 
    Route::post('/updateCustomer/{user}', 'HomeController@updateCustomer')->name('updateCustomer'); 


    /* Customer Filtered Record Route */
    Route::post('/searchrecord', 'HomeController@searchRecord')->name('searchrecord');

    /* Common Routes */
    Route::match(['get', 'post'],'delete/item', 'CommonController@delete')->name('admin.delete');

    /* Customers Details Exports Route */
    Route::get('customers/exports','HomeController@export')->name('customers.exports');

    Route::resource('/business_details', 'BusinessDetailsController'); 
   
});

