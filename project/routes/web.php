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


//后台登录
Route::get('/adminlogin/create','Admin\AdminLoginController@create');
Route::resource('/adminlogin','Admin\AdminLoginController');

//后台路由组
Route::group(['middleware'=>'adminlogin'],function(){
	//后台首页
	Route::get('/admin','Admin\AdminuserController@index');
	//管理员分配角色
	Route::get('/role/{id}','Admin\AdminuserController@role');
	//提交保存角色
	Route::post('/saverole','Admin\AdminuserController@saverole');
	//后台管理员	
	Route::resource('/adminuser','Admin\AdminuserController');

	//角色添加
	Route::resource('/roles','Admin\RoleController');
	//角色ajax删除
	Route::get('/roledel','Admin\RoleController@roledel');
	//角色分配权限
	Route::get('/auth/{id}','Admin\RoleController@auth');
	//提交保存角色分配
	Route::post('/saveauth','Admin\RoleController@saveauth');

	//后台分类
	Route::resource('/cates','Admin\CateController');
	//后台商品管理
	Route::resource('/shops','Admin\ShopController');

	//后台权限版块
	Route::resource('/nodes','Admin\NodeController');
	//前台用户管理
	Route::resource('/users','Admin\UserController');

    //公告ajax 批量删除
	Route::get('/articledel','Admin\ArticlesController@articledel');
	//公告
	Route::resource('/articles','Admin\ArticlesController');

	//后台订单管理
    Route::resource('/orders','Admin\OrdersController');
    //后台轮播图管理
    Route::resource('imgs','Admin\ImgController');

    //友情链接已审核
    Route::get("/admin/friend/tong/{id}","Admin\FriendController@tong");

   //友情链接已审核
    Route::get("/admin/friend/indexs","Admin\FriendController@indexs");

   //友情链接
    Route::resource("/admin/friend","Admin\FriendController");
		
});





//前台首页
Route::resource('/home','Home\IndexController');
//前台个人中心
Route::resource('/info','Home\InfoController');
//前台注册页面
Route::resource('/homeregister','Home\RegisterController');
//测试邮件发送1
Route::get('/send','Home\RegisterController@send');
//测试邮件发送2
Route::get('/send1','Home\RegisterController@send1');
Route::get('/send2','Home\RegisterController@send2');
//测试校验码
Route::get('/code','Home\RegisterController@code');
//激活
Route::get('/jihuo','Home\RegisterController@jihuo');
//测试发送短信
Route::get('/sendphones','Home\RegisterController@sendphones');
//发送短信路由
Route::get('/sendp','Home\RegisterController@sendp');
//手机号校验
Route::get('/checkphone','Home\RegisterController@checkphone');
//手机验证码检测
Route::get('/checkcode','Home\RegisterController@checkcode');
//前台登录
Route::resource('/homelogin','Home\LoginController');
//前台退出
Route::get('/logout','Home\IndexController@logout');



//忘记密码
Route::get('/forget','homeloginme\LoginController@forget');
Route::post('/doforget','Home\LoginController@doforget');
Route::get('/reset','Home\LoginController@reset');
Route::post('/doreset','Home\LoginController@doreset');

Route::group(['middleware'=>'homelogin'],function(){
	//购物车
    Route::resource('/cart','Home\CartController');
    Route::get('/alldelete','Home\CartController@alldelete');  
    //减
    Route::get('/cartupdatee','Home\CartController@cartupdatee');
    //加
    Route::get('/cartupdate','Home\CartController@cartupdate');
    //删除单条数据
    Route::get('/cartdel','Home\CartController@cartdel');
    //计算总件数和总价格
    Route::get('/tot','Home\CartController@tot');
    //结算
    Route::get('/jiesuan','Home\OrderController@jiesuan');
    //跳转到结算页
    Route::get('/order/insert','Home\OrderController@insert');
    //添加收货地址
    Route::post('/address/insert','Home\AddressController@insert');
    //获取城市级联收货地址
    Route::get('/address','Home\AddressController@address');
    //切换收货地址
    Route::get('/chooseaddress','Home\AddressController@chooseaddress');
    //下单操作
    Route::post('/order/create','Home\OrderController@orderinsert');
    //支付测试
    Route::get('/pay','Home\OrderController@pay');
    //支付完毕后返回的通知
    Route::get('/returnurl','Home\OrderController@returnurl');
    //前台个人中心的订单
    Route::get('/order','Home\InfoController@order');
    //确认收货
    Route::get('/queren/{oid}','Home\InfoController@queren');
});

//前台友情链接申请提交成功提示页面
Route::get("/home/friend/ok","Home\FriendController@ok");
//前台友情链接
Route::resource("/friend","Home\FriendController");

