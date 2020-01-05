@extends('admin.layout.index')
@section('title','管理员列表')
@section('content')
<html>
 <head></head>
 
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span><i class="icon-table"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> 管理员列表</font></font></span> 
   </div>

   <div class="dataTables_filter" id="DataTables_Table_0_filter"><label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">搜索名称： </font></font>
   	<form action="/adminuser" method="get">
   	<input type="text" aria-controls="DataTables_Table_1" name="keywords" value="{{ $request['keywords'] or '' }}"></label>
   	<input type="submit" class="btn btn-error" value="搜索">
   </form>
   </div>

   <div class="mws-panel-body no-padding"> 
    <table class="mws-table"> 
     <thead> 
      <tr> 
       <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">ID</font></font></th> 
       <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">管理员名称</font></font></th> 
       <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">操作</font></font></th> 
      </tr> 
     </thead> 
     <tbody> 
     
     @foreach($data as $k=>$v)
      <tr> 
       <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ $v->id }}</font></font></td> 
       <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ $v->uname }}</font></font></td>     
       <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
          <a href="/role/{{ $v->id }}" class="btn btn-success" >分配角色</a>
       	<form action="/adminuser/{{$v->id}}" method="post" style="display:inline-block;">
       		{{ csrf_field() }}
       		{{ method_field('DELETE') }}
       		<input type="submit" value="删除" class="btn btn-danger"style="display:inline-block">
       	</form>
       	<a href="/adminuser/{{ $v->id }}/edit" class="btn btn-success" >修改</a></font></font></td>             

      </tr> 
      @endforeach
     </tbody> 
    </table> 
    <div class="dataTables_paginate paging_full_numbers" id="pages">
    {{ $data->appends($request)->links() }}
   </div> 
  </div>
 </body>
 
</html>
@endsection