<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;

class AdminLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	//退出 清除session
    	$request->session()->pull('isadmin');
    	//返回登录页面
    	return redirect('/adminlogin/create');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	//加载登录页面
        return view('admin/login/index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	//接收传过来的数据
        $uname = $request->input('uname');
        $upass = $request->input('upass');
        
        // 检测名字  查询信息与数据库对比
        $row = DB::table('admin_user')->where('uname','=',$uname)->first();

        if($row){
        	if(Hash::check($upass,$row->upass)){
        		//存储session
        		session(['isadmin'=> $uname]);
                //1.获取后台登录用户的权限信息
                $list = DB::select("select n.cname,n.aname,n.desc from adminusers_roles as ur,roles_nodes as rn,nodes as n where rn.rid=ur.rid and rn.nid=n.id and uid={$row->id}");
                //dd($list);
                //2.初始化权限
                //加入后台首页的权限
                $nodelist['AdminuserController'][] = 'index';
                //遍历list
                foreach($list as $k=>$v){
                	//把后台首页的权限写到登陆用户权限里
                	$nodelist[$v->cname][]=$v->aname;
                	//判断权限如果有create 添加store
                	if($v->aname=="create"){
                		$nodelist[$v->cname][]="store";
                	}
                	//判断权限如果有edit 添加update
                	if($v->aname=="edit"){
                		$nodelist[$v->cname][]="update";
                	}
                }

                //dd($nodelist);
                //3.把初始化的权限的信息存储在session里
                session(['nodelist'=>$nodelist]);


        		return redirect('/admin');
        	}else{
        		return back()->with('error','密码错误');
        	}
        }else{
        	return back()->with('error','用户名错误');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
