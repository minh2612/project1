@extends('admin_layout')
@section('admin_content')
<div class="page-content-wrapper ">

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h4 class="page-title m-0">Danh sách khách hàng</h4>
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
            <table id="datatable" class="table table-bordered " style="background-color: white; border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                    <tr>
                    	<th>ID</th>
                        <th>Tên khách hàng</th>
                        <th>Email</th>
                        <th>Nhóm người dùng</th>
                        <th>Mã code</th>
                        <th>Người tạo</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                     @php
                        $i=0;
                        @endphp
                @foreach($all_customer as $key => $customer)
                     @php
                        $i++;
                        @endphp
                    <tr>
                         <td>{{$i}}</td>
                        <td>{{ $customer->customer_name }}</td>
                        <td>{{ $customer->customer_email }}</td>
                        <td>{{ $customer->customer_group_name }}</td>
                        <td>{{ $customer->customer_code }}</td>
                        <td>{{ $customer->e_name}}</td>
                        <td>
                             <a href="{{URL::to('/detail-customer/'.$customer->customer_id)}}" class="active styling-edit" ui-toggle-class="">
                                <i class="fa fa-eye"></i>  
                            <a href="{{URL::to('/edit-customer/'.$customer->customer_id)}}" class="active styling-edit" ui-toggle-class="">
                                <i class="fa fa-edit"></i>
                             
                            <a onclick="return confirm('Bạn có chắc là muốn xóa khách hàng này ko?')" href="{{URL::to('/delete-customer/'.$customer->customer_id)}}" class="active styling-edit" ui-toggle-class="">
                                <i class="fa fa-trash-alt"></i>
                        </td>
                    </tr>
                @endforeach                   
                </tbody>
            </table>

        </div>
    </div><!-- container fluid -->

</div> <!-- Page content Wrapper -->
@endsection