<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Adminuser;
use App\Models\Role;
use Hash;
use DB;

class AdminuserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	$key = $request->input('keywords');

    	
    	//查询所有数据  分页
        $data = AdminUser::where('uname','like','%'.$key.'%')->paginate(2);
    	//dump($data);
        return view('admin.adminuser.index',['data'=>$data,'request'=>$request->all()]); // request获取分页id分配过去
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.adminuser.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	//获取除token外的数据
        $data = $request->except(['_token']);
        //dump($data);
        //密码加密
        $data['upass'] = Hash::make($data['upass']);
        if(Adminuser::create($data)){
        	return redirect('/adminuser')->with('success','添加成功');
        } else{
        	return back()->with('error','添加失败');
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
    	$adminuser = Adminuser::find($id);
        return view('admin/adminuser/edit',['adminuser'=>$adminuser]);	
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
        $adminuser = Adminuser::find($id);
        //	dump($adminuser);
        $adminuser['uname'] = $request->input('uname');
        $adminuser['upass'] = Hash::make($request->input('upass'));
        $res = $adminuser->save();
        if($res){
        	return redirect('/adminuser')->with('success','修改成功');
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
        //删除
        if(Adminuser::where('id','=',$id)->delete()){
        	return redirect('/adminuser')->with('success','删除成功');
        }else{
        	return back()->with('error','删除失败');
        }
    }

    //添加角色
    public function role($id)
    {
        //获取管理员信息
        $user = Adminuser::where('id','=',$id)->first();
        //获取全部的角色信息
        $role = Role::get();
        //dd($role);
        //获取当前用户已有的角色
        $data = DB::table('adminusers_roles')->where('uid','=',$id)->get();
        $rids = array();
        //判断 rid为空走下面区间 不为空走上面区间
        if(count($data)){
            //遍历
            foreach($data as $k=>$v){
                //把当前用户以后角色ID存在数组里
                $rids[] = $v->rid;
            }
            return view('admin.adminuser.role',['user'=>$user,'role'=>$role,'rids'=>$rids]);
        }else{
            return view('admin.adminuser.role',['user'=>$user,'role'=>$role,'rids'=>array()]);
        }
        
    }

    //提交保存角色
    public function saverole(Request $request)
    {
        //获取选择的角色
        $role = $request->input('rids');
        //dump($role);
        //删除用户已有的角色
        DB::table('adminusers_roles')->where('uid',$request->input('uid'))->delete();
        //遍历
        foreach($role as $k=>$v){
            //插入数据
            $data['rid'] = $v;
            //用户id
            $data['uid'] = $request->input('uid');
            DB::table('adminusers_roles')->insert($data);
        }

        return redirect('/adminuser')->with('success','角色分配成功');
    }
}
