@extends('admin_layout')
@section('admin_content')
<div class="page-content-wrapper ">

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h4 class="page-title m-0">Thêm khách hàng</h4>
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
        <form role="form" action="{{URL::to('/save-customer')}}" method="post" enctype="multipart/form-data">
        	{{csrf_field()}}  
        	<div class="form-group row">
			    <label for="example-name-input" class="col-sm-2 col-form-label">Tên khách hàng</label>
			    <div class="col-sm-4">
			        <input class="form-control" type="text" name="customer_name" id="example-name-input">
			    </div>
			</div>
			<div class="form-group row">
			    <label for="example-email-input" class="col-sm-2 col-form-label">Email</label>
			    <div class="col-sm-4">
			        <input class="form-control" type="email" name="customer_email" id="example-email-input">
			    </div>
			</div>
        	  <div class="form-group row">
			    <label for="example-name-input" height="100" width="100" class="col-sm-2 col-form-label">Ảnh</label>
			    <div class="col-sm-4">
			        <input class="form-control" type="file" name="customer_avatar" id="example-name-input">
			    </div>
			</div> 	
			
			<div class="form-group row">
			    <label for="example-tel-input" class="col-sm-2 col-form-label">Năm sinh</label>
			    <div class="col-sm-4">
			        <input class="form-control" type="tel" name="customer_born_year" id="example-tel-input">
			    </div>
			</div>
			
		
			<div class="form-group row">
			    <label for="example-tel-input" class="col-sm-2 col-form-label">Địa chỉ</label>
			    <div class="col-sm-4">
			        <input class="form-control" type="text" name="customer_address" id="example-tel-input">
			    </div>
			</div>
			
			<div class="form-group row">
			    <label for="example-tel-input" class="col-sm-2 col-form-label">Giới tính</label>
			    <div class="col-sm-4">
			        <input class="form-control" type="text" name="customer_sex" id="example-tel-input">
			    </div>
			</div>	
			<div class="form-group row">
			    <label for="example-tel-input" class="col-sm-2 col-form-label">Số điện thoại</label>
			    <div class="col-sm-4">
			        <input class="form-control" type="tel" name="customer_phone" id="example-tel-input">
			    </div>
			</div>
			

	    	<div class="form-group row">
		        <label class="col-sm-2 col-form-label">Người tạo</label>
		        <div class="col-sm-2">
		            <select class="form-control" name="e_id">
                    @foreach($customer_employee as $key => $employee)
                    <option value="{{$employee->e_id}}">{{$employee->e_name}}</option>
                    @endforeach        
		            </select>
		        </div>
		    </div>
	    	<div class="form-group row">
		        <label class="col-sm-2 col-form-label">Nhóm khách hàng</label>
		        <div class="col-sm-2">
		            <select class="form-control" name="customer_group_id">
                    @foreach($customer_groups as $key => $customer_group)
                    <option value="{{$customer_group->customer_group_id}}">{{$customer_group->customer_group_name}}</option>
                    @endforeach                              
		            </select>
		        </div>
		    </div>
		    <div class="form-group row">
			    <label for="example-tel-input" class="col-sm-2 col-form-label">Mã code khách hàng</label>
			    <div class="col-sm-4">
			        <input class="form-control" type="tel" name="customer_code" id="example-tel-input">
			    </div>
			</div>
		   
		    <ul>
		    	@foreach($errors->all() as $error)
		    	     <li>{{$error}}</li>
		    	@endforeach
		    </ul>
            <button type="submit" name="add_customer" class="btn btn-success waves-effect waves-light">Thêm khách hàng</button>
		</form>
    </div><!-- container fluid -->

</div> <!-- Page content Wrapper -->
@endsection