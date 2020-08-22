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
                <label class="col-sm-2 col-form-label">Tên dự án</label>
                <div class="col-sm-4">
                    <select class="form-control" name="project_name">
                    @foreach($project as $key => $project1)
                        @if($project1->project_id == $task->project_id)
                        <option selected value="{{$project1->project_id}}">{{$project1->project_name}}</option>
                        @else
                        <option value="{{$project1->project_id}}">{{$project1->project_name}}</option>
                        @endif
                    @endforeach  
                    </select>
                </div>
            </div>
            
			<div class="form-group row">
			    <label for="example-tel-input" class="col-sm-2 col-form-label">Ngày kết thúc</label>
			    <div class="col-sm-4">
			        <input class="form-control" value="{{$task->task_end}}" type="date" name="task_end" id="example-tel-input">
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
                    <textarea required class="form-control" value="{{$task->task_note}}" name="task_note" rows="5"><?php echo $task->task_note ?></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label for="example-date-input" class="col-sm-2 col-form-label">File đính kèm</label>
                <div class="col-sm-2">
                    <input  type="file" name="task_file">
                </div>
            </div>  
            <button type="submit" name="update_employee" class="btn btn-success waves-effect waves-light">Cập nhật thông tin</button>
		</form>
		@endforeach
    </div><!-- container fluid -->

</div> <!-- Page content Wrapper -->
@endsection