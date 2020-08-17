@extends('admin_layout')
@section('admin_content')
<div class="page-content-wrapper ">

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h4 class="page-title m-0">Chi tiết nhân viên</h4>
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
            <table id="datatable" class="table table-hover " style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                
                    	
                 @foreach($detail_employee as $key => $employee)
                  
                         <tr>
                            <th>Avatar</th>  
                            <th><img src="248.jpg" height="100" width="100"></th>

                       </tr>
                
                       <tr>
                            <th>Tên nhân viên</th>  
                            <th>{{ $employee->e_name}}</th>
                       </tr>
                        <tr>
                            <th>Email</th>  
                            <th>{{ $employee->e_email}}</th>
                       </tr>
                        <tr>
                            <th>Chứng minh thư</th>  
                            <th>{{ $employee->e_cmnd}}</th>
                       </tr>
                        <tr>
                            <th>Địa chỉ</th>  
                            <th>{{ $employee->e_address}}</th>
                       </tr>
                       <tr>
                            <th>Số điện thoại</th>  
                            <th>{{ $employee->e_phone}}</th>
                       </tr>
                       <tr>
                            <th>Giới tính</th>  
                            <th>{{ $employee->e_sex}}</th>
                       </tr>
                       <tr>
                            <th>Chức vụ</th>  
                            <th>{{ $employee->position_name}}</th>
                       </tr>
                       <tr>
                            <th>Phòng ban</th>  
                            <th>{{ $employee->department_name }}</th>
                       </tr>
                        
                    
                @endforeach                   
                </tbody>
            </table>
           
        </div>
    </div><!-- container fluid -->

</div> <!-- Page content Wrapper -->
@endsection