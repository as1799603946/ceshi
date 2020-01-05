<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
//引入第三方验证码类库
use Gregwar\Captcha\CaptchaBuilder;
use Hash;
use Monolog\Handler\PHPConsoleHandler;
use App\Models\HomeUser;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //测试路由1  发送字符串到邮箱
    public function send()
    {
        Mail::raw('this is wangminghe', function ($message) {
            //发送的地址
            $message->to('as1799603946@163.com');
            //发送的主题
            $message->subject('php219');
        });
    }

    //测试2 发送视图到邮箱
    public function send1()
    {
        Mail::send('home.register.welcome',['id'=>100],function($message){
            //发送的地址
            $message->to('as1799603946@163.com');
            //发送的主题
            $message->subject('php219');
        });
    }
    public function send2(Request $request)
    {
        $id = $request->input('id');
        echo $id;
    }

    public function code()
    {

            //生成校验码代码
            ob_clean();//清除操作
            $builder = new CaptchaBuilder;
            //可以设置图片宽高及字体
            $builder->build($width = 100, $height = 40, $font = null);
            //获取验证码的内容
            $phrase = $builder->getPhrase();
            //把内容存入session`
                    session(['vcode'=>$phrase]);
            //生成图片
            header("Cache-Control: no-cache, must-revalidate");
            header('Content-Type: image/jpeg');
            //输出校验码
            $builder->output();
//            die;
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
        return view('home.register.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    //发送邮件
    public function sendMail($email,$id,$token)
    {
        Mail::send('home.register.jihuo',['id'=>$id,'token'=>$token],function($message)use($email) {
            //发送的地址
            $message->to($email);
            //发送的主题
            $message->subject('激活用户');

        });
        return true;

    }


    public function store(Request $request)
    {
        //获取系统的校验码
        $vcode = session('vcode');
        //获取输入的校验码
        $code = $request->input('code');
        if($code == $vcode) {
            //$data['uname'] = $request->input('uname');
            $data['upass'] = Hash::make($request->input('upass'));
            $data['status'] = 0; //0 表示未激活
            $data['token'] = str_random(50);
            $data['email'] = $request->input('email');
            //dd($data);
            //存入数据库
            $row = HomeUser::create($data);

            //获取注册ID
            $id = $row->id;
            if ($id) {
                $res = $this->sendMail($data['email'], $id, $data['token']);
//               dd($res);
                if ($res) {
                    return redirect('https://mail.163.com/');
                } else {
                    return back()->with('error', '发送邮件失败,请重新发送');
                }
            }


        } else {
            return back()->with('error','验证码输入错误');
        }

    }

    //激活
    public function jihuo(Request $request)
    {
        //获取用户id
        $id = $request->input('id');
        //获取邮件token
        $token = $request->input('token');
        $info = HomeUser::where('id','=',$id)->first();
        if($token ==$info->token){
            //把状态码status 由0改为2
            $data['status']=2;
            if(HomeUser::where('id','=',$id)->update($data)){
                echo '用户激活成功';
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

    public function sendphones()
    {
        //调用云之讯接口发短信
        $phone = "17638181756";
        sendsphone($phone);
    }

    public function sendp(Request $request)
    {
        //获取输入的手机号
        $p = $request->input('p');
        //调用云之讯接口发送短信
        sendsphone($p);

    }
    
    //检测手机号
    public function checkphone(Request $request)
    {


    	$phone = $request->input('phone');
    	//获取一列数据
    	// echo $phone;
    	$arr = HomeUser::pluck('phone')->toArray();
    	if(in_array($phone,$arr)){
    		echo 1; //手机号已经被注册
    	} else{
    		echo 2; //手机号可以用
    	}


    }

    //检测手机验证码
    public function checkcode(Request $request)
    {
    	$code = $request->input('code');
    	// echo $code;
    	//输入验证码和发送验证码做对比
    	if(isset($_COOKIE['fcode']) && !empty($code)){
    		//获取手机接收到验证码
    		$fcode=$request->cookie('fcode');
    		if($code==$fcode){
    			echo 1;//两者一致
    		}else{
    			echo 2;//两者不一致
    		}
    	}else if(empty($code)){
    		echo 3;//输入验证码为空
    	}else{
    		echo 4;//验证码过期
    	}
    }

}
