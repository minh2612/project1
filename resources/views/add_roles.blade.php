@extends('admin_layout')
@section('admin_content')
<div class="page-content-wrapper ">

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h4 class="page-title m-0">Thêm chức vụ</h4>
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
        <form role="form" action="{{URL::to('/save-roles')}}" method="post" >
            {{csrf_field()}}        
            <div class="form-group row">
                <label for="example-name-input" class="col-sm-2 col-form-label">Tên vai trò</label>
                <div class="col-sm-4">
                    <input class="form-control" type="text" name="roles_name" id="example-name-input">
                </div>
            </div>
         <div style="border-style: ridge;">
         <DIV style="margin-left: 20px; margin-top: 50px;" >
            <h6 class="page-title m-0">CHỨC VỤ</h6>
            @foreach($permission  as $permission1)
                @if(strpos($permission1->permission_name,'position'))
                    <div class="form-check" style="float: left; padding-right: 200px;">
                        <input  type="checkbox" class="form-check-input" name="permission[]" value="{{ $permission1->id_permission }}">
                        <label class="form-check-label" > {{trans('auth.'.$permission1->permission_name)}}</label>
                    </div>
                @endif
            @endforeach    
            </DIV>    
               
            <DIV style=" margin-left: 20px; margin-top: 50px;" > 
            <h6 class="page-title m-0">PHÒNG BAN</h6>
            @foreach($permission  as $permission1)
                @if(strpos($permission1->permission_name,'department'))
                     <div class="form-check" style="float: left; margin-right: 30px;">
                        <input type="checkbox" class="form-check-input" name="permission[]" value="{{ $permission1->id_permission }}">
                        <label class="form-check-label" > {{trans('auth.'.$permission1->permission_name)}}</label>
                    </div>
                @endif
            @endforeach   
               </DIV> 


           


                       <button style="margin-left: 20px; margin-top: 20px;" type="submit" name="add_position" class="btn btn-success waves-effect waves-light">Thêm vai trò</button>
                       </div>
        </form>
    </div><!-- container fluid -->

</div> <!-- Page content Wrapper -->
@endsection