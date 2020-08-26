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
            
             <div style="margin-left: 20px; margin-top: 50px;" >
            <h6 style="padding-bottom: 10px;" class="page-title m-0">VAI TRÒ</h6>
            @foreach($permission  as $permission1)
                @if(strpos($permission1->permission_name,'role'))
                    <div class="form-check" style="float: left; padding-right: 100px;">
                        <input type="checkbox" name="permission[]"  {{ $getAllPermissionOfRole->contains($permission1->id_permission) ? 'checked' : ''}} value="{{$permission1->id_permission }}">
                        <label class="form-check-label" > {{trans('auth.'.$permission1->permission_name)}}</label>
                    </div>
                @endif
                @endforeach
        </div> 

         <div style="margin-left: 20px; margin-top: 50px;" >
            <h6 style="padding-bottom: 10px;" class="page-title m-0">NHÂN VIÊN</h6>
            @foreach($permission  as $permission1)
                @if(strpos($permission1->permission_name,'employee'))
                    <div class="form-check" style="float: left; padding-right: 100px;">
                       <input type="checkbox" name="permission[]"  {{ $getAllPermissionOfRole->contains($permission1->id_permission) ? 'checked' : ''}} value="{{$permission1->id_permission }}">
                        <label class="form-check-label" > {{trans('auth.'.$permission1->permission_name)}}</label>
                    </div>
                @endif
            @endforeach    
        </div>  

         <div style="margin-left: 20px; margin-top: 50px;" >
            <h6 style="padding-bottom: 10px;" class="page-title m-0">DỰ ÁN</h6>
            @foreach($permission  as $permission1)
                @if(strpos($permission1->permission_name,'project'))
                    <div class="form-check" style="float: left; padding-right: 100px;">
                        <input type="checkbox" name="permission[]"  {{ $getAllPermissionOfRole->contains($permission1->id_permission) ? 'checked' : ''}} value="{{$permission1->id_permission }}">
                        <label class="form-check-label" > {{trans('auth.'.$permission1->permission_name)}}</label>
                    </div>
                @endif
            @endforeach    
        </div> 

         <div style="margin-left: 20px; margin-top: 50px;" >
            <h6 style="padding-bottom: 10px; " class="page-title m-0">CÔNG VIỆC</h6>
                
            @foreach($permission  as $permission1)
                @if(strpos($permission1->permission_name,'task'))
                    <div class="form-check" style="float:left; padding-right: 100px;">
                        <input type="checkbox" name="permission[]"  {{ $getAllPermissionOfRole->contains($permission1->id_permission) ? 'checked' : ''}} value="{{$permission1->id_permission }}">
                        <label  class="form-check-label" > {{trans('auth.'.$permission1->permission_name)}}</label>
                    </div>
                
                @endif
            @endforeach

        </div> 


         <div style="margin-left: 20px; margin-top: 50px;" >
            <h6 style="padding-bottom:10px; padding-top: 15px;" class="page-title m-0">CHỨC VỤ</h6>
            @foreach($permission  as $permission1)
                @if(strpos($permission1->permission_name,'position'))
                    <div class="form-check" style="float: left; padding-right: 100px;">
                       <input type="checkbox" name="permission[]"  {{ $getAllPermissionOfRole->contains($permission1->id_permission) ? 'checked' : ''}} value="{{$permission1->id_permission }}">
                        <label class="form-check-label" > {{trans('auth.'.$permission1->permission_name)}}</label>
                    </div>
                @endif
            @endforeach    
        </div>    
               
        <div style="margin-left: 20px; margin-top: 50px;" >
            <h6 style="padding-bottom: 10px;" class="page-title m-0">PHÒNG BAN</h6>
            @foreach($permission  as $permission1)
                @if(strpos($permission1->permission_name,'department'))
                    <div class="form-check" style="float: left; padding-right: 100px;">
                        <input type="checkbox" name="permission[]"  {{ $getAllPermissionOfRole->contains($permission1->id_permission) ? 'checked' : ''}} value="{{$permission1->id_permission }}">  
                        <label class="form-check-label" > {{trans('auth.'.$permission1->permission_name)}}</label>
                    </div>
                @endif
            @endforeach    
        </div>    
              
			<button type="submit" name="update_department" class="btn btn-success waves-effect waves-light">Cập nhật phòng ban</button>
		</form>

    </div><!-- container fluid -->

</div> <!-- Page content Wrapper -->
@endsection