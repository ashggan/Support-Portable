<?php
Route::get('/', function () {
	switch (Auth::guard()->check()) {
		case 'client':
			return view('client.dashboard');
			break;
		case 'web':
			 // 	// if(Auth::user()->hasRole('superadministrator')) {
		// 	// 	return redirect()->route('users.index');
		// 	// }elseif(Auth::user()->hasRole('administrator')) {
		// 	// 	return redirect()->route('manage.requests');
		// 	// }elseif(Auth::user()->hasRole('administrator')){
		// 	// 	return redirect()->route('manage.requests');
		// 	// }else{
		// 	// 	return redirect()->back();
		// 	// }

		default:
			 return  view('welcome');
			break;
	}    
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

	Route::prefix('client')->group(function(){
		Route::get('/login','Auth\ClientLoginController@loginForm')->name('client.login');
		Route::post('/login','Auth\ClientLoginController@login')->name('client.login.submit');
		Route::get('/', 'ClientController@index')->name('client.dashboard');
		Route::get('/show/{id}','ClientController@show')->name('client.show');	
		Route::put('/update/{id}','ClientController@update')->name('client.update');	
		Route::get('/edit/{id}','ClientController@edit')->name('client.edit');	
		Route::get('/edit-req/{id}','ClientController@editReq')->name('client.edit-req');	

		Route::post('/logout','Auth\ClientLoginController@logout')->name('client.logout');
	});

	Route::prefix('request')->group(function(){
		Route::get('/create','RequestContrller@create')->name('request.create');
		Route::get('/list','RequestContrller@list')->name('request.list');
		Route::get('/all','RequestContrller@all')->name('request.all');
		Route::get('/show/{id}','RequestContrller@show')->name('request.show');
		Route::put('/update','RequestContrller@update')->name('request.submit');
		Route::post('/store','RequestContrller@store')->name('request.store');
 		Route::post('/search','RequestContrller@search')->name('request.search');
});


// ->middleware('role:superadministrator|administrator')
Route::prefix('admin')->middleware('role:superadministrator' )->group(function(){

	Route::get('/client/register','Auth\ClientRegisteration@create')->name('client.page');
	Route::get('/client/edit/{id}','Auth\ClientRegisteration@edit')->name('manage.client.edit');

	Route::post('/client/register','Auth\ClientRegisteration@register')->name('client.register');
	Route::put('/client/update/{id}','Auth\ClientRegisteration@update')->name('admin.client.update');


	Route::get('/dashboard','AdminController@dashboard');
	Route::resource('/users', 'UserController')->except('show');
	Route::post('/search','UserController@search')->name('admin.users.search');
	Route::put('/suspense/{id}','UserController@suspense')->name('users.suspense');
		
});

Route::get('admin/users/{id}','UserController@show')->middleware('role:superadministrator|admin|support')->name('users.show');

Route::prefix('profile')->middleware('role:superadministrator|support|administrator')->group(function(){  
	Route::get('/','UserController@modify')->name('user.profile.modify');	
	Route::put('/{id}','UserController@change')->name('user.profile.change');

}); 



// manage requests 
Route::prefix('manage/requests')->group(function(){
	Route::get('/','manageRequestController@index')->name('manage.requests');
	Route::get('/show/{id}','manageRequestController@show')->name('manage.requests.show');
	Route::get('/edit/{id}','manageRequestController@edit')->name('manage.requests.edit');
	Route::get('/solve/{id}','manageRequestController@solve')->name('manage.requests.solve');
	Route::get('/assign/{id}','manageRequestController@assign')->name('manage.requests.assign');
	Route::put('/solved/{id}','manageRequestController@solved')->name('manage.requests.solved');
	Route::put('/assigned/{id}','manageRequestController@assigned')->name('manage.requests.assigned');
	Route::post('/search','manageRequestController@search')->name('manage.requests.search');
	Route::get('/closed','manageRequestController@closed')->name('manage.requests.closed');
	Route::put('/cancel/{id}','manageRequestController@cancel')->name('manage.requests.cancel'); 
	Route::delete('/delete/{id}','manageRequestController@delete')->name('manage.requests.delete'); 
	Route::put('/feedback/{id}','manageRequestController@feedback')->name('manage.requests.feedback'); 
	

}) ;

// Route::prefix('assignee')->middleware('role:hasRole' )->group(function(){
// 	Route::get('/','manageRequestController@index')->name('manage.requests');
// });



// manage clients
Route::prefix('manage/clients')->group(function(){
	Route::get('/','manageClientsController@index')->name('manage.clients');
	Route::post('/search','manageClientsController@search')->name('manage.clients.search');
	Route::get('/show/{id}','manageClientsController@show')->name('manage.clients.show');
	Route::put('/suspense/{id}','manageClientsController@suspense')->name('manage.clients.suspense');
	Route::delete('/delete/{id}','manageClientsController@delete')->name('manage.clients.delete');
	
});

Route::prefix('permission')->group(function(){
	Route::get('/','PermissionController@index')->name('permission.index');
	Route::post('/create','PermissionController@stroe')->name('permission.create');
	Route::get('/edit/{id}','PermissionController@edit')->name('permission.edit');
	Route::get('/show/{id}','PermissionController@show')->name('permission.show');
	Route::put('/update/{id}','PermissionController@update')->name('permission.update');
	Route::delete('/delete','PermissionController@delete')->name('permission.delete');
 });

Route::prefix('role')->group(function(){
	Route::resource('/role', 'RoleController');	
});

