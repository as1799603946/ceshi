<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Articles;
use Intervention\Image\ImageManager;
use App\Services\OSS;//阿里云oss类
use Illuminate\Support\Facades\Redis;//导入redis

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arts=[];
        //链表名字 存储ID
        $listkey = 'PHP219LISTS:php219ARTICLE';
        //哈希表名
        $hashkey = 'PHP219HASH:php219ARTICLE';
        //判断链表里面是否有ID
        if(Redis::exists($listkey)){
            //redis有数据
            //获取公告id $listkey
            $id = Redis::lrange($listkey,0,-1);
            //遍历
            foreach($id as $k=>$v){
                //依照获取到的id 获取哈希表数据
                $arts[] = Redis::hgetall($hashkey.$v);
            }
            
        }else{
            //redis里没数据 先从数据库获取 给redis缓存服务器一份
            $arts = Articles::get()->toArray();
            foreach($arts as $k=>$v){
                //给缓存服务器一份 存储id到$listkey
                Redis::rpush($listkey,$v['id']);
                //存储数据到$hashkey
                Redis::hmset($hashkey.$v['id'],$v);
            }
        }
        //加载模板
        return view("Admin.Articles.index",['data'=>$arts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //图片上传
        // if($request->hasFile("thumb")){
        //     //初始化图片的名字
        //     $name=time()+rand();
        //     //获取上传图片的后缀
        //     $ext=$request->file("thumb")->getClientOriginalExtension();
        //     //把上传的图片移动到指定的目录下
        //     $request->file("thumb")->move("./upload/".date("Y-m-d"),$name.".".$ext);
        //     //实例化ImageManager
        //     $ImageManager=new ImageManager();
        //     //图片裁剪
        //     $ImageManager->make("./upload/".date("Y-m-d")."/".$name.".".$ext)->resize(100,100)->save("./upload/".date("Y-m-d")."/"."r_".$name.".".$ext);
        //     //入库
        //     $data['title']=$request->input("title");
        //     $data['editor']=$request->input("editor");
        //     $data['thumb']=trim("./upload/".date("Y-m-d")."/"."r_".$name.".".$ext,".");
        //     $data['descr']=$request->input('descr');
        //     // dd($data);
        //     if(Articles::create($data)){
        //         // echo 1;
        //         return redirect("/articles")->with("success","添加成功");
        //     }else{
        //         return back()->with("error","添加失败");
        //     }


        // }
        
        //通过阿里云OSS上传团片
        // $newfile 上传图片名字   $filepath 上传临时资源目录
        if($request->hasFile('thumb')){
        	//获取上传的图片资源
        	$res=$request->file('thumb');
        	//初始化图片的名字
            $name=time()+rand();
            //获取上传图片的后缀
            $ext=$request->file("thumb")->getClientOriginalExtension();
            $newfile=$name.".".$ext;

            //获取上传临时资源目录
        	$filepath=$res->getRealPath();
            //上传
        	OSS::upload($newfile, $filepath);
        	     //入库
            $data['title']=$request->input("title");
            $data['editor']=$request->input("editor");
            $data['thumb']=env('ALIOSSURL').$newfile;
            $data['descr']=$request->input('descr');
            // dd($data);
            $data1 = Articles::create($data);
            //获取刚刚插入数据的ID
            $id = $data1->id;
            //把id也传到redis缓存服务器里
            $data['id'] = $id;
            if($id){
                // echo 1;
                //链表名字 存储ID
                $listkey = 'PHP219LISTS:php219ARTICLE';
                //哈希表名
                $hashkey = 'PHP219HASH:php219ARTICLE';
                //把数据添加到redis缓存服务器里
                //添加id到链表里
                Redis::rpush($listkey,$id);
                //把数据添加到哈希表里
                Redis::hmset($hashkey.$id,$data);

                return redirect("/articles")->with("success","添加成功");
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

    public function articledel(Request $request)
    {
    	//获取选中数据数组
        $id=$request->input("uid");

       
        if($id==""){
            echo "请至少选中一条";die;
        }
        // echo json_encode($id);
        //遍历
        foreach($id as $key=>$value){
            //获取需要删除的数据
            $info=Articles::where("id","=",$value)->first();
            //小图路径
            //$smallimgurl=$info->thumb;
            //大图路径
             // /upload/2019-10-21/r_1571655438.jpg
            //$bigimgurl=str_replace("r_","",$smallimgurl);
            //删除小图和大图
//            unlink(".".$smallimgurl);
//            unlink(".".$bigimgurl);
            
            //删除阿里云oss下的图片
            $imgurl = $info->thumb;
            //https://219.oss-cn-beijing.aliyuncs.com/
            $img = str_replace('https://219.oss-cn-beijing.aliyuncs.com/','',$imgurl);
            //echo $img;
            OSS::deleteObject($img);
            //链表名字 存储ID
            $listkey = 'PHP219LISTS:php219ARTICLE';
            //哈希表名
            $hashkey = 'PHP219HASH:php219ARTICLE';
            //删除链表的ID
            Redis::lrem($listkey,0,$value);
            //删除哈希的数据
            Redis::del($hashkey.$value);
            //做删除
            Articles::where("id","=",$value)->delete();

        }

        echo 1;
    }
}
