@extends('admin_layout')
@section('admin_content')
<div class="page-content-wrapper ">

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h4 class="page-title m-0">Cập nhật dự án</h4>
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
         @foreach($edit_project as $key=> $project)
        <form role="form" action="{{URL::to('/update-project/'.$project->project_id)}}" method="post" enctype="multipart/form-data">
        	{{csrf_field()}}     	
			<div class="form-group row">
			    <label for="example-name-input" class="col-sm-2 col-form-label">Tên dự án</label>
			    <div class="col-sm-4">
			        <input class="form-control" value="{{$project->project_name}}" type="text" name="project_name" id="example-name-input">
			    </div>
			</div>
			<div class="form-group row">
			    <label for="example-email-input" class="col-sm-2 col-form-label">Người giao</label>
			    <div class="col-sm-4">
			        <input class="form-control" value="{{$project->project_admin}}" type="text" name="project_admin" id="example-email-input">
			    </div>
			</div>
			<div class="form-group row">
			    <label for="example-password-input" class="col-sm-2 col-form-label">Ngày bắt đầu</label>
			    <div class="col-sm-4">
			        <input class="form-control" value="{{$project->project_start}}" type="date" name="project_start" id="example-password-input">
			    </div>
			</div>
			<div class="form-group row">
			    <label for="example-tel-input" class="col-sm-2 col-form-label">Ngày kết thúc</label>
			    <div class="col-sm-4">
			        <input class="form-control" value="{{$project->project_end}}" type="date" name="project_end" id="example-tel-input">
			    </div>
			</div>
			<div class="form-group row">
			    <label for="example-tel-input" class="col-sm-2 col-form-label">Tình trạng công việc</label>
			    <div class="col-sm-2">
			        <select name="project_status" value="{{$project->project_status}}" class="form-control input-sm m-bot15">
                        <option value="0">Chưa bắt đầu</option>
                        <option value="1">Hoạt động</option>
                        <option value="2">Kết thúc</option>
                    </select>
			    </div>
			</div>
            <button type="submit" name="update_project" class="btn btn-success waves-effect waves-light">Cập nhật thông tin</button>
		</form>
		@endforeach
    </div><!-- container fluid -->

</div> <!-- Page content Wrapper -->
@endsection