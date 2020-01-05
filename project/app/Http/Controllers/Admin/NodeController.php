<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Node;

class NodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	//查询所有数据
    	$node = Node::paginate(5);
        return view('admin.node.index',['node'=>$node,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    	//添加页面
        return view('admin.node.create');
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
        if(Node::create($data)){
        	return redirect('/nodes')->with('success','添加成功');
        }else{
        	return back()->with('error')->with('error','添加失败');
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
    	//查询一条数据
    	$data = Node::where('id','=',$id)->first();
        return view('admin.node.edit',['data'=>$data]);
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
    	//查询一条数据
    	$data = Node::where('id','=',$id)->first();
    	//存入数据库
        $data['desc'] = $request->input('desc');
        $data['cname'] = $request->input('cname');
        $data['aname'] = $request->input('aname');
        $res = $data->save();
        if($res){
        	return redirect('/nodes')->with('success','修改成功');
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
        if(Node::where('id','=',$id)->delete()){
        	return redirect('/nodes')->with('success','删除成功');
        }else{
        	return back()->with('error','删除失败');
        }
    }
}
