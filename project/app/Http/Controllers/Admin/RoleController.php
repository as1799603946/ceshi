<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Node;
use DB;


class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	//查询所有数据
    	$data = Role::get();
        return view('admin.role.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        //dd($data);
        $res = Role::create($data);
        if($res){
        	return redirect('/roles')->with('success','添加角色成功');
        } else{
        	return back()->with('error','添加角色失败');
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
    	$data = Role::find($id);
        return view('admin.role.edit',['data'=>$data]);
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
        $data = Role::find($id);
        $data['rname'] = $request->input('rname');
        $res = $data->save();
        if($res){
        	return redirect('/roles')->with('sueecss','修改成功');
        }else{
        	return back()->with('error','修改失败');
        }
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

    //ajax 删除
    public function roledel(Request $request)
    {
    	$id = $request->input('id');
    	//echo $id;
    	//dump($id);
    	//删除数据库的数据
    	if(Role::where('id','=',$id)->delete()){
    		echo 1;
    	}
    }

    //角色分配权限
    public function auth($id)
    {
    	//获取用户的角色
    	$role = Role::where('id','=',$id)->first();
    	//获取所有权限
    	$node = Node::get();
    	//获取当前角色已有的权限信息
    	$data = DB::table('roles_nodes')->where('rid','=',$id)->get();
    	$nids = array();
    	//判断
    	if(count($data)){
    		//遍历
    		foreach($data as $k=>$v){
    			$nids[]=$v->nid;
    		}

    		//加载页面
    		return view('admin.role.auth',['role'=>$role,'node'=>$node,'data'=>$data,'nids'=>$nids]);
    	}else{
    		return view('admin.role.auth',['role'=>$role,'node'=>$node,'nids'=>array()]);
    	}
    	
    }

    //提交保存分配权限
    public function saveauth(Request $request)
    {
    	//dd($request->all());
    	//获取分配的权限
    	$nids = $request->input('nids');
    	//删除当前角色已有的角色信息
    	DB::table('roles_nodes')->where('rid','=',$request->input('rid'))->delete();
    	//遍历
    	foreach($nids as $k=>$v){
    		//存入数据库
    		$data['rid'] = $request->input('rid');
    		$data['nid'] = $v;

    		DB::table('roles_nodes')->insert($data);
    	}

    	return redirect('/roles')->with('success','权限分配成功');
    }
}
