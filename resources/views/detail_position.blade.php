@extends('admin_layout')
@section('admin_content')
<div class="page-content-wrapper ">

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h4 class="page-title m-0">Chi tiết chức vụ</h4>
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
            <table id="datatable" class="table table-hover " style="background-color: white; border-collapse: collapse; border-spacing: 0; width: 100%;">
                
                    	
                 @foreach($detail_position as $key => $position)
                  
                                        
                       <tr>
                            <th>Tên chức vụ</th>  
                            <th>{{ $position->position_name}}</th>
                       </tr>

                        <tr>
                            <th>Mô tả</th>  
                            <th>{{ $position->position_note}}</th>
                       </tr>
                       <tr>
                        <th>Danh sách nhân viên</th>
                       <th> @foreach($detail_employee as $key => $employee)
                            
                          <li>{{ $employee->e_name}}</li><br>
                       @endforeach  </th>
                     </tr>
                @endforeach    
                
                <a href="{{URL::to('/edit-position/'.$position->position_id)}}" class="active styling-edit" ui-toggle-class="">
                            <i class="fa fa-edit"></i>
                </tbody>
            </table>
           
        </div>
    </div><!-- container fluid -->

</div> <!-- Page content Wrapper -->
@endsection