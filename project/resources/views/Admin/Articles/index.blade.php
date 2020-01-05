@extends("admin.layout.index")
@section('title','公告列表')
@section("content")
<html>
 <head></head>
<script type="text/javascript" src="/static/jquery-1.8.3.min.js"></script>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span><i class="icon-table"></i> 公告列表</span> 
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
        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 57px;">操作</th>

        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 57px;">ID</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 61px;">标题</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 61px;">作者</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 61px;">图片</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 61px;">内容</th>


        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 32px;">操作</th>
       </tr> 
      </thead> 
      <tbody role="alert" aria-live="polite" aria-relevant="all">
       @foreach($data as $row)
       <tr class="odd"> 
        <td><input type="checkbox" value="{{$row['id']}}" id="bb"></td>
        <td class="  sorting_1">{{$row['id']}}</td> 
        <td class=" ">{{$row['title']}}</td> 
        <td class=" ">{{$row['editor']}}</td> 
        <td class=" "><img src="{{$row['thumb']}}" width="100px" height="100px"></td> 
        <td class=" ">{!!$row['descr']!!}</td> 



        <td class=" ">
        	<a href="">修改</a></td> 
       </tr>
       @endforeach
       <tr>
        <td colspan="7"><a href="javascript:void(0)" class="btn btn-success allchoose">全选</a><a href="javascript:void(0)" class="btn btn-success nochoose">全不选</a><a href="javascript:void(0)" class="btn btn-success fchoose">反选</a></td>

       </tr>
       <tr>
        <td colspan="7"><a href="javascript:void(0)" class="btn btn-danger del">删除</a></td>
       </tr>
      </tbody>
     </table>
     <div class="dataTables_paginate paging_full_numbers" id="pages">
      
     </div>
    </div> 
   </div> 
  </div>
 </body>
 <script type="text/javascript">
 //alert($);
 //全选
 $('.allchoose').click(function(){
 	//获取table 遍历tr 查找checkbox
 	$('#DataTables_Table_1').find('tr').each(function(){
 		//查找到checkbox 选中
 		$(this).find(':checkbox').attr('checked',true);
 	});
 });

 //全不选
 $('.nochoose').click(function(){
 	//获取table 遍历tr 查找checkbox
 	$('#DataTables_Table_1').find('tr').each(function(){
 		$(this).find(':checkbox').attr('checked',false);
 	});
 });

 //反选
 $('.fchoose').click(function(){
 	//获取table 遍历tr 查找checkbox
 	$('#DataTables_Table_1').find('tr').each(function(){
 		//遍历复选框
 		$(this).find(':checkbox').each(function(){
 			//判断
 			if($(this).attr('checked')){
 				//取消选中
 				$(this).attr('checked',false);
 			}else{
 				$(this).attr('checked',true);
 			}
 		});
 	});
 });



 //删除
 $('.del').click(function(){
 	arr=[];
 	//获取选中数据ID
 	//遍历
 	$(':checked').each(function(){
 		//判断
 		if($(this).attr('checked')){
 			//获取id
 			id=$(this).val();
 			//alert(id);
 			
 			//push  js中给数组添加元素
 			arr.push(id);
 		}
 	});


 	 //发送Ajax请求
  $.get("/articledel",{uid:arr},function(data){
    // alert(data);
    if(data==1){;
      //删除选中数据所在tr
      //遍历arr数组(存储选中数据id)
      for(var i=0;i<arr.length;i++){
        // arr[i]
        //获取选中数据input
        $("input[value='"+arr[i]+"']").parents("tr").remove();
      }

    }else{
      alert(data);
    }
  });
});
 </script>
</html>
@endsection
