@extends("admin.layout.index")
@section('title','商品列表')
@section("content")
<html>
 <head></head>
 <script type="text/javascript" src="/static/jquery-1.8.3.min.js"></script>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span><i class="icon-table"></i> 商品列表</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
     <div id="DataTables_Table_1_length" class="dataTables_length">
      <label>Show <select size="1" name="DataTables_Table_1_length" aria-controls="DataTables_Table_1"><option value="10" selected="selected">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label>
     </div>
     <!-- 水电费水电费 -->
     <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info"> 
      <thead> 
       <tr role="row">
        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 57px;">ID</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 61px;">名字</th>

        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 61px;">图片</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 61px;">类别</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 61px;">描述</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 61px;">数量</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 61px;">价格</th>

        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 32px;">操作</th>
       </tr> 
      </thead> 
      <tbody role="alert" aria-live="polite" aria-relevant="all">
       @foreach($data as $k=>$v)
       <tr class="odd"> 
        <td class="  sorting_1">{{ $v->sid }}</td> 
        <td class=" ">{{ $v->sname }}</td> 

        <td class=" "><img src="{{ $v->pic }}" width="100px" height="100px"></td> 
        <td class=" ">{{ $v->cname }}</td> 

        <td class=" ">{!! $v->descr !!}</td> 
        <td class=" ">{{ $v->num }}</td> 
        <td class=" ">{{ $v->price }}</td> 
        <td class=" ">
        	<a href="/shops/{{ $v->sid }}/edit" class="btn btn-success">修改</a>
        <form action="/shops/{{ $v->sid }}" method="post" style="display:inline-block;">
         {{ csrf_field() }}
         {{ method_field('DELETE') }}
         <input type="submit" value="删除" class="btn btn-danger">
        </form>

        </td>
       </tr>
       @endforeach
      </tbody>
     </table>
     <div class="dataTables_paginate paging_full_numbers" id="pages">
      
     </div>
    </div> 
   </div> 
  </div>
 </body>

</html>
@endsection
