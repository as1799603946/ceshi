<!DOCTYPE html>
<html>

  <head lang="en">
    <meta charset="UTF-8">
    <title>注册</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />

    <link rel="stylesheet" href="/static/xiangmv/AmazeUI-2.4.2/assets/css/amazeui.min.css" />
    <link href="/static/xiangmv/css/dlstyle.css" rel="stylesheet" type="text/css">
    <script src="/static/xiangmv/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
    <script src="/static/xiangmv/AmazeUI-2.4.2/assets/js/amazeui.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/static/xiangmv/bootstrap/css/bootstrap.min.css">

  </head>
  <style type="text/css">
    .cur{
      border:1px solid red;
    }

     .curs{
      border:1px solid green;
    }
  </style>
  <body>

    <div class="login-boxtitle">
      <a href="home/demo.html"><img alt="" src="/static/xiangmv/images/logobig.png" /></a>
    </div>

    <div class="res-banner">
      <div class="res-main">
        <div class="login-banner-bg"><span></span><img src="/static/xiangmv/images/big.jpg" /></div>
        <div class="login-box">

            <div class="am-tabs" id="doc-my-tabs">
              <ul class="am-tabs-nav am-nav am-nav-tabs am-nav-justify">
                <li class="am-active"><a href="">邮箱注册</a></li>
                <li><a href="">手机号注册</a></li>
              </ul>

              <div class="am-tabs-bd">
                <div class="am-tab-panel am-active">
                  <form  action="/homeregister" method="post">
                      {{ csrf_field() }}
                 <div class="user-email">
                    <label for="email"><i class="am-icon-envelope-o"></i></label>
                    <input type="email" name="email" id="email" placeholder="请输入邮箱账号">
                 </div>                   
                 <div class="user-pass">
                    <label for="password"><i class="am-icon-lock"></i></label>
                    <input type="password" name="upass" id="password" placeholder="设置密码">
                 </div>
                 <div class="user-pass">
                    <label for="passwordRepeat"><i class="am-icon-lock"></i></label>
                    <input type="password" name="repass" id="passwordRepeat" placeholder="确认密码">
                 </div> 

                  <div class="user-pass">
                    <label for="passwordRepeat"><i class="am-icon-code-fork"></i></label>
                    <img src="/code" onclick="this.src=this.src+'?a=1'" style="float:right">
                 </div>

                  <div class="verification">
                      <label for="code"><i class="am-icon-code-fork"></i></label>
                      <input type="tel" name="code" id="code" placeholder="请输入验证码">
                    </div>
                      @if(session('error'))
                          {{ session('error') }}
                          @endif
                 
                 
                 <div class="login-links">
                  </div>
                    <div class="am-cf">
                      <input type="submit" name="" value="注册" class="am-btn am-btn-primary am-btn-sm am-fl">
                    </div>

                </div>

                </form>

                <div class="am-tab-panel">
                  <form method="post" action="/registerphone" id="ff">
                 <div class="user-phone" style="margin-top:20px">
                    <label for="phone"><i class="am-icon-mobile-phone am-icon-md"></i></label>
                    <input type="tel" name="phone" id="phone" placeholder="请输入手机号" class="ll"reminder="请输入正确的手机号" names="phone"><span></span>
                 </div>                                     
                    <div class="verification" style="margin-top:20px">
                      <label for="code"><i class="am-icon-code-fork"></i></label>
                      <input type="tel" name="code" id="code" placeholder="请输入验证码"  style="width:140px" class="ll" reminder="请输入验证码" names="phone"><span></span>
                      <a href="javascript:void(0)"class="btn btn-info" style="float:right" id="ss">获取</a>
                    </div>
                 <div class="user-pass" style="margin-top:20px">
                    <label for="password"><i class="am-icon-lock"></i></label>
                    <input type="password" name="upass1" id="password" placeholder="设置密码" class="ll" reminder="请输入正确的密码" names="phone"><span></span>
                 </div>                   
                 <div class="user-pass" style="margin-top:20px">
                    <label for="passwordRepeat"><i class="am-icon-lock"></i></label>
                    <input type="password" name="repass1" id="passwordRepeat" placeholder="确认密码" class="ll" reminder="请再次重复密码" names="phone"><span></span>
                 </div> 
                    <div class="am-cf">
                      <input type="submit" name="" value="注册" class="am-btn am-btn-primary am-btn-sm am-fl">
                    </div>
                    </form>
                
                  <hr>
                </div>

                <script>
                  $(function() {
                      $('#doc-my-tabs').tabs();
                    })
                </script>

              </div>
            </div>

        </div>
      </div>
      
          <div class="footer ">
            <div class="footer-hd ">
              <p>
                <a href="# ">恒望科技</a>
                <b>|</b>
                <a href="# ">商城首页</a>
                <b>|</b>
                <a href="# ">支付宝</a>
                <b>|</b>
                <a href="# ">物流</a>
              </p>
            </div>
            <div class="footer-bd ">
              <p>
                <a href="# ">关于恒望</a>
                <a href="# ">合作伙伴</a>
                <a href="# ">联系我们</a>
                <a href="# ">网站地图</a>
                <em>© 2015-2025 Hengwang.com 版权所有</em>
              </p>
            </div>
          </div>
  </body>
  <script type="text/javascript">
  </script>
