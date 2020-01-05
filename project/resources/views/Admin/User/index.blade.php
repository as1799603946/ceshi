@extends('admin.layout.index')
@section('title','用户列表')
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
       <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">用户名</font></font></th> 
       <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">邮箱</font></font></th>
       <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">电话</font></font></th> 
       <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">状态</font></font></th> 
       <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">创建时间</font></font></th> 
       <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">修改时间</font></font></th> 
       <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">操作</font></font></th> 

      </tr> 
     </thead> 
     <tbody>

     @foreach($user as $k=>$v)
           <tr> 
	       <td>{{ $v->id }}</td> 
	       <td>{{ $v->uname }}</td> 
	       <td>{{ $v->email }}</td> 
	       <td>{{ $v->phone }}</td> 
	       <td>{{ $v->status }}</td>  
	       <td>{{ $v->created_at }}</td>     
	       <td>{{ $v->updated_at }}</td>     	          
	       <td>	
	       <form action="/users/{{ $v->id }}" method="post" style="display:inline-block;">
	       	{{ csrf_field() }}
	       	{{ method_field('DELETE') }}
	       	<input type="submit" value="删除" class="btn btn-danger del">
	       </form>         
	       	<a href="/users/{{ $v->id }}/edit" class="btn btn-success">修改</a>
	       </td>             
       </tr> 
     @endforeach		   
     </tbody> 
    </table> 
   
    
  </div>

        <!-- Panels End -->
        </div>
@endsection