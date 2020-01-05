@extends('admin.layout.index')
@section('title','权限列表')
@section('content')
<div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span><i class="icon-table"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> 管理员列表</font></font></span> 
   </div>

   <div class="mws-panel-body no-padding"> 
    <table class="mws-table"> 
     <thead> 
      <tr> 
       <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">ID</font></font></th> 
       <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">控制器名称</font></font></th> 
       <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">方法名称</font></font></th>
       <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">权限名称</font></font></th> 
       <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">操作</font></font></th> 

      </tr> 
     </thead> 
     <tbody> 
       @foreach($node as $k=>$v)
       <tr> 
	       <td>{{ $v->id }}</td> 
	       <td>{{ $v->cname }}</td>  
	       <td>{{ $v->aname }}</td>     
	       <td>{{ $v->desc }}</td>     	          
	       <td>	
	       <form action="/nodes/{{ $v->id }}" method="post" style="display:inline-block;">
	       	{{ csrf_field() }}
	       	{{ method_field('DELETE') }}
	       	<input type="submit" value="删除" class="btn btn-danger del">
	       </form>         
	       	<a href="/nodes/{{ $v->id }}/edit" class="btn btn-success">修改</a>
	       </td>             
       </tr>  
       @endforeach
     
     </tbody> 
    </table> 
   
    <div class="dataTables_paginate paging_full_numbers" id="pages">
     {{ $node->appends($request)->links() }}
   </div> 
  </div>

        <!-- Panels End -->
        </div>
@endsection