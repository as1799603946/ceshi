<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link type="text/css" rel="stylesheet" href="/h/youhong/css/style.css" />
    <!--[if IE 6]>
    <script src="/h/youhong/js/iepng.js" type="text/javascript"></script>
        <script type="text/javascript">
           EvPNG.fix('div, ul, img, li, input, a'); 
        </script>
    <![endif]-->    
    <script type="text/javascript" src="/h/youhong/js/jquery-1.11.1.min_044d0927.js"></script>
    <script type="text/javascript" src="/h/youhong/js/jquery.bxslider_e88acd1b.js"></script>
    
    <script type="text/javascript" src="/h/youhong/js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="/h/youhong/js/menu.js"></script>    
        
    <script type="text/javascript" src="/h/youhong/js/select.js"></script>
    
    <script type="text/javascript" src="/h/youhong/js/lrscroll.js"></script>
    
    <script type="text/javascript" src="/h/youhong/js/iban.js"></script>
    <script type="text/javascript" src="/h/youhong/js/fban.js"></script>
    <script type="text/javascript" src="/h/youhong/js/f_ban.js"></script>
    <script type="text/javascript" src="/h/youhong/js/mban.js"></script>
    <script type="text/javascript" src="/h/youhong/js/bban.js"></script>
    <script type="text/javascript" src="/h/youhong/js/hban.js"></script>
    <script type="text/javascript" src="/h/youhong/js/tban.js"></script>
    
    <script type="text/javascript" src="/h/youhong/js/lrscroll_1.js"></script>
    
    
