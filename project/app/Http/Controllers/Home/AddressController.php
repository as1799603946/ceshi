<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    //收货地址的插入
    public function insert(Request $request)
    {
    	//dump($request->all());
    	$data = $request->except('_token');
    	$data['user_id'] = session('user_id');
    	//dd($data);
    	 //把除了汉字以外的字符都过滤掉
        preg_match_all('/[\x{4e00}-\x{9fff}]+/u',$data['huo'],$matchs);
        // dd($matchs);
        $str=join('',$matchs[0]);
        $data['huo']=$str;
        //存入数据库
    	$res = DB::table('address')->insert($data);
    	if($res){
    		return redirect('/order/insert');
    	}
    }
    
    //获取城市级联数据
    public function address(Request $request)
    {
    	$upid = $request->input('upid');
    	$address = DB::table('district')->where('upid','=',$upid)->get();
    	return response()->json($address);

    }

    //切换收货地址
    public function chooseaddress(Request $request)
    {
    	$id = $request->input('id');
    	//echo $id;
    	//获取切换的收货地址
    	$chooseaddress = DB::table('address')->where('id','=',$id)->first();
    	echo json_encode($chooseaddress);
    }

    public function index()
    {
        //
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
