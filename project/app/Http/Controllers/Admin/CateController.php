<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cate;
use DB;

class CateController extends Controller
{
   public function get()
   {
        $cate = Cate::select('*',DB::raw("concat(path,',',id) as paths"))->orderBy('paths','asc')->get();

        foreach($cate as $k=>$v){
            //dump($cate);
            $n = substr_count($v->path,',');

            $cate[$k]->cname = str_repeat('|----',$n).$v->cname;
        }

        return $cate;
   }
    public function index()
    {
        return view('admin.cate.index',['cate'=>self::get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $id = $request->id;

        return view('admin.cate.create',['id'=>$id,'cate'=>self::get()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //获取pid
        $pid = $request->input('pid',0);
        //dd($pid);   
        if($pid==0){
            $path = 0;
        } else{
            //获取父级数据
            $data = Cate::find($pid);
            $path = $data->path.','.$data->id;
        }
        //dd($path);
        //存入数据库
         $cate = new Cate;
         $cate->cname = $request->input('cname');
         $cate->pid = $pid;
         $cate->path = $path;
         //dd($cate);
        $res = $cate->save();
        if($res){
        	return redirect('/cates')->with('success','添加成功');
        }else{
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
        $res = DB::table('cates')->where('id','=',$id)->delete();
        if($res){
            return redirect('/cates')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
}
