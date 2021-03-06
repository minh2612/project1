@extends('admin_layout')
@section('admin_content')
<div class="page-content-wrapper ">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h4 class="page-title m-0">Thêm dịch vụ</h4>
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
		<form role="form" action="{{URL::to('/save-service')}}" method="post" >
        	{{csrf_field()}}     	
			<div class="form-group row">
			    <label for="example-name-input" class="col-sm-2 col-form-label">Tên dịch vụ</label>
			    <div class="col-sm-4">
			        <input class="form-control" type="text" name="name">
			    </div>
			</div>
            <div class="form-group row">
                <label for="example-name-input" class="col-sm-2 col-form-label">Mô tả</label>
                <div class="col-sm-4">
                    <textarea name="note" id="note"></textarea>
                </div>
            </div>
			<button type="submit" name="add" class="btn btn-success waves-effect waves-light">Thêm dịch vụ</button>
		</form>
    </div><!-- container fluid -->
</div> <!-- Page content Wrapper -->
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">CKEDITOR.replace( 'note' );</script>
@endsection