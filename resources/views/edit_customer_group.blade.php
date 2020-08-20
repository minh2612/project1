@extends('admin_layout')
@section('admin_content')
<div class="page-content-wrapper ">

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h4 class="page-title m-0">Cập nhật nhóm khách hàng</h4>
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
        @foreach($edit_customer_group as $key => $edit_customer_group)    	
		<form role="form" action="{{URL::to('/update-customer-group/'.$edit_customer_group->customer_group_id)}}" method="post" enctype="multipart/form-data">
        	{{csrf_field()}}     	
			<div class="form-group row">
			    <label for="example-name-input" class="col-sm-2 col-form-label">Tên nhóm khách hàng</label>
			    <div class="col-sm-4">
			        <input class="form-control" value="{{$edit_customer_group->customer_group_name}}" type="text" name="customer_group_name" id="example-name-input">
			    </div>
			</div>
			<button type="submit" name="update_customer_group" class="btn btn-success waves-effect waves-light">Cập nhật nhóm khách hàng</button>
		</form>
        @endforeach
    </div><!-- container fluid -->

</div> <!-- Page content Wrapper -->
@endsection