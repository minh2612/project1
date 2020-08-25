@extends('admin_layout')
@section('admin_content')
<div class="page-content-wrapper ">

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h4 class="page-title m-0">Chi tiết công việc</h4>
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
                
                      
                 @foreach($detail_task as $key => $task)
                               
                       <tr>
                            <th>Tên công việc</th>  
                            <th>{{ $task->task_name}}</th>
                       </tr>
                       <tr>
                            <th>Tên dự án</th> 
                            <th> 
                               {{$task->project_name}}
                            </th>
                       </tr>
                        <tr>
                            <th>Người làm</th> 
                            <th> @foreach($employee as $employee1)
                               {{$employee1->e_name}}<br>
                            @endforeach</th>
                       </tr>
                       <tr>
                            <th>Ngày bắt đầu</th>  
                            <th>{{ $task->task_start}}</th>
                       </tr>
                       <tr>
                            <th>Ngày kết thúc</th>  
                            <th>{{ $task->task_end}}</th>
                       </tr>
                        <tr>
                            <th>Mức độ ưu tiên</th>  
                            <th>{{ $task->priority_id}}</th>
                       </tr>
                        <tr>
                            <th>Ghi chú</th>  
                            <th>{{ $task->task_note}}</th>
                       </tr>
                       <tr>
                            <th>File đính kèm</th>  
                            <th><a href="{{URL::to('/download/'.$task->task_file)}}">{{ $task->task_file}}</a>
                            </th>
                       </tr>
     
                @endforeach                   
            </table>
           
        </div>
    </div><!-- container fluid -->

</div> <!-- Page content Wrapper -->
@endsection