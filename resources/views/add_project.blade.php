@extends('admin_layout')
@section('admin_content')
<script>
	$(document).ready(function() {
	$(".js-example-basic-single").select2();
	// Thêm các tùy chọn của bạn vào đây.
	});
</script>
<div class="page-content-wrapper ">

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h4 class="page-title m-0">Thêm dự án</h4>

                            <?php
                            $message= Session::get('message');
                            if($message){
                                echo '<h6 style="color: blue;">'.$message.'</h6>';
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
        <form role="form" action="{{URL::to('/save-project')}}" method="post" enctype="multipart/form-data">
        	{{csrf_field()}}   

			<div class="form-group row">
			    <label for="example-name-input" class="col-sm-2 col-form-label">Tên dự án</label>
			    <div class="col-sm-4">
			        <input class="form-control" type="text" name="project_name">
			    </div>
			</div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Loại dự án</label>
                <div class="col-sm-4">
                    <select class="form-control"  name="service_name">
                        @foreach($service as $s)
                        <option value="{{$s ->service_id}}">{{$s ->service_name}}</option>
                        @endforeach    
                    </select>
                </div>
            </div>
			<div class="form-group row">
		        <label class="col-sm-2 col-form-label">Tên khách hàng</label>
		        <div class="col-sm-4">
		            <select class="form-control"  name="customer_name">
                        @foreach($customer as $c)
                        <option value="{{$c ->customer_id}}">{{$c ->customer_name}}</option>
                        @endforeach    
		            </select>
		        </div>
		    </div>
            
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Người quản lý dự án</label>

                <div class="col-sm-4">
                    
                    <select class="form-control" name="project_manager" >
                       @foreach($e as $key => $e1)
                        @foreach($role as  $r)
                        @if($e1->e_id == $r->admin_e_id )
                        <option value="{{$e1 ->e_id}}">{{$e1 ->e_name}}</option>
                        @endif
                        @endforeach     
                        @endforeach 
                    </select>
                    
                </div>
                 
            </div>
            <div class="form-group row">
                <label for="example-datetime-local-input" class="col-sm-2 col-form-label">Ngày bắt đầu</label>
                <div class="col-sm-4">
                    <input class="form-control" type="datetime-local" name="project_start">
                </div>
            </div>
            <div class="form-group row">
                <label for="example-datetime-local-input" class="col-sm-2 col-form-label">Ngày kết thúc</label>
                <div class="col-sm-4">
                    <input class="form-control" type="datetime-local" name="project_end">
                </div>
            </div>
			
            <div class="form-group row">
                <label for="example-name-input" class="col-sm-2 col-form-label">File đính kèm</label>
                <div class="col-sm-4">
                    <input multiple type="file" name="project_file[]">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-name-input" class="col-sm-2 col-form-label">Mô tả</label>
                <div class="col-sm-4">
                    <textarea name="project_note" id="note"></textarea>
                </div>
            </div>
              
            <button type="submit" name="add_project" class="btn btn-success waves-effect waves-light">Thêm dự án</button>
		</form>
    </div><!-- container fluid -->

</div> <!-- Page content Wrapper -->
@endsection