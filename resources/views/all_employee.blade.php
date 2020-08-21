@extends('admin_layout')
@section('admin_content')
<div class="page-content-wrapper ">

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h4 class="page-title m-0">Danh sách nhân viên</h4>
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
		<div class="table-responsive">
            <table id="datatable" class="table table-bordered " style="background-color: white;border-collapse: collapse; border-spacing: 0; width: 100%;">

                <thead>
                    <tr>
                    
                        <th>Hành động</th>
                        <th>Tên nhân viên</th>
                        <th>Email</th>

                        <th>Admin</th>
                        <th>Quản lý</th>
                        <th>Nhân viên</th>
                   

                    </tr>
                </thead>
                <tbody>
                    
                @foreach($all_employee as $key => $user)
            <form action="{{url('/assign-roles')}}" method="POST">
              @csrf
              <tr>
               
                
                <td>
                     <a href="{{URL::to('/detail-employee/'.$user->e_id)}}" class="active styling-edit" ui-toggle-class="">
                        <i class="fa fa-eye"></i>  
                    <a href="{{URL::to('/edit-employee/'.$user->e_id)}}" class="active styling-edit" ui-toggle-class="">
                        <i class="fa fa-edit"></i>
                     
                    <a onclick="return confirm('Bạn có chắc là muốn xóa nhân viên này ko?')" href="{{URL::to('/delete-employee/'.$user->e_id)}}" class="active styling-edit" ui-toggle-class="">
                        <i class="fa fa-trash-alt"></i>
                </td>
                <td>{{ $user->e_name }}</td>
                <td>{{ $user->e_email }} <input type="hidden" name="e_email" value="{{ $user->e_email }}"   ></td>
             
                
                <td><input type="checkbox" name="admin_role" {{$user->hasRole('admin') ? 'checked' : ''}}></td>
                <td><input type="checkbox" name="manager_role"  {{$user->hasRole('manager') ? 'checked' : ''}}></td>
                <td><input type="checkbox" name="user_role"  {{$user->hasRole('user') ? 'checked' : ''}}></td>

              <td>
                  
                    
                 <input type="submit" value="Cấp quyền" class="btn btn-sm btn-default">
                
              </td> 

              </tr>
            </form>
          @endforeach     

                </tbody>
            </table>

        </div>
    </div><!-- container fluid -->

</div> <!-- Page content Wrapper -->
@endsection