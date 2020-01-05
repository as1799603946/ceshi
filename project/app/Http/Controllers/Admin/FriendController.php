<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class FriendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //加载未审核
    public function index()
    {
        //查询 友情链接表  状态值位0的数据  0 为未审核
        $data = DB::table("friend")->where("status", "=", 0)->get();
        // dd($data);
        return view("Admin.Friend.index", ["data" => $data]);
    }

    //加载已经审核
    public function indexs()
    {
        //查询 友情链接表  状态值为1的数据  1 为已审核
        $data = DB::table("friend")->where("status", "=", 1)->get();
        // dd($data);
        return view("Admin.Friend.indexs", ["data" => $data]);
    }

    //通过审核
    public function tong($id)
    {

        $data['status'] = 1;
        // 将状态值 由0 改变为1
        $res = DB::table("friend")->where("id", "=", $id)->update($data);
        if ($res > 0) {
            return redirect("/admin/friend/indexs")->with("success", "审核成功");
        } else {
            return back()->with("error", "审核失败");
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (DB::table("friend")->where("id", "=", $id)->delete()) {
            return redirect("/admin/friend/indexs")->with("success", "删除成功");
        } else {
            return back()->with("error", "删除失败");
        }
    }

}
