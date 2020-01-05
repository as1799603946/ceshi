@extends('admin.layout.index')
@section('title','轮播图列表')
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
                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">图片</font></font></th>
                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">主题</font></font></th>
                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">操作</font></font></th>

                </tr>
                </thead>
                <tbody>
                    @foreach($data as $k=>$v)
                    <tr>
                        <td>{{ $v->id }}</td>
                        <td><img src="{{ $v->pic }}" alt="" width="100px" height="100px"></td>
                        <td>{{ $v->title }}</td>

                        <td>
                            <form action="/imgs/{{ $v->id }}" method="post" style="display:inline-block;">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <input type="submit" value="删除" class="btn btn-danger del">
                            </form>
                        </td>
                    </tr>
                        @endforeach
                </tbody>
            </table>


        </div>

        <!-- Panels End -->
    </div>
@endsection