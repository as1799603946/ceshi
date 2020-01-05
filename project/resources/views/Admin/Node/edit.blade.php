@extends('admin.layout.index')
@section('title','权限添加')
@section('content')
<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">权限添加</font></font></span>
                    </div>
                    <div class="mws-panel-body no-padding">
                    	<form class="mws-form" action="/nodes/{{ $data->id }}" method="post">
                    		{{ csrf_field() }}
                    		{{ method_field('PUT') }}
                    		<div class="mws-form-inline">
                    			<div class="mws-form-row">
                    				<label class="mws-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">权限名称</font></font></label>
                    				<div class="mws-form-item">
                    					<input type="text" class="small" name="desc" value="{{ $data->desc }}">
                    				</div>
                    			</div>
                    			<div class="mws-form-row">
                    				<label class="mws-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">控制器名称</font></font></label>
                    				<div class="mws-form-item">
                    					<input type="text" class="small" name="cname" value="{{ $data->cname }}">
                    				</div>
                    			</div>	
                    			<div class="mws-form-row">
                    				<label class="mws-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">方法名称</font></font></label>
                    				<div class="mws-form-item">
                    					<input type="text" class="small" name="aname" value="{{ $data->aname }}">
                    				</div>
                    			</div>
                    			
                    		</div>
                    		<div class="mws-button-row">
                    			<font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input type="submit" value="提交" class="btn btn-danger"></font></font>
                    			<input type="reset" value="Reset" class="btn ">
                    		</div>
                    	</form>
                    </div>    	
                </div>
@endsection