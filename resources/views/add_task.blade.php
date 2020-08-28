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
                            <h4 class="page-title m-0">Thêm công việc</h4>
                            <?php
                            $message= Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message', null);
                            }
                            ?>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{$error }}</li>
                                @endforeach
                            </ul>                            
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
                    
		            <select multiple="true" class="form-control select2" name="employee_task[]" >
	           
                       @foreach($e as $key => $e1)
	                    <option value="{{$e1 ->e_id}}">{{$e1 ->e_name}}</option>
                       
	                    @endforeach     
                     
		            </select>
                
		        </div>
		    </div>

            <div class="form-group row">
                <label for="example-datetime-local-input" class="col-sm-2 col-form-label">Ngày bắt đầu</label>
                <div class="col-sm-4">
                    <input class="form-control" type="datetime-local" name="task_start">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-datetime-local-input" class="col-sm-2 col-form-label">Ngày bắt đầu</label>
                <div class="col-sm-4">
                    <input class="form-control" type="datetime-local" name="task_end">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Mức độ ưu tiên</label>
                <div class="col-sm-4">
                    <select class="form-control" name="priority_id" >
                        <option value="1">Thấp</option>
                        <option value="2">Trung bình</option>    
                        <option value="3">Cao</option>         
                    </select>
                </div>
            </div>			

            <div class="form-group row">
                <label for="example-date-input" class="col-sm-2 col-form-label">File đính kèm</label>
                <div class="col-sm-2">
                    <input multiple="" type="file" name="task_file[]">
                </div>
            </div>
            
            <div class="form-group row">
                <label for="example-name-input" class="col-sm-2 col-form-label">Mô tả</label>
                <div class="col-sm-4">
                    <textarea name="task_note" id="note"></textarea>
                </div>
            </div>
 
            <button type="submit" name="add_task" class="btn btn-success waves-effect waves-light">Thêm công việc</button>
		</form>
    </div><!-- container fluid -->

</div> <!-- Page content Wrapper -->
@endsection