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


Route::group(['middleware'=>['front']],function(){

Route::get('/','Front\IndexController@index');
Route::post('/index-message','Front\IndexController@index_message');
Route::post('/index-message-send','Front\IndexController@message_send');
Route::get('/team.html','Front\AboutController@team');
Route::get('/discount.html','Front\AboutController@discount');
Route::get('/partner.html','Front\AboutController@partner');
Route::get('/about.html','Front\AboutController@about');
Route::get('/guarantee.html','Front\AboutController@guarantee');
Route::get('/{name}/{id?}','Front\NewsController@news')->where('name','gsxw|hyxw');
Route::get('/honor.html','Front\AboutController@honor');
Route::get('/hardcover.html','Front\AboutController@hardcover');
Route::get('/case.html','Front\CaseController@case');
Route::get('/design.html','Front\AboutController@design');
Route::post('/design-message','Front\AboutController@message');
Route::post('/design-message-send','Front\AboutController@message_send');

Route::get('/case/baoli.html',function(){
	$arr = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24);
	shuffle($arr);
	return view('/Front.Case.baoli',[
		'arr'=> $arr,
		'label'=>array('url'=>'/case.html','title'=>'案例详情')
	]);
});
Route::get('/case/maikebiology.html',function(){
	$arr = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24);
	shuffle($arr);
	return view('/Front.Case.maikebiology',[
		'arr'=> $arr,
		'label'=>array('url'=>'/case.html','title'=>'案例详情')
	]);
});
Route::get('/case/feidayihao.html',function(){
	$arr = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24);
	shuffle($arr);
	return view('/Front.Case.feidayihao',[
		'arr'=> $arr,
		'label'=>array('url'=>'/case.html','title'=>'案例详情')
	]);
});
Route::get('/case/innovation-incubation.html',function(){
	$arr = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24);
	shuffle($arr);
	return view('/Front.Case.innovation_incubation',[
		'arr'=> $arr,
		'label'=>array('url'=>'/case.html','title'=>'案例详情')
	]);
});
Route::get('/case/defu.html',function(){
	$arr = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24);
	shuffle($arr);
	return view('/Front.Case.defu',[
		'arr'=> $arr,
		'label'=>array('url'=>'/case.html','title'=>'案例详情')
	]);
});
Route::get('/case/liya-dragon-city.html',function(){
	$arr = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24);
	shuffle($arr);
	return view('/Front.Case.liya_dragon_city',[
		'arr'=> $arr,
		'label'=>array('url'=>'/case.html','title'=>'案例详情')
	]);
});
Route::get('/case/luneng-landscape.html',function(){
	$arr = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24);
	shuffle($arr);
	return view('/Front.Case.luneng_landscape',[
		'arr'=> $arr,
		'label'=>array('url'=>'/case.html','title'=>'案例详情')
	]);
});
Route::get('/case/xintiandi.html',function(){
	$arr = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24);
	shuffle($arr);
	return view('/Front.Case.xintiandi',[
		'arr'=> $arr,
		'label'=>array('url'=>'/case.html','title'=>'案例详情')
	]);
});
Route::get('/case/sunshine100.html',function(){
	$arr = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24);
	shuffle($arr);
	return view('/Front.Case.sunshine100',[
		'arr'=> $arr,
		'label'=>array('url'=>'/case.html','title'=>'案例详情')
	]);
});
Route::get('/case/mando.html',function(){
	$arr = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24);
	shuffle($arr);
	return view('/Front.Case.mando',[
		'arr'=> $arr,
		'label'=>array('url'=>'/case.html','title'=>'案例详情')
	]);
});
Route::get('/case/blue-city.html',function(){
	$arr = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24);
	shuffle($arr);
	return view('/Front.Case.blue_city',[
		'arr'=> $arr,
		'label'=>array('url'=>'/case.html','title'=>'案例详情')
	]);
});
Route::get('/case/funfair-games.html',function(){
	$arr = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24);
	shuffle($arr);
	return view('/Front.Case.funfair_games',[
		'arr'=> $arr,
		'label'=>array('url'=>'/case.html','title'=>'案例详情')
	]);
});
});
