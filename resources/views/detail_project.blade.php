@extends('admin_layout')
@section('admin_content')
<div class="page-content-wrapper ">

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h4 class="page-title m-0">Chi tiết dự án</h4>
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
                
                      
                 @foreach($detail_project as $key => $project)
                               
                       <tr>
                            <th>Tên dự án</th>  
                            <th>{{ $project>project_name}}</th>
                       </tr>
                        <tr>
                            <th>Tên khách hàng</th>  
                            <th>{{ $project->customer_name}}</th>
                       </tr>
                        <tr>
                            <th>Người quản lý dự án</th>  
                            <th>{{ $project->e_name}}</th>
                       </tr>
                        <tr>
                            <th>Ngày bắt đầu</th>  
                            <th>{{ $project->project_start}}</th>
                       </tr>
                        <tr>
                            <th>Ngày kết thúc</th>  
                            <th>{{ $project->project_end}}</th>
                       </tr>
                       <tr>
                            <th>Các công việc cần làm</th>  
                            <th>{{ $project->project_end}}</th>
                       </tr> 
                        
                    
                @endforeach                   
                </tbody>
            </table>
           
        </div>
    </div><!-- container fluid -->

</div> <!-- Page content Wrapper -->
@endsection