@extends('admin_layout')
@section('admin_content')

<div class="page-content-wrapper ">
<div class="row">
      <?php $i1=0; $i2=0; $i3=0; $i4=0; $i5=0;  $i6=0;
                    foreach($task_user as $task){
                    if($task->task_status==1)  $i1++;  
                    if($task->task_status==2)  $i2++;  
                    if($task->task_status==4)  $i3++;  
                    if($task->task_status==0)  $i4++;
                    if($task->task_status==3)  $i5++;
                    if($task->task_manager==Auth::id()) $i6++;  
                        }
                ?>

            <div style="margin-left: 23px; margin-top: 20px;" >
                <div class="card bg-pink mini-stat text-white" style="width:255px;">
                    <div class="p-3 mini-stat-desc" style="height:60px">
                        <div class="clearfix" >
                            <h6 class="text-uppercase mt-0 float-left text-white-50" style="color:black; ">Dự án đang quản lý</h6>
                            <h4 class="mb-3 mt-0 float-right">{{$i6}}</h4>
                        </div>                     
                    </div>
                    <div class="p-3" >
                        <a href="{{URL::to('/my-project')}}" style="color:white" class="font-14 m-0">Xem các dự án đang quản lý</a>
                    </div>
                </div>
            </div>

            <div style="margin-left: 30px; margin-top: 20px;">
                <div class="card bg-primary mini-stat text-white" style="width:260px">
                    <div class="p-3 mini-stat-desc">
                        <div class="clearfix">
                            <h6 class="text-uppercase mt-0 float-left text-white-50" style="color:black">Công việc đang chạy</h6>
                            <h4 class="mb-3 mt-0 float-right">{{$i1}}</h4>
                        </div>                     
                    </div>
                    <div class="p-3">
                        <a href="{{URL::to('/loading-task')}}" style="color:white" class="font-14 m-0">Xem các công việc đang chạy</a>
                    </div>
                </div>
            </div>

             <div style="margin-left: 25px; margin-top: 20px;">
                <div class="card bg-info mini-stat text-white" style="width:260px">
                    <div class="p-3 mini-stat-desc">
                        <div class="clearfix">
                            <h6 class="text-uppercase mt-0 float-left text-white-50">Công việc chờ duyệt</h6>
                            <h4 class="mb-3 mt-0 float-right">{{$i2}}</h4>
                        </div>
                    </div>
                    <div class="p-3">
                        <a  href="{{URL::to('/wait-user-task')}}" style="color:white" class="font-14 m-0">Xem các công việc chờ duyệt</a>
                    </div>
                </div>
            </div>

            <div style="margin-left: 25px; margin-top: 20px;">
                <div class="card bg-pink mini-stat text-white" style="width:260px">
                    <div class="p-3 mini-stat-desc">
                        <div class="clearfix">
                            <h6 class="text-uppercase mt-0 float-left text-white-50">Công việc bị từ chối</h6>
                            <h4 class="mb-3 mt-0 float-right">{{$i3}}</h4>
                        </div>
                    </div>
                    <div class="p-3">
                        <a href="{{URL::to('/refuse-user-task')}}" style="color:white" class="font-14 m-0">Xem các công việc bị từ chối</a>
                    </div>
                </div>
            </div>
            
           

            <div style="margin-left: 25px; margin-top: 20px;">
                <div class="card  mini-stat text-white" style="width:260px; background-color: #ff9800;">
                    <div class="p-3 mini-stat-desc">
                        <div class="clearfix">
                            <h6 class="text-uppercase mt-0 float-left text-white-50">Công việc treo</h6>
                            <h4 class="mb-3 mt-0 float-right">{{$i4}}</h4>
                        </div>
                    </div>
                    <div class="p-3">
                        <a  href="{{URL::to('/stack-user-task')}}" style="color:white" class="font-14 m-0">Xem các công việc treo</a>
                    </div>
                </div>
            </div>

            <div style="margin-left: 25px; margin-top: 20px;">
                 <div class="card bg-success mini-stat text-white" style="width:260px">
                    <div class="p-3 mini-stat-desc">
                        <div class="clearfix">
                            <h6 class="text-uppercase mt-0 float-left text-white-50">Công việc hoàn thành</h6>
                            <h4 class="mb-3 mt-0 float-right">{{$i5}}</h4>
                        </div>
                    </div>
                    <div class="p-3">
                        <a  href="{{URL::to('/end-user-task')}}" style="color:white" class="font-14 m-0">Xem các công việc đã hoàn thành</a>
                    </div>
                </div>
            </div>

          
        </div>  
        

            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h4 class="page-title m-0">Danh sách công việc </h4>
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
        <div class="table-responsive">
            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="background-color: white; border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên công việc</th>
                        <th>Dự án</th>
                        <th>Độ ưu tiên</th>
                        <th>Người quản lý</th>
                        <th>Người tham gia</th>
                        <th>Ngày bắt đầu</th>
                        <th>Ngày kết thúc</th>
                        <th>Mô tả</th>
                        <th>File đính kèm</th>
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

                        @foreach($all_priority as $key=> $priority)
                        @if( $priority-> priority_id==$task-> priority_id)
                        <td>{{ $priority-> priority_name}}</td>
                        @endif
                        @endforeach

                        @foreach($all_employee as $all_employee1)
                        @if( $task->task_manager==$all_employee1->e_id)
                        <td>{{ $all_employee1->e_name}}</td>
                        @endif
                        @if( $task->employee_id==$all_employee1->e_id)
                        <td>{{ $all_employee1->e_name}}</td>
                        @endif
                        @endforeach

                        <td>{{ $task->task_start}}</td>
                        <td>{{ $task->task_end}}</td>
                        <td>{{ $task->task_note}}</td>
                        <td>
                            @foreach(explode(',', $task->task_file) as $dowloadfile)
                            <a href="{{URL::to('/download/'.$dowloadfile)}}">{{ $dowloadfile}}</a>
                            
                            @endforeach
                        </td>
                         <td>
                            <span class="text-ellipsis">
                            <?php
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
</div>
    


<!-- Page content Wrapper -->
@endsection