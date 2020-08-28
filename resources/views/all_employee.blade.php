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
                            <p>&nbsp;</p>
                            <a href="{{URL::to('/add-employee/')}}" class="active styling-edit" ui-toggle-class="">
                            <button style="margin-left: 30px" type="button" class="btn btn-success waves-effect waves-light">Thêm nhân viên</button></a> 
                            <h4 style="padding-left: 430px"  class="page-title m-0">Danh sách nhân viên</h4>
                            <p>&nbsp;</p>
                            </div>   
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- end page-title-box -->
            </div>
        </div>
        <?php
            $message= Session::get('message');
             if($message){
                  echo '<span class="text-alert">'.$message.'</span>';
                  Session::put('message', null);
                }
        ?> 
        <!-- end page title -->
        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">    	
            	<div class="table-responsive">
                      <table id="datatable" class="table table-bordered " style="background-color: white;border-collapse: collapse; border-spacing: 0; width: 100%;">

                          <thead>
                              <tr>
                              
                                 
                                  <th>Tên nhân viên</th>
                                  <th>Email</th>
                                  <th>Hành động</th>
                                  

                             

                              </tr>
                          </thead>
                          <tbody>
                              
                          @foreach($all_employee as $key => $user)
                      <form action="{{url('/assign-roles')}}" method="POST">
                        @csrf
                        <tr>
                          <td>
                            <img style="border-radius: 50%" src="{{ URL::to('/public/avatar/'.$user->e_avatar)}}" height="50" width="50" class="img-thumbnail" title="{{$user->e_name}}"> 
                            {{ $user->e_name }}
                          </td>
                          <td>{{ $user->e_email }} <input type="hidden" name="e_email" value="{{ $user->e_email }}"   ></td>
                       
                           <td>
                               <a href="{{URL::to('/detail-employee/'.$user->e_id)}}" class="active styling-edit" ui-toggle-class="">
                                  <i class="fa fa-eye"></i>  
                              <a href="{{URL::to('/edit-employee/'.$user->e_id)}}" class="active styling-edit" ui-toggle-class="">
                                  <i class="fa fa-edit"></i>
                               
                              <a onclick="return confirm('Bạn có chắc là muốn xóa nhân viên này ko?')" href="{{URL::to('/delete-employee/'.$user->e_id)}}" class="active styling-edit" ui-toggle-class="">
                                  <i class="fa fa-trash-alt"></i>
                          </td>
                         <!--  <td><input type="checkbox" name="admin_role" {{$user->hasRole('admin') ? 'checked' : ''}}></td>
                          <td><input type="checkbox" name="manager_role"  {{$user->hasRole('manager') ? 'checked' : ''}}></td>
                          <td><input type="checkbox" name="user_role"  {{$user->hasRole('user') ? 'checked' : ''}}></td>
                            
                        <td> 
                          
                           <input type="submit" value="Cấp quyền" class="btn btn-sm btn-default">
                        </td>  -->
                             
                        </tr>
                      </form>
                    @endforeach     

                          </tbody>
                      </table>

                  </div>
    </div><!-- container fluid -->

</div> <!-- Page content Wrapper -->
@endsection