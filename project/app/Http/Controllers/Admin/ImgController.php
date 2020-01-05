<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\OSS;//阿里云oss类
use DB;

class ImgController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('imgs')->get();
        //dump($data);
        return view('admin.img.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.img.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
            $data['title']=$request->input("title");
            $data['pic']=env('ALIOSSURL').$newfile;
            // dd($data);
            $data1 = DB::table('imgs')->insert($data);
            if($data1){
                return redirect("/imgs")->with("success","添加成功");
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
        $info = DB::table('imgs')->where('id','=',$id)->first();
        $res = DB::table('imgs')->where('id','=',$id)->delete();
        //删除阿里云oss下的图片
        $imgurl = $info->pic;
        //https://219.oss-cn-beijing.aliyuncs.com/
        $img = str_replace('https://219.oss-cn-beijing.aliyuncs.com/','',$imgurl);
        //echo $img;
        if($res){
            //删除阿里云下的图片
            OSS::deleteObject($img);
            return redirect('/imgs')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
}
