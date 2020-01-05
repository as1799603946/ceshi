@extends('admin.layout.index')
@section('title','管理员列表')
@section('content')
<html>
 <head></head>
 <script type="text/javascript" src="/static/jquery-1.8.3.min.js"></script>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span><i class="icon-table"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> 管理员列表</font></font></span> 
   </div>

   <div class="mws-panel-body no-padding"> 
    <table class="mws-table"> 
     <thead> 
      <tr> 
       <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">ID</font></font></th> 
       <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">角色名称</font></font></th> 
       <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">操作</font></font></th> 
      </tr> 
     </thead> 
     <tbody> 
     
      @foreach($data as $k=>$v)
      <tr> 
       <td>{{ $v->id }}</td> 
       <td>{{ $v->rname }}</td>     
       <td>
         
       	<a href="javascript:void(0)" class="btn btn-danger del">删除</a>
       	<a href="/roles/{{ $v->id }}/edit" class="btn btn-success" >修改</a></font></font>
       	<a href="/auth/{{ $v->id }}" class="btn btn-info" >分配权限</a>

       </td>             
       @endforeach 
      </tr> 
     
     </tbody> 
    </table> 
    <div class="dataTables_paginate paging_full_numbers" id="pages">
    
   </div> 
  </div>
 </body>
 <script>
 		
 	$('.del').click(function(){
 	
 	//alert($);
 		// 获取当前元素的祖先元素 parents
 		id=$(this).parents('tr').find('td:first').html();
 		o=$(this).parents('tr');
 		s = confirm('你确定要删除吗');
 		if(s){
 			$.get('/roledel',{id:id},function(data){
 				//alert(data);
 				if(data==1){
 					//删除数据所在tr  remove() 把元素从dom里删除
 					o.remove();
 				}
 			});
 		}
 		
	})



 </script>
</html>
@endsection