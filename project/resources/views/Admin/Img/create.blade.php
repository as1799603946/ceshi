@extends("admin.layout.index")
@section('title','轮播图添加')
@section("content")
    <html>
    <head></head>
    </script>
    <body>
    <div class="mws-panel grid_8">
        <div class="mws-panel-header">
        <span>轮播图添加</span>
        </div>
        <div class="mws-panel-body no-padding">
        <form class="mws-form" action="/imgs" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
        <div class="mws-form-inline">
        <div class="mws-form-row">
        <label class="mws-form-label">主题</label>
        <div class="mws-form-item">
        <input type="text" class="large" name="title" />
        </div>
        </div>

        <div class="mws-form-row">
        <label class="mws-form-label">图片</label>
        <div class="mws-form-item">
        <input type="file" class="large" name="pic" />
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
