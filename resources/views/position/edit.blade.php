@extends('admin_layout')
@section('admin_content')
<div class="page-content-wrapper ">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h4 class="page-title m-0">Cập nhật chức vụ</h4>
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
        @foreach($position as $p)    	
		<form role="form" action="{{URL::to('/update-position/'.$p->position_id)}}" method="post" enctype="multipart/form-data">
        	{{csrf_field()}}     	
			<div class="form-group row">
			    <label for="example-name-input" class="col-sm-2 col-form-label">Tên chức vụ</label>
			    <div class="col-sm-4">
			        <input class="form-control" value="{{$p->position_name}}" type="text" name="name">
			    </div>
			</div>

            <div class="form-group row">
                <label for="example-name-input" class="col-sm-2 col-form-label">Mô tả</label>
                <div class="col-sm-4">
                    <textarea name="note" id="note">{{$p->position_note}}</textarea>
                </div>
            </div>

			<button type="submit" name="update_position" class="btn btn-success waves-effect waves-light">Cập nhật chức vụ</button>
		</form>
        @endforeach
    </div><!-- container fluid -->
</div> <!-- Page content Wrapper -->
@endsection