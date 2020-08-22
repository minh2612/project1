@extends('admin_layout')
@section('admin_content')
@hasrole(['admin','manager','user'])
<div class="page-content-wrapper ">

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h4 class="page-title m-0">Danh sách công việc ưu tiên</h4>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- end page-title-box -->
            </div>
        </div> 

        <!-- end page title -->     

</div> 
</div>
    <div class="table-responsive">
            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="background-color: white; border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên công việc</th>
                        <th>Dự án</th>
                         <th>Độ ưu tiên</th>
                        <th>Ngày bắt đầu</th>
                        <th>Ngày kết thúc</th>
                        <th>Ghi chú</th>
                        <th>Trạng thái</th>
                    </tr>
                </thead>
                <tbody>
                 @php
                 $i=0;
                 @endphp
                @foreach($task_user as $key => $task)
                @php
                    $i++;
                    @endphp
                    <tr>
                        <td>{{ $i}}</td>
                        <td>{{ $task->task_name }}</td>
                        @foreach($all_project as $key=> $project1)
                        @if($project1->project_id==$task->project_id)
                        <td>{{ $project1->project_name }}</td>
                        @endif
                        @endforeach
                        <td>{{ $task->task_priority}}</td>
                        <td>{{ $task->task_start}}</td>
                        <td>{{ $task->task_end}}</td>
                        <td>{{ $task->task_note}}</td>
                         <td>
                            <span class="text-ellipsis">
                            <?php
                            if($task->task_status==0){
                            ?>
                                <a href="{{URL::to('/start-task/'.$task->task_id)}}"><button type="button"  style="width:130px;" class="btn btn-primary waves-effect waves-light">Chưa hoạt động</button></a>
                            <?php
                            }

                            if($task->task_status==1){
                            ?>
                                <a href="{{URL::to('/submit-task/'.$task->task_id)}}"><button type="button" style="width:130px;" class="btn btn-info waves-effect waves-light">Đang làm</button></a>
                            <?php
                            }

                            if($task->task_status==2){
                            ?>
                               <button type="button" style="width:130px;" class="btn btn-danger waves-effect waves-light">Đang đợi duyệt</button>
                            <?php
                            }

                            if($task->task_status==3){
                            ?>
                                <button style="width:130px;" type="button" class="btn btn-success waves-effect waves-light">Hoàn tất</button>
                            <?php
                            }
                            ?>
                            </span>
                        </td>      

                        
                      
                    </tr>
                @endforeach                   
                </tbody>
            </table>

        </div>
@endhasrole
<!-- Page content Wrapper -->
@endsection