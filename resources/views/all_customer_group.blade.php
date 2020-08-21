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
                            <h4 class="page-title m-0">Danh sách nhóm khách hàng</h4>
                            <p>&nbsp;</p>
                            <a href="{{URL::to('/add-customer-group/')}}" class="active styling-edit" ui-toggle-class="">
                            <i class="fas fa-plus-circle fa-2x"></i></a>    
                            </div>
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
            <table id="datatable" class="table table-bordered " style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên phòng ban</th>                        
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i=0
                    @endphp
                    @foreach($all_customer_group as $key => $customer_group)
                    @php
                    $i++
                    @endphp
                  <tr>
                    <td>{{$i}}  </td>
                    <td>{{$customer_group->customer_group_name}}</td>
                    <td>
                          <a href="{{URL::to('/detail-customer-group/'.$customer_group->customer_group_id)}}" class="active styling-edit" ui-toggle-class="">
                            <i class="fa fa-eye"></i>
                        <a href="{{URL::to('/edit-customer-group/'.$customer_group->customer_group_id)}}" class="active styling-edit" ui-toggle-class="">
                            <i class="fa fa-edit"></i>
                        <a onclick="return confirm('Bạn có muốn xóa?')" href="{{URL::to('/delete-customer-group/'.$customer_group->customer_group_id)}}" class="active styling-edit" ui-toggle-class="">
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