@extends('admin.layout.index')
@section('title','订单列表')
@section('content')
<div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span><i class="icon-table"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> 管理员列表</font></font></span> 
   </div>

   <div class="mws-panel-body no-padding"> 
    <table class="mws-table"> 
     <thead> 
      <tr> 
       <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">订单ID</font></font></th>
       <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">订单号</font></font></th>
       <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">用户ID</font></font></th>
       <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">收货人</font></font></th>
       <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">收货地址</font></font></th>
       <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">联系方式</font></font></th>
       <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">总金额</font></font></th>
       <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">支付方式</font></font></th>
          <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">配送方式</font></font></th>
          <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">订单状态</font></font></th>
      </tr> 
     </thead> 
     <tbody>

           @foreach($data as $k=>$v)
           <tr> 
	       <td>{{ $v->id }}</td>
	       <td>{{ $v->order_num }}</td>
	       <td>{{ $v->user_id }}</td>
	       <td>{{ $v->name }}</td>
	       <td>{{ $v->xhuo }}</td>
	       <td>{{ $v->phone }}</td>
	       <td>{{ $v->tot }}</td>
           <td>支付宝</td>
           <td>韵达</td>
               <td><select name="status">
                       <option value="#">--请选择--</option>
                       <option value="0" @if($v->status==0)selected="selected"@endif>未付款</option>
                       <option value="1" @if($v->status==1)selected="selected"@endif>已付款</option>
                       <option value="2" @if($v->status==2)selected="selected"@endif>未发货</option>
                       <option value="3" @if($v->status==3)selected="selected"@endif>已发货</option>
                   </select></td>
       </tr> 
       @endforeach
     </tbody> 
    </table> 
   
    
  </div>

        <!-- Panels End -->
        </div>
@endsection