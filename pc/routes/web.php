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

// Route::get('/', function () {
//     return view('welcome');
// });


/*
*	@origin -> login  后台登录页
*	@origin -> dologin  后台执行登录
*	@origin -> index  后台框架
*	@origin -> exit  后台退出
*/	

Route::group(['domain' => 'www.jsjju.cn'],function (){
// Route::group(['domain' => 'www.new.com'],function (){
    

Route::get('backend/origin-login','Backend\LoginController@login');
Route::post('backend/origin-dologin','Backend\LoginController@dologin');

/*
*	@middleware -> backend  后台路由群组
*/
Route::group(['middleware'=>['backend']],function(){

Route::get('backend/origin-index','Backend\IndexController@index');	
Route::get('backend/origin-exit','Backend\IndexController@exit');	//Exit

/*
*	@member 当前用户
*	@member -> welcome 用户首页 
*	@member -> personal 资料修改页
*	@member -> personal-edit 资料修改
*	@member -> personal-head_portrait 头像上传
*/
Route::get('/backend/member/welcome','Backend\MemberController@welcome');
Route::get('/backend/member/personal','Backend\MemberController@personal');
Route::post('/backend/member/personal-edit','Backend\MemberController@personal_edit');
Route::post('/backend/member/personal-head_portrait','Backend\MemberController@personal_head_portrait');
Route::post('/backend/member/destroy','Backend\MemberController@destroy');

/*
*	@middleware -> rule  权限路由群组
*/
Route::group(['middleware'=>['rule']],function(){

/*
*	@adminlist 管理员管理
*	@adminlist -> index 管理员列表
*	@adminlist -> cate  分类权限
*	@adminlist -> rule  权限管理
*	@adminlist -> role  角色管理
*/
Route::get('/backend/adminlist/index','Backend\AdminListController@index');
Route::post('/backend/adminlist/index-role','Backend\AdminListController@index_role');
Route::post('/backend/adminlist/index-add','Backend\AdminListController@index_add');
Route::get('/backend/adminlist/index-edit','Backend\AdminListController@index_edit');
Route::post('/backend/adminlist/index-status','Backend\AdminListController@index_status');
Route::post('/backend/adminlist/index-del','Backend\AdminListController@index_del');

Route::get('/backend/adminlist/cate','Backend\AdminListController@cate');
Route::post('/backend/adminlist/cate-add','Backend\AdminListController@cate_add');
Route::post('/backend/adminlist/cate-del','Backend\AdminListController@cate_del');
Route::post('/backend/adminlist/cate-edit','Backend\AdminListController@cate_edit');

Route::get('/backend/adminlist/rule','Backend\AdminListController@rule');
Route::post('/backend/adminlist/rule-add','Backend\AdminListController@rule_add');
Route::post('/backend/adminlist/rule-del','Backend\AdminListController@rule_del');
Route::post('/backend/adminlist/rule-edit','Backend\AdminListController@rule_edit');

Route::get('/backend/adminlist/role','Backend\AdminListController@role');
Route::post('/backend/adminlist/role-add','Backend\AdminListController@role_add');
Route::post('/backend/adminlist/role-del','Backend\AdminListController@role_del');
Route::post('/backend/adminlist/role-edit','Backend\AdminListController@role_edit');

/*
*	@sys 系统
*	@config-all 		网站设置 
*	@webconfig-edit 	网站配置修改
*	@zendconfig-edit 	短信配置修改
*	@systemconfig-edit  系统配置修改
*	@front-keyword 		网页关键字
*	@front-keyword-add 	网页关键字添加
*	@front-keyword-edit	网页关键字修改
*	@front-keyword-del	网页关键字删除
*/
Route::get('/backend/sys/config-all','Backend\SysController@config_all');
Route::post('/backend/sys/webconfig-edit','Backend\SysController@webconfig_edit');
Route::post('/backend/sys/zendconfig-edit','Backend\SysController@zendconfig_edit');
Route::post('/backend/sys/systemconfig-edit','Backend\SysController@systemconfig_edit');
Route::post('/backend/sys/ueditor-clear','Backend\SysController@ueditor_clear');
Route::get('/backend/sys/front-keyword','Backend\SysController@front_keyword');
Route::post('/backend/sys/front-keyword-add','Backend\SysController@key_add');
Route::post('/backend/sys/front-keyword-edit','Backend\SysController@key_edit');
Route::post('/backend/sys/front-keyword-del','Backend\SysController@key_del');
Route::post('/backend/sys/front-keyword-image','Backend\SysController@key_image');
Route::post('/backend/sys/front-keyword-del-banner','Backend\SysController@key_del_banner');
/**
*	@menu		后台菜单
*	@frontmenu 	前台导航菜单
* 	@_add		添加
* 	@_edit 		编辑
*  	@_status	状态
*   @_sort 		排序
*   @_del 		删除
*/
Route::get('/backend/sys/menu','Backend\SysController@menu');
Route::post('/backend/sys/menu_add','Backend\SysController@menu_add');
Route::post('/backend/sys/menu_edit','Backend\SysController@menu_edit');
Route::post('/backend/sys/menu_status','Backend\SysController@menu_status');
Route::post('/backend/sys/menu_del','Backend\SysController@menu_del');
Route::post('/backend/sys/menu_sort','Backend\SysController@menu_sort');
Route::get('/backend/sys/frontmenu','Backend\SysController@frontmenu');
Route::post('/backend/sys/frontmenu_add','Backend\SysController@frontmenu_add');
Route::post('/backend/sys/frontmenu_sort','Backend\SysController@frontmenu_sort');
Route::post('/backend/sys/frontmenu_edit','Backend\SysController@frontmenu_edit');
Route::post('/backend/sys/frontmenu_status','Backend\SysController@frontmenu_status');
Route::post('/backend/sys/frontmenu_del','Backend\SysController@frontmenu_del');

/**
*	@leaving-message		留言消息
*	@frontmenu 	前台导航菜单
*  	@_status	状态
*   @_code 		短信回复
*   @_del 		删除
*/
Route::get('/backend/message/leaving-message','Backend\MessageController@leaving_message');
Route::get('/backend/message/leaving-message_re','Backend\MessageController@leaving_message_re');
Route::get('/backend/message/leaving-message_re_re','Backend\MessageController@leaving_message_re_re');
Route::post('/backend/message/leaving-message_status','Backend\MessageController@leaving_message_status');
Route::post('/backend/message/leaving-message_del','Backend\MessageController@leaving_message_del');
Route::post('/backend/message/leaving-message_code','Backend\MessageController@leaving_message_code');

/**
*	@news		新闻
*	@frontmenu 	前台导航菜单
*  	@_status	状态
*   @_code 		短信回复
*   @_del 		删除
*/
Route::get('/backend/dynamic/news-index','Backend\DynamicController@news_index');
Route::post('/backend/dynamic/news-status','Backend\DynamicController@news_status');
Route::post('/backend/dynamic/news-top','Backend\DynamicController@news_top');
Route::any('/backend/dynamic/news-edit','Backend\DynamicController@news_edit');
Route::post('/backend/dynamic/news-del','Backend\DynamicController@news_del');
Route::get('/backend/dynamic/news-add','Backend\DynamicController@news_add');
Route::post('/backend/dynamic/news-adds','Backend\DynamicController@news_adds');
Route::post('/backend/dynamic/news-copy','Backend\DynamicController@news_copy');

//新闻标签
Route::get('/backend/dynamic/label','Backend\DynamicController@label');
Route::post('/backend/dynamic/label-add','Backend\DynamicController@label_add');
Route::post('/backend/dynamic/label-edit','Backend\DynamicController@label_edit');
Route::post('/backend/dynamic/label-del','Backend\DynamicController@label_del');

//团队
Route::get('/backend/about/team','Backend\AboutController@team');
Route::post('/backend/about/team-add','Backend\AboutController@team_add');
Route::post('/backend/about/team-edit','Backend\AboutController@team_edit');
Route::post('/backend/about/team-del','Backend\AboutController@team_del');
//团队成员
Route::get('/backend/about/team/member','Backend\AboutController@member');
Route::post('/backend/about/team/member-add','Backend\AboutController@member_add');
Route::post('/backend/about/team/member-edit','Backend\AboutController@member_edit');
Route::post('/backend/about/team/member-del','Backend\AboutController@member_del');

Route::get('/backend/link','Backend\AboutController@link');
Route::get('/backend/link_re','Backend\AboutController@link_re');
Route::post('/backend/link-add','Backend\AboutController@link_add');
Route::post('/backend/link-edit','Backend\AboutController@link_edit');
Route::post('/backend/link-del','Backend\AboutController@link_del');

Route::get('/backend/carousel','Backend\AboutController@carousel');
Route::post('/backend/carousel-add','Backend\AboutController@carousel_add');
Route::post('/backend/carousel-edit','Backend\AboutController@carousel_edit');
Route::post('/backend/carousel-del','Backend\AboutController@carousel_del');

Route::get('/backend/carousel_web','Backend\AboutController@carousel_web');
Route::post('/backend/carousel-add_web','Backend\AboutController@carousel_add_web');
Route::post('/backend/carousel-edit_web','Backend\AboutController@carousel_edit_web');
Route::post('/backend/carousel-del_web','Backend\AboutController@carousel_del_web');

//FDC楼盘页留言
Route::get('/backend/fdc/leaving-message','Backend\Fdc\MessageController@leaving_message');
Route::post('/backend/fdc/message/leaving-message_status','Backend\Fdc\MessageController@leaving_message_status');
Route::post('/backend/fdc/message/leaving-message_del','Backend\Fdc\MessageController@leaving_message_del');
Route::post('/backend/fdc/message/leaving-message_code','Backend\Fdc\MessageController@leaving_message_code');
//FDC关键字
Route::get('/backend/fdc/sys-keyword','Backend\Fdc\SysController@keyword');
Route::post('/backend/fdc/sys-keyword-add','Backend\Fdc\SysController@keyword_add');
Route::post('/backend/fdc/sys-keyword-edit','Backend\Fdc\SysController@keyword_edit');
Route::post('/backend/fdc/sys-keyword-del','Backend\Fdc\SysController@keyword_del');

//FDC新闻管理
Route::get('/backend/fdc/dynamic/news','Backend\Fdc\DynamicController@news');
Route::get('/backend/fdc/dynamic/news-add','Backend\Fdc\DynamicController@news_add');
Route::post('/backend/fdc/dynamic/news-adds','Backend\Fdc\DynamicController@news_adds');
Route::any('/backend/fdc/dynamic/news-edit','Backend\Fdc\DynamicController@news_edit');
Route::any('/backend/fdc/dynamic/news-del','Backend\Fdc\DynamicController@news_del');

//Fdcbanner
Route::get('/backend/fdc/banner','Backend\Fdc\SysController@banner');
Route::post('/backend/fdc/banner-add','Backend\Fdc\SysController@banner_add');
Route::post('/backend/fdc/banner-edit','Backend\Fdc\SysController@banner_edit');
Route::post('/backend/fdc/banner-del','Backend\Fdc\SysController@banner_del');

Route::get('/backend/test/upimage',function(){
	return view('Backend.Test.upimage');
});
Route::post('/backend/test/upimages','Backend\IndexController@upimages');

});

});
Route::get('/backend/lcon',function(){
	return view('Backend.Sys.lcon');
});
Route::group(['middleware'=>['front']],function(){

Route::get('/','Front\IndexController@index');
Route::post('/index-message','Front\IndexController@message');
Route::post('/index-message-send','Front\IndexController@message_send');

Route::get('/case.html','Front\CaseController@case');

Route::get('/case/baoli.html',function(){
	$arr = array('/front/case/img/Brand_pip1.png','/front/case/img/Brand_pip2.png','/front/case/img/Brand_pip3.png','/front/case/img/Brand_pip4.png','/front/case/img/Brand_pip5.png');
	shuffle($arr);
	return view('/Front.Case.baoli',[
		'arr'=> $arr
	]);
});
Route::get('/case/maikebiology.html',function(){
	$arr = array('/front/case/img/Brand_pip1.png','/front/case/img/Brand_pip2.png','/front/case/img/Brand_pip3.png','/front/case/img/Brand_pip4.png','/front/case/img/Brand_pip5.png');
	shuffle($arr);
	return view('/Front.Case.maikebiology',[
		'arr'=> $arr
	]);
});
Route::get('/case/feidayihao.html',function(){
	$arr = array('/front/case/img/Brand_pip1.png','/front/case/img/Brand_pip2.png','/front/case/img/Brand_pip3.png','/front/case/img/Brand_pip4.png','/front/case/img/Brand_pip5.png');
	shuffle($arr);
	return view('/Front.Case.feidayihao',[
		'arr'=> $arr
	]);
});
Route::get('/case/innovation-incubation.html',function(){
	$arr = array('/front/case/img/Brand_pip1.png','/front/case/img/Brand_pip2.png','/front/case/img/Brand_pip3.png','/front/case/img/Brand_pip4.png','/front/case/img/Brand_pip5.png');
	shuffle($arr);
	return view('/Front.Case.innovation_incubation',[
		'arr'=> $arr
	]);
});
Route::get('/case/defu.html',function(){
	$arr = array('/front/case/img/Brand_pip1.png','/front/case/img/Brand_pip2.png','/front/case/img/Brand_pip3.png','/front/case/img/Brand_pip4.png','/front/case/img/Brand_pip5.png');
	shuffle($arr);
	return view('/Front.Case.defu',[
		'arr'=> $arr
	]);
});
Route::get('/case/liya-dragon-city.html',function(){
	$arr = array('/front/case/img/Brand_pip1.png','/front/case/img/Brand_pip2.png','/front/case/img/Brand_pip3.png','/front/case/img/Brand_pip4.png','/front/case/img/Brand_pip5.png');
	shuffle($arr);
	return view('/Front.Case.liya_dragon_city',[
		'arr'=> $arr
	]);
});
Route::get('/case/luneng-landscape.html',function(){
	$arr = array('/front/case/img/Brand_pip1.png','/front/case/img/Brand_pip2.png','/front/case/img/Brand_pip3.png','/front/case/img/Brand_pip4.png','/front/case/img/Brand_pip5.png');
	shuffle($arr);
	return view('/Front.Case.luneng_landscape',[
		'arr'=> $arr
	]);
});
Route::get('/case/xintiandi.html',function(){
	$arr = array('/front/case/img/Brand_pip1.png','/front/case/img/Brand_pip2.png','/front/case/img/Brand_pip3.png','/front/case/img/Brand_pip4.png','/front/case/img/Brand_pip5.png');
	shuffle($arr);
	return view('/Front.Case.xintiandi',[
		'arr'=> $arr
	]);
});
Route::get('/case/sunshine100.html',function(){
	$arr = array('/front/case/img/Brand_pip1.png','/front/case/img/Brand_pip2.png','/front/case/img/Brand_pip3.png','/front/case/img/Brand_pip4.png','/front/case/img/Brand_pip5.png');
	shuffle($arr);
	return view('/Front.Case.sunshine100',[
		'arr'=> $arr
	]);
});
Route::get('/case/mando.html',function(){
	$arr = array('/front/case/img/Brand_pip1.png','/front/case/img/Brand_pip2.png','/front/case/img/Brand_pip3.png','/front/case/img/Brand_pip4.png','/front/case/img/Brand_pip5.png');
	shuffle($arr);
	return view('/Front.Case.mando',[
		'arr'=> $arr
	]);
});
Route::get('/case/blue-city.html',function(){
	$arr = array('/front/case/img/Brand_pip1.png','/front/case/img/Brand_pip2.png','/front/case/img/Brand_pip3.png','/front/case/img/Brand_pip4.png','/front/case/img/Brand_pip5.png');
	shuffle($arr);
	return view('/Front.Case.blue_city',[
		'arr'=> $arr
	]);
});
Route::get('/case/funfair-games.html',function(){
	$arr = array('/front/case/img/Brand_pip1.png','/front/case/img/Brand_pip2.png','/front/case/img/Brand_pip3.png','/front/case/img/Brand_pip4.png','/front/case/img/Brand_pip5.png');
	shuffle($arr);
	return view('/Front.Case.funfair_games',[
		'arr'=> $arr
	]);
});

Route::get('/team.html','Front\AboutController@team');
Route::get('/{name}/{id?}','Front\NewsController@news')->where('name','gsxw|hyxw');
Route::get('/commerce.html','Front\AboutController@commerce');
Route::get('/about.html','Front\AboutController@about');
Route::post('/about-message','Front\AboutController@message');
Route::post('/about-message-send','Front\AboutController@message_send');
});
});

Route::group(['domain' => 'house.jsjju.cn','namespace' => 'Fdc'],function (){
// Route::group(['domain' => 'house.new.com','namespace' => 'Fdc'],function (){
    Route::get('/','Index\IndexController@index');
    Route::get('/jfxz','Project\ProjectController@jfxz');
    Route::get('/jfxz/{id}','Project\ProjectController@jfxz_news');
    Route::post('/project/message-send','Project\ProjectController@message_send');
    Route::post('/project-message','Project\ProjectController@message');
});
