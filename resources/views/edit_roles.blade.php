@extends('admin_layout')
@section('admin_content')
<div class="page-content-wrapper ">

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h4 class="page-title m-0">Cập nhật vai trò</h4>
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
  
		   	
			<form role="form" method="post" action="{{URL::to('/update-roles/'.$role->id_roles)}}" enctype="multipart/form-data">
            {{csrf_field()}}        
            <div class="form-group row">
                <label for="example-name-input" class="col-sm-2 col-form-label">Tên vai trò</label>
                <div class="col-sm-4">
                    <input class="form-control" value="{{ $role->name }}" type="text" name="name" id="example-name-input">
                </div>
            </div>
            <div class="form-group row">
                <label for="example-name-input" class="col-sm-2 col-form-label">Quyền</label>
               <div>
                   @foreach($permissions as $permission)
                 <input type="checkbox" name="permission[]"  {{ $getAllPermissionOfRole->contains($permission->id_permission) ? 'checked' : ''}} value="{{$permission->id_permission }}">
                  <label class="form-check-label" >{{ $permission->permission_name }}</label>
                   </div>  
                @endforeach
                        
                
            </div>
			<button type="submit" name="update_department" class="btn btn-success waves-effect waves-light">Cập nhật phòng ban</button>
		</form>

    </div><!-- container fluid -->

</div> <!-- Page content Wrapper -->
@endsection