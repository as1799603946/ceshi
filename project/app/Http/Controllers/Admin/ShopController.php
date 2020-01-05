<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Shop;
use App\Services\OSS;//阿里云oss类
use Markdown;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$data = DB::table('shops')->join('cates','cates.id','=','shops.cate_id')->select('cname','shops.id as sid','sname','pic','descr','num','price')->get();
        return view('admin.shop.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	//获取分类信息
    	$cate = DB::table('cates')->get();
        return view('admin.shop.create',['cate'=>$cate]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	// dd($request->all());
         //通过阿里云OSS上传团片
        // $newfile 上传图片名字   $filepath 上传临时资源目录
        if($request->hasFile('pic')){
        	//获取上传的图片资源
        	$res=$request->file('pic');
        	//初始化图片的名字
            $name=time()+rand();
            //获取上传图片的后缀
            $ext=$request->file("pic")->getClientOriginalExtension();
            $newfile=$name.".".$ext;

            //获取上传临时资源目录
        	$filepath=$res->getRealPath();
            //上传
        	OSS::upload($newfile, $filepath);
        	     //入库
            $data['sname']=$request->input("sname");
            $data['cate_id']=$request->input("cate_id");
            $data['pic']=env('ALIOSSURL').$newfile;
            $data['descr']=Markdown::convertToHtml($request->input('descr'));
            $data['num']=$request->input('num');
            $data['price']=$request->input('price');

             // dd($data);
            $data1 = Shop::create($data);
            // $data1=DB::table("shops")->insert($data);
            //获取刚刚插入数据的ID
            //$id = $data1->id;
            //把id也传到redis缓存服务器里
            //$data['id'] = $id;
            if($data1){
                 //echo 1;
                //链表名字 存储ID
                //$listkey = 'PHP219LISTS:php219ARTICLE';
                //哈希表名
                //$hashkey = 'PHP219HASH:php219ARTICLE';
                //把数据添加到redis缓存服务器里
                //添加id到链表里
                //Redis::rpush($listkey,$id);
                //把数据添加到哈希表里
                //Redis::hmset($hashkey.$id,$data);

                return redirect("/shops")->with("success","添加成功");
            }else{
                return back()->with("error","添加失败");
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=DB::table('shops')->where('id','=',$id)->first();

        return view('admin.shop.edit',['data'=>$data]);
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
        $info = DB::table('shops')->where('id','=',$id)->first();
        //dd($info);
        //删除阿里云oss下的图片
        $imgurl = $info->pic;
        //https://219.oss-cn-beijing.aliyuncs.com/
        $img = str_replace('https://219.oss-cn-beijing.aliyuncs.com/','',$imgurl);
        //echo $img;
        //删除阿里云下的图片
        OSS::deleteObject($img);

        //dump($request->all());
        //通过阿里云OSS上传团片
        // $newfile 上传图片名字   $filepath 上传临时资源目录
        if($request->hasFile('pic')){
            //获取上传的图片资源
            $res=$request->file('pic');
            //初始化图片的名字
            $name=time()+rand();
            //获取上传图片的后缀
            $ext=$request->file("pic")->getClientOriginalExtension();
            $newfile=$name.".".$ext;

            //获取上传临时资源目录
            $filepath=$res->getRealPath();
            //上传
            OSS::upload($newfile, $filepath);
            //入库
            $data['sname']=$request->input("sname");
            $data['pic']=env('ALIOSSURL').$newfile;
            $data['descr']=Markdown::convertToHtml($request->input('descr'));
            $data['num']=$request->input('num');
            $data['price']=$request->input('price');

            // dd($data);

            $res = DB::table('shops')->where('id','=',$id)->update($data);
            if ($res) {
                return redirect('/shops')->with('success', '修改成功');
            } else {
                return back()->with('error', '添加失败');
            }
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
        $info = DB::table('shops')->where('id','=',$id)->first();
        //dd($info);
        $res = DB::table('shops')->where('id','=',$id)->delete();
        //删除阿里云oss下的图片
        $imgurl = $info->pic;
        //https://219.oss-cn-beijing.aliyuncs.com/
        $img = str_replace('https://219.oss-cn-beijing.aliyuncs.com/','',$imgurl);
        //echo $img;
        if($res){
            //删除阿里云下的图片
            OSS::deleteObject($img);
            return redirect('/shops')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }

    }
}
