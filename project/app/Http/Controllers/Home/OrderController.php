<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Shop;
use DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //结算
    public function jiesuan(Request $request)
    {
    	 // 把选中商品的数据存储在session里，方便结算页遍历
        //获取现在数据的id数组arr
        //删除session数据 名字是goods
        $request->session()->pull('goods');
        $arr = $_GET['arr'];
        $data = array();
        //遍历
        foreach($arr as $key=>$value){
        	//获取购物车里所有的session数据
        	$cart = session('php219cart');
        	//遍历
        	foreach($cart as $k=>$v){
        		//判断
        		if($v['id']==$value){
        			$data[$k]['num'] = $cart[$k]['num'];
        			$data[$k]['id'] = $value;
        		}
        	}
        }
        //把选中商品的数据 存储在session里
        $request->session()->push('goods',$data);
        echo json_encode($data);
    }

    public function insert()
    {
    	//获取商品数据 方便结算遍历
    	$goods=session('goods');
    	$d=[];
    	$tot="";
    	//dd($goods);
    	//遍历
    	foreach($goods[0] as $key=>$value){
    		//获取id
    		$id = $value['id'];
    		//获取商品数据
    		$info = Shop::where('id','=',$id)->first();
    		$temp['num']=$value['num'];//数量
    		$temp['pic']=$info->pic;//图片
    		$temp['sname']=$info->sname;//名字
    		$temp['price']=$info->price;//单价
    		$tot+=$temp['num']*$temp['price'];
    		$d[]=$temp;
    	}
    	//dd($d);
    	//获取当前登录的用户所有的收货地址
    	$address=DB::table('address')->where('user_id','=',session('user_id'))->get();
    	//获取该用户第一个收货地址
    	$addressfirst=DB::table('address')->where('user_id','=',session('user_id'))->first();
    	//加载结算页
    	return view('home.order.index',['d'=>$d,'address'=>$address,'addressfirst'=>$addressfirst,'tot'=>$tot]);
    }

    //下单操作
    public function orderinsert(Request $request)
    {
    	//dd($request->all());
    	$data['address_id'] = $request->input('address_id');
    	//选择地址id
    	$data['order_num'] = time()+rand(1,10000);//订单号
    	$data['status'] = '0';//0已经下单但是没支付 1是支付完毕
    	$data['user_id'] = session('user_id');
    	$id = DB::table('orders')->insertGetId($data);
    	if($id){
    		$d = [];
    		$tot = '';
    		//向orders_goods插入数据
    		//获取结算页购买的数据
    		$goods = session('goods');
    		//遍历
    		foreach($goods[0] as $key=>$value){
    			$data1['order_id'] = $id;
    			$data1['goods_id'] = $value['id']; //每个商品的id
    			$data1['num'] = $value['num']; //每个商品的数量
    			//获取该商品的数据
    			$info = DB::table('shops')->where('id','=',$value['id'])->first();
    			$data1['name'] = $info->sname; //每个商品的名字
    			$data1['pic'] = $info->pic; //每个商品的图片
                $data1['tot']=$tot+=$data1['num']*$info->price;
    			$d[]=$data1;

    		}
    		//dd($data1);
    		$res = DB::table('orders_goods')->insert($d);
    		if($res){
    			//把付款金额存储在session里
    			session(['tot'=>$tot    ]);
    			//把选中的收货地址id存储在session里
    			session(['address_id'=>$data['address_id']]);
    			//把订单id存储在session里
    			session(['order_id'=>$id]);

    			pay($data['order_num'],'支付商品','0.01','商品支付');
    		}
    	}
    }
    //支付测试
    public function pay()
    {
    	pay(time(),'支付商品','0.01','商品支付');
    }

    public function returnurl()
    {
    	//echo '支付成功';
    	//获取session值
    	$tot=session('tot');
    	$address_id=session('address_id');
    	$address=DB::table('address')->where('id','=',$address_id)->first();
    	//dd($address);
    	$order_id=session('order_id');
    	//修改订单状态 未付款0改为已付款1
    	$data['status']='1';
    	DB::table('orders')->where('id','=',$order_id)->update($data);
    	//加载支付成功后通知的页面
    	return view('Home.Order.success',['tot'=>$tot,'address'=>$address]);
    }

    public function index()
    {
        //
    }

    /**
     * 
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
