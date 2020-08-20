@extends('admin_layout')
@section('admin_content')
<div class="page-content-wrapper ">

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h4 class="page-title m-0">Chi tiết khách hàng</h4>
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
                
                    	
                 @foreach($detail_customer as $key => $customer)
                  
                         <tr>
                            <th>Avatar</th>  
                            <td><img src="{{ URL::to('/public/avatar/'.$customer->customer_avatar)}}" height="100" width="100" class="img-thumbnail">

                       </tr>
                
                       <tr>
                            <th>Tên khách hàng</th>  
                            <th>{{ $customer->customer_name}}</th>
                       </tr>
                        <tr>
                            <th>Email</th>  
                            <th>{{ $customer->customer_email}}</th>
                       </tr>
                        <tr>
                            <th>Năm sinh</th>  
                            <th>{{ $customer->customer_born_year}}</th>
                       </tr>
                        <tr>
                            <th>Địa chỉ</th>  
                            <th>{{ $customer->customer_address}}</th>
                       </tr>
                       <tr>
                            <th>Số điện thoại</th>  
                            <th>{{ $customer->customer_phone}}</th>
                       </tr>
                       <tr>
                            <th>Giới tính</th>  
                            <th>{{ $customer->customer_sex}}</th>
                       </tr>
                       <tr>
                            <th>Người tạo</th>  
                            <th>{{ $customer->e_name}}</th>
                       </tr>
                       <tr>
                            <th>Ngày tạo</th>  
                            <th>{{ $customer->customer_created_day}}</th>
                       </tr>
                       <tr>
                            <th>Nhóm khách hàng</th>  
                            <th>{{ $customer->customer_group_name}}</th>
                       </tr>
                       <tr>
                            <th>Mã code</th>  
                            <th>{{ $customer->customer_code }}</th>
                       </tr>
                        
                    
                @endforeach                   
                </tbody>
            </table>
           
        </div>
    </div><!-- container fluid -->

</div> <!-- Page content Wrapper -->
@endsection