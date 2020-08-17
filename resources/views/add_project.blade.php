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
                            <h4 class="page-title m-0">Thêm dự án</h4>
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
        <form role="form" action="{{URL::to('/save-project')}}" method="post" enctype="multipart/form-data">
        	{{csrf_field()}}   

			<div class="form-group row">
			    <label for="example-name-input" class="col-sm-2 col-form-label">Tên dự án</label>
			    <div class="col-sm-4">
			        <input class="form-control" type="text" name="project_name">
			    </div>
			</div>
			<div class="form-group row">
		        <label class="col-sm-2 col-form-label">Người giao</label>
		        <div class="col-sm-2">
		            <select class="form-control"  name="project_admin" id="project_admin">
                        @foreach($e as $key => $e1)
                        <option value="{{$e1 ->e_id}}">{{$e1 ->e_name}}</option>
                        @endforeach       
		            </select>
		        </div>
		    </div>
			<div class="form-group row">
		        <label class="col-sm-2 col-form-label">Người nhận</label>
		        <div class="col-sm-2">
		            <select multiple="true" class="form-control select2 js-example-basic-single" name="employee_project[]" id="employee_project">
	                    @foreach($e as $key => $e1)
	                    <option value="{{$e1 ->e_id}}">{{$e1 ->e_name}}</option>
	                    @endforeach       
		            </select>
		        </div>
		    </div>
			<div class="form-group row">
                <label for="example-date-input" class="col-sm-2 col-form-label">Ngày bắt đầu</label>
                <div class="col-sm-2">
                    <input class="form-control" type="date" name="project_start">
                </div>
            </div>
            <div class="form-group row">
                <label for="example-date-input" class="col-sm-2 col-form-label">Ngày kết thúc</label>
                <div class="col-sm-2">
                    <input class="form-control" type="date" name="project_end">
                </div>
            </div>			
			<div class="form-group row">
                <label for="example-date-input" class="col-sm-2 col-form-label">Ghi chú</label>
                <div class="col-sm-4">
                    <textarea required class="form-control" name="project_node" rows="5"></textarea>
                </div>
            </div>
    		<div class="form-group row">
		        <label class="col-sm-2 col-form-label">Trạng thái</label>
		        <div class="col-sm-4">
		            <select class="form-control"  name="project_status" >
                       	<option value="0">Chưa bắt đầu</option>
	                    <option value="1">Hoạt động</option>
	                    <option value="2">Kết thúc</option>
		            </select>
		        </div>
		    </div>
            <ul>
               @foreach ($errors->all() as $error)
                    <li>{{$error }}</li>
               @endforeach
            </ul>
            <button type="submit" name="add_project" class="btn btn-success waves-effect waves-light">Thêm dự án</button>
		</form>
    </div><!-- container fluid -->

</div> <!-- Page content Wrapper -->
@endsection