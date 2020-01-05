@extends("admin.layout.index")
@section("content")
<html>
<html>
 <head></head>
 <script type="text/javascript" src="/static/jquery-1.8.3.min.js"></script>

 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span><i class="icon-table"></i> 图片列表</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
     <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info"> 
      <thead> 
       <tr role="row">
        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 111px;">ID</th>
          <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 111px;">链接名称</th>
           <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 111px;">链接地址</th>
            <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 111px;">申请人</th>
             <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 111px;">手机号</th>
           <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 111px;">操作</th>
       </tr> 
      <tbody role="alert" aria-live="polite" aria-relevant="all">
        @foreach($data as $row)
       <tr class="odd" align="center"> 
        <td class="  sorting_1">{{$row->id}}</td> 
        <td class=" ">{{$row->name}}</td> 
        <td class=" ">{{$row->url}}</td>   
        <td class=" ">{{$row->names}}</td>
        <td class=" ">{{$row->phone}}</td> 
          <td class=" "> <form action="/admin/friend/{{$row->id}}" method="post">
          {{csrf_field()}}
          {{method_field("DELETE")}}
          <button class="btn btn-success">删除</button> 
          </form></td>  
       </tr>
       @endforeach
      </tbody>
      </thead> 

     </table>
    </div> 
   </div> 
  </div>
 </body>
</html>
@endsection
@section("title","后台用户添加")