<title>尤洪</title>
</head>
<body>  
<!--Begin Header Begin-->
<div class="soubg">
    <div class="sou">
        <!--Begin 所在收货地区 Begin-->
        <span class="s_city_b">
            <span class="fl">送货至：</span>
            <span class="s_city">
                <span>四川</span>
                <div class="s_city_bg">
                    <div class="s_city_t"></div>
                    <div class="s_city_c">
                        <h2>请选择所在的收货地区</h2>
                        <table border="0" class="c_tab" style="width:235px; margin-top:10px;" cellspacing="0" cellpadding="0">
                          <tr>
                            <th>A</th>
                            <td class="c_h"><span>安徽</span><span>澳门</span></td>
                          </tr>
                          <tr>
                            <th>B</th>
                            <td class="c_h"><span>北京</span></td>
                          </tr>
                          <tr>
                            <th>C</th>
                            <td class="c_h"><span>重庆</span></td>
                          </tr>
                          <tr>
                            <th>F</th>
                            <td class="c_h"><span>福建</span></td>
                          </tr>
                          <tr>
                            <th>G</th>
                            <td class="c_h"><span>广东</span><span>广西</span><span>贵州</span><span>甘肃</span></td>
                          </tr>
                          <tr>
                            <th>H</th>
                            <td class="c_h"><span>河北</span><span>河南</span><span>黑龙江</span><span>海南</span><span>湖北</span><span>湖南</span></td>
                          </tr>
                          <tr>
                            <th>J</th>
                            <td class="c_h"><span>江苏</span><span>吉林</span><span>江西</span></td>
                          </tr>
                          <tr>
                            <th>L</th>
                            <td class="c_h"><span>辽宁</span></td>
                          </tr>
                          <tr>
                            <th>N</th>
                            <td class="c_h"><span>内蒙古</span><span>宁夏</span></td>
                          </tr>
                          <tr>
                            <th>Q</th>
                            <td class="c_h"><span>青海</span></td>
                          </tr>
                          <tr>
                            <th>S</th>
                            <td class="c_h"><span>上海</span><span>山东</span><span>山西</span><span class="c_check">四川</span><span>陕西</span></td>
                          </tr>
                          <tr>
                            <th>T</th>
                            <td class="c_h"><span>台湾</span><span>天津</span></td>
                          </tr>
                          <tr>
                            <th>X</th>
                            <td class="c_h"><span>西藏</span><span>香港</span><span>新疆</span></td>
                          </tr>
                          <tr>
                            <th>Y</th>
                            <td class="c_h"><span>云南</span></td>
                          </tr>
                          <tr>
                            <th>Z</th>
                            <td class="c_h"><span>浙江</span></td>
                          </tr>
                        </table>
                    </div>
                </div>
            </span>
        </span>


        <!--End 所在收货地区 End-->
        <span class="fr">
            @if(session("home_username"))

            <span class="fl"><a href="/h/youhongome/login">{{session("home_username")}}</a>&nbsp; &nbsp;<a href="/h/youhongome/login/drop">退出登陆</a>|&nbsp;<a href="#">我的订单</a>&nbsp;|</span>
            @else
               <span class="fl">你好，请<a href="/h/youhongome/login">登录</a>&nbsp; <a href="/h/youhongome/register" style="color:#ff4e00;">免费注册</a>&nbsp;|&nbsp;</span>
            @endif
            <span class="ss">
                <div class="ss_list">
                    <a href="#">收藏夹</a>
                    <div class="ss_list_bg">
                        <div class="s_city_t"></div>
                        <div class="ss_list_c">
                            <ul>
                                <li><a href="#">我的收藏夹</a></li>
                                <li><a href="#">我的收藏夹</a></li>
                            </ul>
                        </div>
                    </div>     
                </div>
                <div class="ss_list">
                    <a href="#">客户服务</a>
                    <div class="ss_list_bg">
                        <div class="s_city_t"></div>
                        <div class="ss_list_c">
                            <ul>
                                <li><a href="#">客户服务</a></li>
                                <li><a href="#">客户服务</a></li>
                                <li><a href="#">客户服务</a></li>
                            </ul>
                        </div>
                    </div>    
                </div>
                <div class="ss_list">
                    <a href="#">网站导航</a>
                    <div class="ss_list_bg">
                        <div class="s_city_t"></div>
                        <div class="ss_list_c">
                            <ul>
                                <li><a href="#">网站导航</a></li>
                                <li><a href="#">网站导航</a></li>
                            </ul>
                        </div>
                    </div>    
                </div>
            </span>
            <span class="fl">|&nbsp;关注我们：</span>
            <span class="s_sh"><a href="#" class="sh1">新浪</a><a href="#" class="sh2">微信</a></span>
            <span class="fr">|&nbsp;<a href="#">手机版&nbsp;<img src="/h/youhong/images/s_tel.png" align="absmiddle" /></a></span>
        </span>
    </div>
