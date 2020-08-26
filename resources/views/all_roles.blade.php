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
                                        <th>STT</th>
                                        <th>Tên vai trò</th>  
                                        <th>Mô tả</th>
                                        <th>Quyền</th>   
                                        <th>Nhân viên</th>               
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i=0;
                                    @endphp
                                    @foreach($all_roles as $key => $roles)
                                    @php
                                    $i++;
                                    @endphp
                                  <tr>
                                    <td>{{$i}}</td>

                                    <td style="width: 100px">{{ $roles->name}}</td>
                                  <td>{{$i}}</td>
                                   <td style="width: 300px"> @foreach($all_permission as $permission)
                                        @if($permission->roles_id_roles==$roles->id_roles)
                                    
                                          <p class="badge badge-success" style="font-size:85%;"> {{trans('auth.'.$permission->permission_name)}}</p>
                                        @endif
                                    @endforeach</td>
                                    <td style="width: 300px"> @foreach($all_employee as $employee)
                                        @if($employee->id_roles==$roles->id_roles)
                                    
                                          <p class="badge badge-success" style="font-size:85%;"> {{$employee->e_name}}</p>
                                        @endif
                                    @endforeach</td>
                                    <td>
                                          
                                        <a href="{{URL::to('/edit-roles/'.$roles->id_roles)}}" class="active styling-edit" ui-toggle-class="">
                                            <i class="fa fa-edit"></i>
                                        <a onclick="return confirm('Bạn có muốn xóa?')" href="{{URL::to('/delete-roles/'.$roles->id_roles)}}" class="active styling-edit" ui-toggle-class="">
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