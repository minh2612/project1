@extends('admin_layout')
@section('admin_content')
<div class="page-content-wrapper ">

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h4 class="page-title m-0">Cập nhật phòng ban</h4>
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
        @foreach($edit_department as $key => $edit_department)    	
		<form role="form" action="{{URL::to('/update-department/'.$edit_department->department_id)}}" method="post" enctype="multipart/form-data">
        	{{csrf_field()}}     	
			<div class="form-group row">
			    <label for="example-name-input" class="col-sm-2 col-form-label">Tên phòng ban</label>
			    <div class="col-sm-4">
			        <input class="form-control" value="{{$edit_department->department_name}}" type="text" name="department_name" id="example-name-input">
			    </div>
			</div>
            <div class="form-group row">
                <label for="example-name-input" class="col-sm-2 col-form-label">Ghi chú</label>
                <div class="col-sm-4">
                    <textarea required class="form-control" value="" type="text" name="department_note" id="example-name-input"rows="5">{{$edit_department->department_note}}</textarea>
                        
                </div>
            </div>
			<button type="submit" name="update_department" class="btn btn-success waves-effect waves-light">Cập nhật phòng ban</button>
		</form>
        @endforeach
    </div><!-- container fluid -->

</div> <!-- Page content Wrapper -->
@endsection