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
                
                    	
                 @foreach($detail_position as $key => $position)
                  
                                        
                       <tr>
                            <th>Tên phòng ban</th>  
                            <th>{{ $position->position_name}}</th>
                       </tr>
                      
                        <tr>
                            <th>Mô tả</th>  
                            <th>{{ $position->position_note}}</th>
                       </tr>
                       
                        
                    
                @endforeach                   
                </tbody>
            </table>
           
        </div>
    </div><!-- container fluid -->

</div> <!-- Page content Wrapper -->
@endsection