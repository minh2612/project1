@extends('admin_layout')
@section('admin_content')
<div class="page-content-wrapper ">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h4 class="page-title m-0">Cập nhật dịch vụ</h4>
                            <ul>
                                @foreach($errors->all() as $error)
                                     <li>{{$error}}</li>
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
        @foreach($service as  $sv)      	
		<form role="form" action="{{URL::to('/update-service/'.$sv->service_id)}}" method="post" >
        	{{csrf_field()}}     	
			<div class="form-group row">
			    <label for="example-name-input" class="col-sm-2 col-form-label">Tên dịch vụ</label>
			    <div class="col-sm-4">
			        <input class="form-control" type="text" name="name" value="{{$sv->service_name}}">
			    </div>
			</div>
            <div class="row">
                <label for="example-name-input" class="col-sm-2 col-form-label">Ghi chú</label>
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                                <textarea id="elm1" name="note">{{$sv->service_note}}</textarea>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->  
			<button type="submit" name="update_service" class="btn btn-success waves-effect waves-light">Cập nhật dịch vụ</button>
		</form>
        @endforeach
    </div><!-- container fluid -->

</div> <!-- Page content Wrapper -->
@endsection