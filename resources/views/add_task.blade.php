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
        <form role="form" action="{{URL::to('/save-task/')}}" method="post" enctype="multipart/form-data">
        	{{csrf_field()}}     	
			<div class="form-group row">
			    <label for="example-name-input" class="col-sm-2 col-form-label">Tên công việc</label>
			    <div class="col-sm-4">
			        <input class="form-control" type="text" name="task_name">
			    </div>
			</div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tên dự án</label>
                <div class="col-sm-4">
                    <select class="form-control"  name="project_id" >
                        @foreach($project as $key => $project1)
                        <option value="{{$project1 ->project_id}}">{{$project1 ->project_name}}</option>
                        @endforeach       
                    </select>
                </div>
            </div>
			<div class="form-group row">
		        <label class="col-sm-2 col-form-label">Người nhận</label>
		        <div class="col-sm-4">
                    
		            <select multiple="true" class="form-control select2 js-example-basic-single" name="employee_task[]" >
	           
                       @foreach($e as $key => $e1)
	                    <option value="{{$e1 ->e_id}}">{{$e1 ->e_name}}</option>
                       
	                    @endforeach     
                     
		            </select>
                
		        </div>
		    </div>
			<div class="form-group row">
                <label for="example-date-input" class="col-sm-2 col-form-label">Ngày bắt đầu</label>
                <div class="col-sm-4">
                    <input class="form-control" type="date" name="task_start" id="today">
                </div>
            </div>
            <div class="form-group row">
                <label for="example-date-input" class="col-sm-2 col-form-label">Ngày kết thúc</label>
                <div class="col-sm-4">
                    <input class="form-control" type="date" name="task_end">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Mức độ ưu tiên</label>
                <div class="col-sm-4">
                    <select class="form-control" name="task_priority" >
                        <option value="Thấp">Thấp</option>    
                        <option value="Trung bình">Trung bình</option>    
                        <option value="Cao">Cao</option>      
                    </select>
                </div>
            </div>			
			<div class="form-group row">
                <label for="example-date-input" class="col-sm-2 col-form-label">Ghi chú</label>
                <div class="col-sm-4">
                    <textarea required class="form-control" name="task_note" rows="5"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="example-date-input" class="col-sm-2 col-form-label">File đính kèm</label>
                <div class="col-sm-2">
                    <input  type="file" name="task_file">
                </div>
            </div>  
            <ul>
               @foreach ($errors->all() as $error)
                    <li>{{$error }}</li>
               @endforeach
            </ul>
            <button type="submit" name="add_task" class="btn btn-success waves-effect waves-light">Thêm công việc</button>
		</form>
    </div><!-- container fluid -->

</div> <!-- Page content Wrapper -->
@endsection