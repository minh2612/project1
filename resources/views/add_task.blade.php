@extends('admin_layout')
@section('admin_content')
<script>
	$(document).ready(function() {
	$(".js-example-basic-single").select2();
	// Thêm các tùy chọn của bạn vào đây.
	});
</script>
<div class="page-content-wrapper ">

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h4 class="page-title m-0">Thêm công việc</h4>
                            <?php
                            $message= Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message', null);
                            }
                            ?>                            
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- end page-title-box -->
            </div>
        </div> 
        <!-- end page title -->
        @foreach($project_id as $key => $pr)
        <form role="form" action="{{URL::to('/save-task/'.$pr->project_id)}}" method="post" enctype="multipart/form-data">
        	{{csrf_field()}}     	
			<div class="form-group row">
			    <label for="example-name-input" class="col-sm-2 col-form-label">Tên công việc</label>
			    <div class="col-sm-4">
			        <input class="form-control" type="text" name="task_name">
			    </div>
			</div>
			<div class="form-group row">
		        <label class="col-sm-2 col-form-label">Người giao </label>
		        <div class="col-sm-2">
		            <select class="form-control"  name="task_admin" id="task_admin">
                        @foreach($e as $key => $e1)
                        <option value="{{$e1 ->e_name}}">{{$e1 ->e_name}}</option>
                        @endforeach       
		            </select>
		        </div>
		    </div>
			<div class="form-group row">
		        <label class="col-sm-2 col-form-label">Người nhận</label>
		        <div class="col-sm-2">
		            <select multiple="true" class="form-control select2 js-example-basic-single" name="employee_task[]" id="employee_task">
	                    @foreach($e as $key => $e1)
	                    <option value="{{$e1 ->e_id}}">{{$e1 ->e_name}}</option>
	                    @endforeach       
		            </select>
		        </div>
		    </div>
			<div class="form-group row">
                <label for="example-date-input" class="col-sm-2 col-form-label">Ngày bắt đầu</label>
                <div class="col-sm-2">
                    <input class="form-control" type="date" name="task_start">
                </div>
            </div>
            <div class="form-group row">
                <label for="example-date-input" class="col-sm-2 col-form-label">Ngày kết thúc</label>
                <div class="col-sm-2">
                    <input class="form-control" type="date" name="task_end">
                </div>
            </div>			
			<div class="form-group row">
                <label for="example-date-input" class="col-sm-2 col-form-label">Ghi chú</label>
                <div class="col-sm-4">
                    <textarea required class="form-control" name="task_node" rows="5"></textarea>
                </div>
            </div>
    		<div class="form-group row">
		        <label class="col-sm-2 col-form-label">Trạng thái</label>
		        <div class="col-sm-4">
		            <select class="form-control"  name="task_status" >
                       	<option value="0">Bắt đầu</option>
                        <option value="1">Hoạt động</option>
		            </select>
		        </div>
		    </div>
            <button type="submit" name="add_task" class="btn btn-success waves-effect waves-light">Thêm công việc</button>
		</form>
        @endforeach
    </div><!-- container fluid -->

</div> <!-- Page content Wrapper -->
@endsection