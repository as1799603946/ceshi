@extends('admin.layout.index')
@section('content')
@section('title','管理员修改')
<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">修改</font></font></span>
                    </div>
                    <div class="mws-panel-body no-padding">
                    	<form class="mws-form" action="/adminuser/{{ $adminuser->id }}" method="post">  
                    	    {{ csrf_field() }}                  		
                    		{{ method_field('PUT') }}
                    		<div class="mws-form-inline">
                    			<div class="mws-form-row">
                    				<label class="mws-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">修改管理员名称</font></font></label>
                    				<div class="mws-form-item">
                    					<input type="text" class="small" name="uname" value="{{ $adminuser->uname }}">
                    				</div>
                    			</div>
                    			<div class="mws-form-row">
                    				<label class="mws-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">修改密码</font></font></label>
                    				<div class="mws-form-item">
                    					<input type="password" class="small" name="upass">
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