</div>
<br><br>
    <center>
            <h1 style="font-size:40px">友情链接申请</h1>  <br>
            <table  border="0px"> 
                 <form action="/friend" method="post">
                     {{csrf_field()}}
                 <tr>
                        <td><h1>链接名称：</h1></td>
                        <td><input type="text" name="name"></td>
                 </tr>
                 <tr>
                    <td>　</td>
                 </tr>
                  <tr>
                        <td><h1>链接地址：</h1></td>
                        <td><input type="text" name="url"></td>
                 </tr> 
                 <tr>
                    <td>　</td>
                 </tr>  
                  <tr>
                        <td><h1>申请人姓名：</h1></td>
                        <td><input type="text" name="names"></td>
                 </tr> 
                 <tr>
                    <td>　</td>
                 </tr>   
                <tr>
                        <td><h1>联系方式：</h1></td>
                        <td><input type="text" name="phone"></td>
                 </tr> 
                 <tr>
                    <td></td>
                 </tr>
                  <tr>
                        <td><input type="submit" name="" value="点击提交"></td>
                        <td><input type="reset" name="" value="点击刷新"></td>
                 </tr> 
            </form>
            </table>
    </center>
    <div class="b_btm_bg b_btm_c">
        <div class="b_btm">
            <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
              <tr>
                <td width="72"><img src="/h/youhong/images/b1.png" width="62" height="62" /></td>
                <td><h2>正品保障</h2>正品行货  放心购买</td>
              </tr>
            </table>
            <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
              <tr>
                <td width="72"><img src="/h/youhong/images/b2.png" width="62" height="62" /></td>
                <td><h2>满38包邮</h2>满38包邮 免运费</td>
              </tr>
            </table>
            <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
              <tr>
                <td width="72"><img src="/h/youhong/images/b3.png" width="62" height="62" /></td>
                <td><h2>天天低价</h2>天天低价 畅选无忧</td>
              </tr>
            </table>
            <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
              <tr>
                <td width="72"><img src="/h/youhong/images/b4.png" width="62" height="62" /></td>
                <td><h2>准时送达</h2>收货时间由你做主</td>
              </tr>
            </table>
        </div>
    </div>
    <div class="b_nav">
        <dl>                                                                                            
            <dt><a href="#">新手上路</a></dt>
            <dd><a href="#">售后流程</a></dd>
            <dd><a href="#">购物流程</a></dd>
            <dd><a href="#">订购方式</a></dd>
            <dd><a href="#">隐私声明</a></dd>
            <dd><a href="#">推荐分享说明</a></dd>
        </dl>
        <dl>
            <dt><a href="#">配送与支付</a></dt>
            <dd><a href="#">货到付款区域</a></dd>
            <dd><a href="#">配送支付查询</a></dd>
            <dd><a href="#">支付方式说明</a></dd>
        </dl>
        <dl>
            <dt><a href="#">会员中心</a></dt>
            <dd><a href="#">资金管理</a></dd>
            <dd><a href="#">我的收藏</a></dd>
            <dd><a href="#">我的订单</a></dd>
        </dl>
        <dl>
            <dt><a href="#">服务保证</a></dt>
            <dd><a href="#">退换货原则</a></dd>
            <dd><a href="#">售后服务保证</a></dd>
            <dd><a href="#">产品质量保证</a></dd>
        </dl>
        <dl>
            <dt><a href="#">联系我们</a></dt>
            <dd><a href="#">网站故障报告</a></dd>
            <dd><a href="#">购物咨询</a></dd>
            <dd><a href="#">投诉与建议</a></dd>
        </dl>
        <div class="b_tel_bg">
            <a href="#" class="b_sh1">新浪微博</a>            
            <a href="#" class="b_sh2">腾讯微博</a>
            <p>
            服务热线：<br />
            <span>400-123-4567</span>
            </p>
        </div>
        <div class="b_er">
            <div class="b_er_c"><img src="/h/youhong/images/er.gif" width="118" height="118" /></div>
            <img src="/h/youhong/images/ss.png" />
        </div>
    </div> 
    <div>
    <p>
        　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　<a href="/h/youhongome/friend">添加友情链接</a>
    </p>
    <br>
    <p><a href="11">11</a></p>
    </div>   
    <div class="btmbg">
        <div class="btm">
            备案/许可证编号：蜀ICP备12009302号-1-www.dingguagua.com   Copyright © 2015-2018 尤洪商城网 All Rights Reserved. 复制必究 , Technical Support: Dgg Group <br />
            <img src="/h/youhong/images/b_1.gif" width="98" height="33" /><img src="/h/youhong/images/b_2.gif" width="98" height="33" /><img src="/h/youhong/images/b_3.gif" width="98" height="33" /><img src="/h/youhong/images/b_4.gif" width="98" height="33" /><img src="/h/youhong/images/b_5.gif" width="98" height="33" /><img src="/h/youhong/images/b_6.gif" width="98" height="33" />
        </div>      
    </div>
    <!--End Footer End -->    
</div>

</body>


<!--[if IE 6]>
<script src="//letskillie6.googlecode.com/svn/trunk/2/zh_CN.js"></script>
<![endif]-->
</html>
