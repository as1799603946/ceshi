<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\OSS;//阿里云oss类
use DB;

class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //前台个人中心订单
    public function order(Request $request)
    {
        $id = session('user_id');
        $status = $request->input('status');
        //dd($status);
        $data = DB::table('orders')->join('orders_goods','orders.id','=','orders_goods.order_id')->where('orders.user_id','=',$id)->select('orders.order_num','orders_goods.pic','orders_goods.num','orders_goods.tot','orders.status','orders.id as oid')->get();
        //dd($data);
        return view("home.index.homeorder",['data'=>$data]);
    }

    //确认收货
    public function queren($oid)
    {
        //echo $oid;
        $data = DB::table('orders')->where('id','=',$oid)->get();
//     dd($data);
           $data['status'] = 4;
           $a['status'] = $data['status'];
//    dd($data);
       $res = DB::table('orders')->where('id','=',$oid)->update($a);
       if($res){
           return redirect('/order');
       }

    }


    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $a = DB::table('users')->where('email','=',session('email'))->first();
        $uid = $a->id;
        $data = DB::table('users_infos')->where('uid','=',$uid)->first();
        $profile = $data->profile;
        return view('home.index.user',['profile'=>$profile]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //个人信息提交
    public function store(Request $request)
    {
        $uid = session('user_id');
        //dd($request->all());
        //通过阿里云OSS上传团片
        // $newfile 上传图片名字   $filepath 上传临时资源目录
        if($request->hasFile('profile')){
            //获取上传的图片资源
            $res=$request->file('profile');
            //初始化图片的名字
            $name=time()+rand();
            //获取上传图片的后缀
            $ext=$request->file("profile")->getClientOriginalExtension();
            $newfile=$name.".".$ext;

            //获取上传临时资源目录
            $filepath=$res->getRealPath();
            //上传
            OSS::upload($newfile, $filepath);
            $data['uid'] = $uid;
            $data['age'] = $request->age;
            $data['phone'] = $request->phone;
            $data['qq'] = $request->qq;
            $data['profile']=env('ALIOSSURL').$newfile;
            //入库
            $res = DB::table('users_infos')->insert($data);
            //dump($res);
            if($res){

                return redirect('/home');
            }
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
