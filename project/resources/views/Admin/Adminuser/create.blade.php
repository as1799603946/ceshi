@extends('admin.layout.index')
@section('content')
@section('title','管理员添加')
<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">管理员添加</font></font></span>
                    </div>
                    <div class="mws-panel-body no-padding">
                    	<form class="mws-form" action="/adminuser" method="post">
                    		{{ csrf_field() }}
                    		<div class="mws-form-inline">
                    			<div class="mws-form-row">
                    				<label class="mws-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">管理员名称</font></font></label>
                    				<div class="mws-form-item">
                    					<input type="text" class="small" name="uname">
                    				</div>
                    			</div>
                    			<div class="mws-form-row">
                    				<label class="mws-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">密码</font></font></label>
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