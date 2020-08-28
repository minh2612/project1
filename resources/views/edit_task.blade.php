@extends('admin_layout')
@section('admin_content')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
    $('.select2').select2();
    });
</script>
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
			        <input class="form-control" value="{{$task->task_name}}" type="text" name="task_name">
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
                <label class="col-sm-2 col-form-label">Người nhận</label>
                <div class="col-sm-4">
                    
                    <select multiple="true" class="form-control select2" name="employee_task[]" >
               
                       @foreach($e as $key => $e1)
                        <option value="{{$e1 ->e_id}}">{{$e1 ->e_name}}</option>
                       
                        @endforeach     
                     
                    </select>
                
                </div>
            </div>
            <div class="form-group row">
                <label for="example-datetime-local-input" class="col-sm-2 col-form-label">Ngày kết thúc</label>
                <div class="col-sm-4">
                    <input class="form-control" value="{{$task->task_end}}" type="datetime-local" name="task_end">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Mức độ ưu tiên</label>
                <div class="col-sm-4">
                    <select class="form-control" name="priority_name" >
                        @foreach($priority as $key => $priority1)
                        @if($priority1->priority_id == $task->priority_id)
                        <option  selected value="{{$priority1->priority_id}}">{{$priority1->priority_name}}</option>
                        @else
                        <option value="{{$priority1->priority_id}}">{{$priority1->priority_name}}</option>    
                        @endif
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="example-date-input" class="col-sm-2 col-form-label">File đính kèm</label>
                <div class="col-sm-2">
                    <input  type="file" name="task_file">
                    <a href="{{URL::to('/download/'.$task->task_file)}}">{{ $task->task_file}}</a>
                </div>
            </div>   
            <div class="form-group row">
                <label for="example-name-input" class="col-sm-2 col-form-label">Mô tả</label>
                <div class="col-sm-4">
                    <textarea name="task_note" id="note">{{$task->task_note}}</textarea>
                </div>
            </div>   

            <button type="submit" name="update_employee" class="btn btn-success waves-effect waves-light">Cập nhật công việc</button>
		</form>
		@endforeach
    </div><!-- container fluid -->

</div> <!-- Page content Wrapper -->
@endsection