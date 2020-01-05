<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Monolog\Handler\PHPConsoleHandler;
use App\Models\Cate;
use App\Models\Shop;
use App\Services\OSS;//阿里云oss类
use DB;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public static function getPidCatesData($pid = 0)
    {
        //获取一级分类
        $data = Cate::where('pid',$pid)->get();
        //递归 获取无限极分类
        foreach($data as $k=>$v){
            $v->sub = self::getPidCatesData($v->id);
        }
        return $data;
    }

     public static function getCateByPid($pid){
        $cate=DB::table("cates")->where("pid","=",$pid)->get();
        //遍历
        $data=[];
        foreach($cate as $key=>$value){
            //获取父类下的子类信息，存储在suv下标里 递归
            $value->suv=self::getCateByPid($value->id);
            $data[]=$value;
        }
        return $data;
    } 

   
    public function index()
    {
        //轮播图
        $img = DB::table('imgs')->get();

        $cate=self::getCateByPid(0);
        //获取顶级分类下的所有商品数据 点心/蛋糕=》4  熟食/肉类 =》2
        $cates=DB::table("cates")->where("pid","=",0)->get();
        foreach($cate as $k=>$v){
            //dump($v);
            //获取顶级分类下的所有商品信息
            $shop[]=DB::table('shops')->join('cates','shops.cate_id','=','cates.id')->select('cates.id as cid','cates.cname','shops.id as sid','shops.sname','shops.pic','shops.descr','shops.num','shops.price')->where('shops.cate_id','=',$v->id)->get();
        }

        //友情链接
        $Friend = DB::table("friend")->where("status","=",1)->get();
        return view('home.index.index',['cate'=>$cate,'shop'=>$shop,'img'=>$img,'friend'=>$Friend]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */



    public function store(Request $request)
    {
        

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //获取单条数据
        $info = Shop::where('id','=',$id)->first();
        return view('home.index.info',['info'=>$info]);
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

     public function logout(Request $request)
    {
        //清除登录是的session
        $request->session()->pull('email');
        return redirect('/homelogin');
    }


}
