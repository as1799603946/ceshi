<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Shop;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     */
    public function index()
    {
    	$data1 = array();
        //获取session
    	$cart = session('php219cart');
    	if(count($cart)){
    		foreach($cart as $k=>$v){
    			//通过id获取商品数据
    			$info = Shop::where('id','=',$v['id'])->first();
    			$data['pic'] = $info->pic;
    			$data['sname'] = $info->sname;
    			$data['price'] = $info->price;
    			$data['id'] = $v['id'];
    			$data['num'] = $v['num'];
    			$data1[] = $data;

    		}
    	}
    	//加载购物车界面
        return view('home.cart.index',['data1'=>$data1]);
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

    //购物车的去重操作 $id 重新购买商品id
    public function checkExists($id)
    {
    	//获取购物车数据
    	$goods = session('php219cart');
    	//判断购物车里有没有数据
    	if(empty($goods)) return false;
    	//如果购物车里有数据
    	foreach($goods as $k=>$v){
    		if($v['id']==$id){
    			//表示此商品已经购买过
    			return true;
    		}
    	}
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	//加入购物车
        $data['num'] = $request->input('num');
        $data['id'] = $request->input('id');

        if(!$this->checkExists($data['id'])){
        	 //把没有购买商品的数据加到session数组里
             $request->session()->push('php219cart',$data);
        }
        //跳转到购物车界面
        return redirect('/cart');
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

    //全部删除
    public function alldelete(Request $request)
    {
    	//清除session php219cart
    	$request->session()->pull('php219cart');
    	return redirect('/cart');
    }

    //减
    public function cartupdatee(Request $request)
    {
    	$id = $request->input('id');
    	//获取商品数据
    	$info = Shop::where('id','=',$id)->first();
    	//echo $id;
    	//获取全部购物车数据 session php219cart里 存的id和num
    	$cart = session('php219cart');
    	//遍历
    	foreach($cart as $k=>$v){
    		//判断id
    		if($v['id']==$id){
    			//数量减一 同时价格减去一个单价
    			$cart[$k]['num']-=1;
    			//判断
    			if($cart[$k]['num']<=1){
    				//给数量赋值为一
    				$cart[$k]['num']=1;
    			}

    			//session修改完 需要重新赋值
    			session(['php219cart'=>$cart]);
    			//返回的是减一后的数量和减一后的价格
    			$data['num'] = $cart[$k]['num'];
    			$data['tot'] = $cart[$k]['num']*$info->price;
    			//转换为jison格式
    			echo json_encode($data);
    		}

    	}

    }

    //加cartupdate
    public function cartupdate(Request $request)
    {
    	$id = $request->input('id');
    	//echo $id;
    	//获取商品数据
    	$info = Shop::where('id','=',$id)->first();
    	//获取全部购物车数据 获取数据session
    	$cart = session('php219cart');

    	//dd($cart);
    	//遍历
    	foreach($cart as $k=>$v){
    		//判断id
    		if($v['id']==$id){
    			//使其数量加1
    			$cart[$k]['num']+=1;
    			//对比库存
    			if($cart[$k]['num']>$info->num){
    				$cart[$k]['num']=$info->num;
    			}
    			//给session重新赋值
    			session(['php219cart'=>$cart]);
    			//返回的是加一后的数量和价格
    			$data['num']=$cart[$k]['num'];
    			$data['tot']=$cart[$k]['num']*$info->price;
    			echo json_encode($data);
    		}
    	}
    }

    //删除单条数据
    public function cartdel(Request $request)
    {
    	$id = $request->input('id');
    	//echo $id;
    	//删除该商品session
    	$cart = session('php219cart');
    	//遍历
    	foreach($cart as $k=>$v)
    	{
    		//判断
    		if($v['id']==$id){
    			//删除该商品session
    			unset($cart[$k]);
    		}
    	}

    	//session重新赋值
    	session(['php219cart'=>$cart]);
    	if(empty($cart)){
    		//返回json格式
    		return response()->json(['msg'=>'empty']);
    	}else{
    		//返回json格式
    		return response()->json(['msg'=>'ok']);
    	}
    }

    //ajax 计算总件数和总价格
    public function tot(Request $request)
    {
    	//获取选中的数据id
        // $arr=$request->input("arr");
        if(isset($_GET['arr'])){

        
                $sum=0;//全部选中商品总计价格
                $nums=0;//全部选中商品的数量
                // echo json_encode($arr);
                //遍历
                foreach($_GET['arr'] as $value1){
                    //获取session
                    $data=session("php219cart");// num id
                    //遍历
                    foreach($data as $key=>$value){
                        //判断
                        if($value['id']==$value1){
                            //获取每条选中数据的总价格和
                            $num=$data[$key]['num'];//数量
                            //获取商品数据
                            $info=Shop::where("id","=",$value1)->first();
                            //每条选中数据总价格
                            $tot=$num*$info->price;
                            //开始累加
                            $nums+=$num;
                            $sum+=$tot;


                        }

                    }
                }

                $data2['nums']=$nums;
                $data2['sum']=$sum;
                echo json_encode($data2);
        }else{
                $data2['nums']=0;
                $data2['sum']=0;
                echo json_encode($data2);
        }
    }
}
