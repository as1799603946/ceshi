@extends("admin.layout.index")
@section('title','商品修改')
@section("content")
 <html>
 <head></head>
 </script>
 <body>
 <div class="mws-panel grid_8">
         <div class="mws-panel-header">
         <span>商品修改</span>
         </div>
         <div class="mws-panel-body no-padding">
         <form class="mws-form" action="/shops/{{ $data->id }}" method="post" enctype="multipart/form-data">
         {{ csrf_field() }}
         {{method_field('PUT')}}
         <div class="mws-form-inline">
         <div class="mws-form-row">
         <label class="mws-form-label">名字</label>
         <div class="mws-form-item">
         <input type="text" class="large" name="sname" value="{{ $data->sname }}" />
         </div>
         </div>


         <div class="mws-form-row">
         <label class="mws-form-label">图片</label>
         <div class="mws-form-item">
         <img src="{{ $data->pic }}" width="100px" height="100px">
         <input type="file" class="large" name="pic" />
         </div>
         </div>

         <div class="mws-form-row">
         <label class="mws-form-label">描述</label>
         <div class="mws-form-item">
         <textarea name="descr" >{{ $data->descr }}</textarea>
         </div>
         </div>

         <div class="mws-form-row">
         <label class="mws-form-label">数量</label>
         <div class="mws-form-item">
         <input type="text" class="large" name="num" value="{{ $data->num }}" />
         </div>
         </div>

         <div class="mws-form-row">
         <label class="mws-form-label">价格</label>
         <div class="mws-form-item">
         <input type="text" class="large" name="price" value="{{ $data->price }}" />
         </div>
         </div>


         </div>
         <div class="mws-button-row">

         <input type="submit" value="Submit" class="btn btn-danger" />
         <input type="reset" value="Reset" class="btn " />
         </div>
         </form>
         </div>
         </div>
         </body>
         </html>
@endsection
