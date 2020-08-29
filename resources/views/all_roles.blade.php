@extends('admin_layout')
@section('admin_content')
<div class="page-content-wrapper ">

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <div class="row">
                            <a href="{{URL::to('/add-roles/')}}" class="active styling-edit" ui-toggle-class="">
                            <button style="margin-left: 30px"  type="button" class="btn btn-success waves-effect waves-light">Thêm vai trò</button></a> <h4  style="padding-left: 430px" class="page-title m-0">Danh sách vai trò</h4>
                            <p>&nbsp;</p>
                            
                            <p>&nbsp;</p>
                            <?php
                                $message= Session::get('message');
                                 if($message){
                                      echo '<span class="text-alert">'.$message.'</span>';
                                      Session::put('message', null);
                                    }
                            ?>
                            </div> 

                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- end page-title-box -->
            </div>
        </div> 

        <!-- end page title -->
        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">    	
                		<div class="table-responsive">
                            <table id="datatable" class="table table-bordered " style="background-color: white;border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                      <!--   <th>STT</th> -->
                                        <th>Tên nhân viên</th>  
                                   
                                        <th>Quyền</th>   
                                                     
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                              
                                     @foreach($all_employee as $key => $employee)
                                  <tr>
                               

                                    <td width="300">

                                           <img src="{{ URL::to('/public/avatar/'.$employee->e_avatar)}}" title="{{$employee->e_name}}" height="70" width="70"  class="rounded-circle">
                                           {{$employee->e_name}}
                                        </td>   
                                    <td style="width: 400px"> 
                                    @foreach($all_roles as $permission1)
                                        @if($permission1->admin_e_id==$employee->e_id)
                                          <p class="badge badge-success" style="font-size:85%;"> {{trans('auth.'.$permission1->name)}}</p>
                                        @endif
                                    @endforeach</td>
                                   
                                    <td width="200">
                                          
                                        <a href="{{URL::to('/edit-roles/'.$employee->e_id)}}" class="active styling-edit" ui-toggle-class="">
                                            <i class="fa fa-edit"></i>
                                        <a onclick="return confirm('Bạn có muốn xóa?')" href="{{URL::to('/delete-roles/'.$employee->e_id)}}" class="active styling-edit" ui-toggle-class="">
                                            <i class="fa fa-trash-alt"></i>          
                                     </td>
                                  </tr>
                                  @endforeach   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- container fluid -->

</div> <!-- Page content Wrapper -->
@endsection