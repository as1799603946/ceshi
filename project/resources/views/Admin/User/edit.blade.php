@extends('admin.layout.index')
@section('title','用户修改')
@section('content')
<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">用户修改</font></font></span>
                    </div>
                    <div class="mws-panel-body no-padding">
                    	<form class="mws-form" action="/users/{{ $data->id }}" method="post">                   		              {{ csrf_field() }}
                    		{{ method_field('PUT') }}
                    		<div class="mws-form-inline">
                    			<div class="mws-form-row">
                    				<label class="mws-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">用户名称</font></font></label>
                    				<div class="mws-form-item">
                    					<input type="text" class="small" name="uname" value="{{ $data->uname }}">
                    				</div>
                    			</div>
                    			<div class="mws-form-row">
                    				<label class="mws-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">邮箱</font></font></label>
                    				<div class="mws-form-item">
                    					<input type="text" class="small" name="email" value="{{ $data->email }}">
                    				</div>
                    			</div>	
                    			<div class="mws-form-row">
                    				<label class="mws-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">电话</font></font></label>
                    				<div class="mws-form-item">
                    					<input type="text" class="small" name="phone" value="{{ $data->phone }}">
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