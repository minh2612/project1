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
                         	@foreach($errors->all() as $error)
                                     <li>{{$error}}</li>
                            @endforeach
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- end page-title-box -->
            </div>
        </div> 
        <!-- end page title -->
        @foreach($department as $d)    	
		<form role="form" action="{{URL::to('/update-department/'.$d->department_id)}}" method="post" enctype="multipart/form-data">
        	{{csrf_field()}}     	
			<div class="form-group row">
			    <label for="example-name-input" class="col-sm-2 col-form-label">Tên phòng ban</label>
			    <div class="col-sm-4">
			        <input class="form-control" value="{{$d->department_name}}" type="text" name="name">
			    </div>
			</div>

            <div class="row">
                <label for="example-name-input" class="col-sm-2 col-form-label">Ghi chú</label>
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                                <textarea id="elm1" name="note">{{$d->department_note}}</textarea>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

			<button type="submit" name="update_department" class="btn btn-success waves-effect waves-light">Cập nhật phòng ban</button>
		</form>
        @endforeach
    </div><!-- container fluid -->
</div> <!-- Page content Wrapper -->
@endsection