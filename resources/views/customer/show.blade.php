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
                            <h4 class="page-title m-0">Danh sách khách hàng</h4>
                            <p>&nbsp;</p>
                            <a href="{{URL::to('/add-customer/')}}" class="active styling-edit" ui-toggle-class="">
                            <button type="button" class="btn btn-success waves-effect waves-light">Thêm khách hàng</button></a> 
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
                            <table id="datatable" class="table table-bordered " style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                    	<th>ID</th>
                                        <th>Tên khách hàng</th>
                                        <th>Giới tính</th>
                                        <th>Email</th>
                                        <th>Địa chỉ</th>
                                        <th>Số điện thoại</th>
                                        <th>Nhóm khách hàng</th>
                                        <th>Dịch vụ sử dụng</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i=0;
                                        @endphp
                                @foreach($customer as $c)
                                    @php
                                        $i++;
                                        @endphp
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{ $c->customer_name }}</td>
                                        <td>{{ $c->sex_name }}</td>
                                        <td>{{ $c->customer_email }}</td>
                                        <td>{{ $c->customer_address }}</td>
                                        <td>{{ $c->customer_phone }}</td>
                                        <td>{{ $c->customer_group_name }}</td>
                                        <td>{{ $c->service_name }}</td>
                                        <td>
                                            <a href="{{URL::to('/edit-customer/'.$c->customer_id)}}" class="active styling-edit" ui-toggle-class="">
                                                <i class="fa fa-edit"></i>
                                            <a onclick="return confirm('Bạn có chắc là muốn xóa khách hàng này ko?')" href="{{URL::to('/delete-customer/'.$c->customer_id)}}" class="active styling-edit" ui-toggle-class="">
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