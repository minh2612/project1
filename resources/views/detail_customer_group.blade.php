@extends('admin_layout')
@section('admin_content')
<div class="page-content-wrapper ">

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h4 class="page-title m-0">Chi tiết nhóm khách hàng</h4>
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
                
                    	
                 @foreach($detail_customer_group as $key => $customer_group)
                  
                                        
                       <tr>
                            <th>Tên nhóm khách hàng</th>  
                            <th>{{ $customer_group->customer_group_name}}</th>
                       </tr>

                        <tr>
                            <th>Mô tả</th>  
                            <th>{{ $customer_group->customer_group_note}}</th>
                       </tr>
                       <tr>
                        <th>Danh sách khách hàng</th>
                       <th> @foreach($detail_customer as $key => $customer)
                            
                          <li>{{ $customer->customer_name}}</li><br>
                       @endforeach  </th>
                     </tr>
                @endforeach    
                

                </tbody>
            </table>
           
        </div>
    </div><!-- container fluid -->

</div>
 <!-- Page content Wrapper -->
@endsection