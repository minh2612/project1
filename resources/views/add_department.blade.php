@extends('admin_layout')
@section('admin_content')
<div class="page-content-wrapper ">

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h4 class="page-title m-0">Thêm phòng ban</h4>
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
		<form role="form" action="{{URL::to('/save-department')}}" method="post" >
        	{{csrf_field()}}     	
			<div class="form-group row">
			    <label for="example-name-input" class="col-sm-2 col-form-label">Tên phòng ban</label>
			    <div class="col-sm-4">
			        <input class="form-control" type="text" name="department_name" id="example-name-input">
			    </div>
			</div>
             <ul>
                @foreach($errors->all() as $error)
                     <li>{{$error}}</li>
                @endforeach
            </ul>
			<button type="submit" name="add_department" class="btn btn-success waves-effect waves-light">Thêm phòng ban</button>
		</form>
    </div><!-- container fluid -->

</div> <!-- Page content Wrapper -->
@endsection