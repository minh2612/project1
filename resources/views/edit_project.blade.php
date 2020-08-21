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
                <label class="col-sm-2 col-form-label">Tên khách hàng</label>
                <div class="col-sm-4">
                    <select class="form-control" name="customer_name">
                    @foreach($customer as $key => $value)
                        @if($value->customer_id == $project->customer_id)
                        <option selected value="{{$value->customer_id}}">{{$value->customer_name}}</option>
                        @else
                        <option value="{{$value->customer_id}}">{{$value->customer_name}}</option>
                        @endif
                    @endforeach  
                    </select>
                </div>
            </div>
			<div class="form-group row">
                <label class="col-sm-2 col-form-label">Người quản lý dự án</label>
                <div class="col-sm-4">
                    <select class="form-control" name="customer_name">
                    @foreach($employee as $key => $value)
                        @if($value->e_id == $project->project_manager)
                        <option selected value="{{$value->e_id}}">{{$value->e_name}}</option>
                        @else
                        <option value="{{$value->e_id}}">{{$value->e_name}}</option>
                        @endif
                    @endforeach  
                    </select>
                </div>
            </div>
			<div class="form-group row">
			    <label for="example-tel-input" class="col-sm-2 col-form-label">Ngày kết thúc</label>
			    <div class="col-sm-4">
			        <input class="form-control" value="{{$project->project_end}}" type="date" name="project_end" id="example-tel-input">
			    </div>
			</div>
            <div class="form-group row">
                <label for="example-date-input" class="col-sm-2 col-form-label">Ghi chú</label>
                <div class="col-sm-4">
                    <textarea required class="form-control" value="{{$project->project_node}}" name="project_node" rows="5"><?php echo $project->project_node ?></textarea>
                </div>
            </div>
            <button type="submit" name="update_project" class="btn btn-success waves-effect waves-light">Cập nhật thông tin</button>
		</form>
		@endforeach
    </div><!-- container fluid -->

</div> <!-- Page content Wrapper -->
@endsection