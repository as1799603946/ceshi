<?php

namespace App\Http\Middleware;

use Closure;

class AdminLoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //检测是否具有管理员登录session
        if($request->session()->has("isadmin")){
            //4.用访问模块控制器和方法 和权限列表做对比
            $nodelist=session('nodelist');
          
            //dd($nodelist);
            //获取访问模块控制器和方法名
            $actions=explode('\\', \Route::current()->getActionName());
            //或$actions=explode('\\', \Route::currentRouteAction());
            $modelName=$actions[count($actions)-2]=='Controllers'?null:$actions[count($actions)-2];
            $func=explode('@', $actions[count($actions)-1]);
            $controllerName=$func[0];
            $actionName=$func[1];
            //echo $controllerName.":".$actionName;
            //做对比
            //if(empty($nodelist[$controllerName]) || !in_array($actionName,$nodelist[$controllerName])){
              //  return redirect("/admin")->with("error","您没有权限访问该模块，请联系超级管理员");
            //}

            return $next($request);
        }else{
            //跳转到登录界面
            return redirect("/adminlogin/create");
        }
        
    }
}
