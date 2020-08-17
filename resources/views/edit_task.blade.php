@extends('admin_layout')
@section('admin_content')
<div class="page-content-wrapper ">

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h4 class="page-title m-0">Cập nhật công việc</h4>
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
         @foreach($edit_task as $key=> $task)
        <form role="form" action="{{URL::to('/update-task/'.$task->task_id)}}" method="post" enctype="multipart/form-data">
        	{{csrf_field()}}     	
			<div class="form-group row">
			    <label for="example-name-input" class="col-sm-2 col-form-label">Tên công việc</label>
			    <div class="col-sm-4">
			        <input class="form-control" value="{{$task->task_name}}" type="text" name="task_name" id="example-name-input">
			    </div>
			</div>
			<div class="form-group row">
			    <label for="example-email-input" class="col-sm-2 col-form-label">Người giao</label>
			    <div class="col-sm-4">
			        <input class="form-control" value="{{$task->task_admin}}" type="text" name="task_admin" id="example-email-input">
			    </div>
			</div>
			<div class="form-group row">
			    <label for="example-password-input" class="col-sm-2 col-form-label">Ngày bắt đầu</label>
			    <div class="col-sm-4">
			        <input class="form-control" value="{{$task->task_start}}" type="date" name="task_start" id="example-password-input">
			    </div>
			</div>
			<div class="form-group row">
			    <label for="example-tel-input" class="col-sm-2 col-form-label">Ngày kết thúc</label>
			    <div class="col-sm-4">
			        <input class="form-control" value="{{$task->task_end}}" type="date" name="task_end" id="example-tel-input">
			    </div>
			</div>
			<div class="form-group row">
			    <label for="example-tel-input" class="col-sm-2 col-form-label">Tình trạng công việc</label>
			    <div class="col-sm-2">
			        <select name="task_status" class="form-control input-sm m-bot15">
                        <option value="0">Bắt đầu</option>
                        <option value="1">Đang diễn ra</option>
                        <option value="2">Đang đợi duyệt</option>
                        <option value="3">Hoàn thành</option>
                    </select>
			    </div>
			</div>
            <button type="submit" name="update_employee" class="btn btn-success waves-effect waves-light">Cập nhật thông tin</button>
		</form>
		@endforeach
    </div><!-- container fluid -->

</div> <!-- Page content Wrapper -->
@endsection