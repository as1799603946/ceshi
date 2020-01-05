<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\HomeUser;
use Hash;
use Mail;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	return view('home.login.login');
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
        $email = $request->input('email');
        $upass = $request->input('upass');
        $row = HomeUser::where('email','=',$email)->first();
        if($row){
        	if(Hash::check($upass, $row->upass)){
        		if($row->status==2){
        			//存储session
        			session(['email'=>$email]);
        			session(['user_id'=>$row->id]);
        			//跳转到前台首页
        			return redirect('/home');
        		} else{
        			return redirect('/homeregister/create')->with('error','邮箱未激活');
        		}
        	}else {
        		return back()->with('error','密码有误');
        	}
        }else {
        	return back()->with('error','邮箱有误');
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


      //发送邮件
    public function sendMail($email,$id,$token)
    {
        Mail::send('Home.Login.cz',['id'=>$id,'token'=>$token],function($message)use($email) {
            //发送的地址
            $message->to($email);
            //发送的主题
            $message->subject('重置密码');

        });
        return true;

    }


    //忘记密码
    public function forget()
    {
    	return view('home.login.forget');
    }


    public function doforget(Request $request)
    {
    	$email = $request->input('email');
    	//获取数据库数据
    	$data = HomeUser::where('email',"=",$email)->first();
    	$res = $this->sendMail($email,$data->id,$data->token);
    	if($res){
    		return redirect('https://mail.qq.com/');
    	}
    }

    public function reset(Request $request)
    {
    	$id = $request->input('id');
    	$row = HomeUser::where('id','=',$id)->first();
    	$token = $request->input('token');
    	//加载重置密码模板
    	if($token==$row->token){
    		return view('Home.Login.reset',['id'=>$row->id]);
    	}
    }

    public function doreset(Request $request)
    {
    	$id = $request->input('id');
    	$data['upass'] = Hash::make($request->input('upass'));
    	$data['token'] = str_random(50);
    	if(HomeUser::where('id','=',$id)->update($data)){
    		return redirect('/homelogin');
    	}

    }
}
