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
<script type="text/javascript">CKEDITOR.replace( 'note' );</script>
<div class="page-content-wrapper ">

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h4 class="page-title m-0">Thêm nhân viên</h4>
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
        <form role="form" action="{{URL::to('/save-employee')}}" method="post" enctype="multipart/form-data">
        	{{csrf_field()}}  
        	<div class="form-group row">
			    <label for="example-name-input" class="col-sm-2 col-form-label">Ảnh</label>
			    <div class="col-sm-2">
			        <input type="file" name="e_avatar">
			    </div>
			</div> 	
			<div class="form-group row">
			    <label for="example-name-input" class="col-sm-2 col-form-label">Tên nhân viên</label>
			    <div class="col-sm-4">
			        <input class="form-control" type="text" name="e_name" id="example-name-input">
			    </div>
			</div>
			<div class="form-group row">
			    <label for="example-email-input" class="col-sm-2 col-form-label">Email</label>
			    <div class="col-sm-4">
			        <input class="form-control" type="email" name="e_email" id="example-email-input">
			    </div>
			</div>

			<div class="form-group row">
			    <label for="example-tel-input" class="col-sm-2 col-form-label">Mật khẩu</label>
			    <div class="col-sm-4">
			        <input class="form-control" type="password" name="e_password" id="example-tel-input">
			    </div>
			</div>
		
			<div class="form-group row">
			    <label for="example-tel-input" class="col-sm-2 col-form-label">Địa chỉ</label>
			    <div class="col-sm-4">
			        <input class="form-control" type="text" name="e_address" id="example-tel-input">
			    </div>
			</div>
			<div class="form-group row">
			    <label for="example-tel-input" class="col-sm-2 col-form-label">Chứng minh nhân dân</label>
			    <div class="col-sm-4">
			        <input class="form-control" type="tel" name="e_cmnd" id="example-tel-input">
			    </div>
			</div>
			<div class="form-group row">
			    <label for="example-tel-input" class="col-sm-2 col-form-label">Giới tính</label>
			    <div class="col-sm-4">
			        <input class="form-control" type="text" name="e_sex" id="example-tel-input">
			    </div>
			</div>	
			<div class="form-group row">
			    <label for="example-tel-input" class="col-sm-2 col-form-label">Số điện thoại</label>
			    <div class="col-sm-4">
			        <input class="form-control" type="tel" name="e_phone" id="example-tel-input">
			    </div>
			</div>
			

	    	<div class="form-group row">
		        <label class="col-sm-2 col-form-label">Phòng ban</label>
		        <div class="col-sm-4 js-example-basic-multiple">
		            <select class="form-control " name="department_id">
	                    @foreach($e_department as $key => $department)
	                    <option value="{{$department->department_id}}">{{$department->department_name}}</option>
	                    @endforeach        
		            </select>
		        </div>
		    </div>
	    	<div class="form-group row">
		        <label class="col-sm-2 col-form-label">Chức vụ</label>
		        <div class="col-sm-4">
		            <select class="form-control" name="position_id">
	                    @foreach($e_position as $key => $position)
	                    <option value="{{$position->position_id}}">{{$position->position_name}}</option>
	                    @endforeach                              
		            </select>
		        </div>
		    </div>
<!-- 		    <div class="form-group row">
		        <label class="col-sm-2 col-form-label">Chọn vai trò</label>
		        <div class="col-sm-4">
		            <select class="form-control select2 "  name="roles[]" multiple >
                       	@foreach($roles as $key => $roles)
	                    <option value="{{$roles->id_roles}}">{{$roles->name}}</option>
	                    @endforeach  
	                </select>
		        </div>
		    </div> -->
		    <ul>
		    	@foreach($errors->all() as $error)
		    	     <li>{{$error}}</li>
		    	@endforeach
		    </ul>
            <button type="submit" name="add_employee" class="btn btn-success waves-effect waves-light">Thêm nhân viên</button>
		</form>
    </div><!-- container fluid -->

</div> <!-- Page content Wrapper -->
@endsection