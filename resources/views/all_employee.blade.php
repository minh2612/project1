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
            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                    <tr>
                    	<th>ID</th>
                        <th>Tên nhân viên</th>
                        <th>Email</th>
                        <th>Chức vụ</th>
                        <th>Phòng ban</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($all_employee as $key => $employee)
                    <tr>
                        <td>#</td>
                        <td>{{ $employee->e_name }}</td>
                        <td>{{ $employee->e_email }}</td>
                        <td>{{ $employee->position_name}}</td>
                        <td>{{ $employee->department_name }}</td>
                     
                        <td>
                            <a href="{{URL::to('/edit-employee/'.$employee->e_id)}}" class="active styling-edit" ui-toggle-class="">
                                <i class="fa fa-edit"></i>
                              <a href="{{URL::to('/detail-employee/'.$employee->e_id)}}" class="active styling-edit" ui-toggle-class="">
                                <i class="fa fa-edit"></i>  
                            <a onclick="return confirm('Bạn có chắc là muốn xóa nhân viên này ko?')" href="{{URL::to('/delete-employee/'.$employee->e_id)}}" class="active styling-edit" ui-toggle-class="">
                                <i class="fa fa-trash-alt"></i>
                        </td>
                    </tr>
                @endforeach                   
                </tbody>
            </table>
            <div class="text-center">
                {{ $all_employee->appends(['sort' => 'e_id'])->links() }}
            </div> 

        </div>
    </div><!-- container fluid -->

</div> <!-- Page content Wrapper -->
@endsection