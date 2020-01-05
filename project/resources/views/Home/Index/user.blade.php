@extends('home.common.user')
@section('common')
    <div class="right_style">
        <!--消费记录样式-->
        <div class="user_address_style">
            <div class="title_style"><em></em>完善个人信息</div>
            <!--用户信息样式-->
            <!--个人信息-->
            <form action="/info" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
            <div class="Personal_info" id="Personal">
                <ul class="xinxi">
                    <li><label>年龄：</label>  <span><input name="age" type="text" value="" class="text" ></span></li>
                    <li><label>移动电话：</label>  <span><input name="phone" type="text" value="" class="text" ></span></li>
                    <li><label>QQ：</label>  <span><input name="qq" type="text" value="" class="text" ></span></li>
                    <li><label>头像：</label>  <span><input name="profile" type="file" class="text" ></span></li>
                    <div class="bottom"><input  type="submit" value="提交" class="modify"></div>
                </ul>

            </div>
            </form>
        </div>
    </div>
@endsection