</html>
<script>
  PHONE1=false;
  CODE1=false;
  UPASS2=false;
  REPASS2=false;

//获取所有input框校验 获取焦点事件
$("input[names='phone']").focus(function(){
  //获取reminder
  var reminder = $(this).attr('reminder');
  $(this).next('span').css('color','red').html(reminder);
  //添加类的样式
  $(this).addClass('cur');
  //清除
  $(this).removeClass('curs');
});

//校验手机号
$("input[name='phone']").blur(function(){
  //获取输入的手机号
  phone = $(this).val();
  o=$(this);
  if(phone.match(/^\d{11}$/)==null){
      //alert('手机号格式不对');
      $(this).next('span').css('color','red').html('手机格式不对');
      //添加类的样式
      $(this).addClass('cur');
      PHONE1=false;
  }else{
    $.get("/checkphone",{phone:phone},function(data){
      // alert(data);
      if(data==1){
        o.next('span').css('color','red').html('手机号已经被注册');
        //添加类的样式
        o.addClass('cur');
        //按钮禁用
        $('#ss').attr('disabled',true);
        PHONE1=false;
      }else if(data==2){
        o.next('span').css('color','green').html('手机号可以注册');
        //添加类的样式
        o.addClass('curs');
        $('#ss').attr('disabled',false);
        PHONE1=true;
      } 
    });
  }
});

//输入校验码
$("input[name='code']").blur(function(){
  //获取输入的验证码
  code=$(this).val();
  oo=$(this);
  //ajax
  $.get('/checkcode',{code:code},function(data){
    if(data==1){
      oo.next('span').css('color','green').html('验证码一致');
        //添加类的样式
        oo.addClass('curs');
        CODE1=true;
    }else if(data==2){
       oo.next('span').css('color','red').html('验证码不一致');
        //添加类的样式
        o.addClass('cur');
        CODE1=false;
    }else if(data==3){
      oo.next('span').css('color','red').html('验证码不能为空');
        //添加类的样式
        oo.addClass('cur');
        CODE1=false;
    }else if(data==4){
       oo.next('span').css('color','red').html('验证码过期,请重新发送');
        //添加类的样式
        oo.addClass('cur');
        CODE1=false;
    }
  });
});


//密码检测
$("input[name='upass1']").blur(function(){
  //获取密码
  var upass = $(this).val();

  //检测密码
  if(upass.match(/^\w{6,18}$/)==null){
    $(this).next('span').css('color','red').html('密码不是6到18位');
    //添加类的样式 边框
    $(this).addClass('cur');
    UPASS2=false;
  }else{
    $(this).next('span').css('color','green').html('密码OK');
    //添加类的样式 边框
    $(this).addClass('curs');
    UPASS2=true;
  }
});

//确认密码
$("input[name='repass1']").blur(function(){
  //获取确认密码
  var repass = $(this).val();
  //获取密码
  var upass = $("input[name='upass1']").val();
  if(repass.match(/^\w{6,18}$/)==null){
    $(this).next('span').css('color','red').html('重复密码不是6-18位');
    //添加类的样式
    $(this).addClass('cur');
    REPASS2=false;
  }else if(repass==upass){
    $(this).next('span').css('color','green').html('密码一致');
    //添加类的样式
    $(this).addClass('curs');
    REPASS2=true;
  }else{
     $(this).next('span').css('color','red').html('两次密码不一致');
    //添加类的样式
    $(this).addClass('cur');
    REPASS2=false;
  }
});


    //获取按钮 绑定单机事件
    $('#ss').click(function(){
      //获取输入的手机号
        p = $("input[name='phone']").val();
        b=$(this);
        $.get('/sendp',{p:p},function(data){
           if(data.code==000000){
               m=10;
               mytime = setInterval(function(){
                   m--;
                   b.html(m);
                   b.attr('disabled',true);
                   if(m<=0){
                       clearInterval(mytime);
                       b.html('发送');
                       b.attr('disabled',false);
                   }
               },1000);
           }

        },'json');
    });

    //提交 submit=>true 代表表单可以提交 返回false 表单不能提交
    $('#ff').submit(function(){
      // trigger 让某一个元素触发某个事件
      $("input[names='phone']").trigger('blur');
      if(PHONE1 && CODE1 && UPASS2 &&REPASS2){
        return true;
      } else{
        return false;
      }
    });
</script>