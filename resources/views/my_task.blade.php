@extends('admin_layout')
@section('admin_content')
<div class="page-content-wrapper ">

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="row">
                            <p>&nbsp;</p>
                            <a href="{{URL::to('/add-my-task/')}}" class="active styling-edit" ui-toggle-class="">
                            <button style="margin-left: 30px" type="button" class="btn btn-success waves-effect waves-light">Thêm dự án</button></a>
                            <h4 style="padding-left: 430px" class="page-title m-0">Danh sách công việc của tôi</h4> 
                            <p>&nbsp;</p>
                            <a href="{{URL::to('/add-task/')}}" class="active styling-edit" ui-toggle-class="">
                            <button type="button" class="btn btn-success waves-effect waves-light">Dự án của tôi</button></a> 
                            <p>&nbsp;</p>
                            </div>
                                    
                        </div>
                        <!-- end col
                    </div>
                    <!-- end row -->
                </div>
                <!-- end page-title-box -->
            </div>
        </div> 
        <!-- end page title -->
        <?php
            $message= Session::get('message');
             if($message){
                  echo '<span class="text-alert">'.$message.'</span>';
                  Session::put('message', null);
                }
        ?>
        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">     
                        <div class="table-responsive">
                            <table id="datatable" class="table table-bordered" style="background-color: white; border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Tên công việc</th>
                                        <th>Tên dự án</th>
                                        <th>Người làm</th>
                                        <th>Deadline</th>
                                        <th>Mức độ ưu tiên</th>
                                
                                        <th>Người tham gia</th>
                                        <th>Ngày bắt đầu</th>
                                        <th>Ngày kết thúc</th>
                                       

                                        <th>File đính kèm</th>
                                        <th>Hành động</th>
                                        <th>Trạng thái</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($all_task as $key => $task)
                                    <tr>
                            
                                        <td>{{$task->task_name}}</td>
                                        <td>@foreach($all_project as $key => $value) 
                                            @if($task->project_id==$value->project_id)
                                            {{$value->project_name}}<br>
                                            @endif
                                            @endforeach</td>
                                        <td>@foreach($all_employee as $key => $value) 
                                            @if($task->task_id==$value->task_id)
                                            {{$value->e_name}}<br>
                                            @endif
                                            @endforeach</td>            
                                        <td>{{$task->task_end}}</td>
                                        <td>{{$task->task_priority}}</td>
                                        <td>
                                        <a href="{{URL::to('/detail-task/'.$task->task_id)}}" class="active styling-edit" ui-toggle-class="">
                                            <i class="fa fa-eye"></i>
                                        <a href="{{URL::to('/edit-task/'.$task->task_id)}}" class="active styling-edit" ui-toggle-class="">
                                            <i class="fa fa-edit"></i>
                                        <a onclick="return confirm('Bạn có chắc là muốn xóa công việc này ko?')" href="{{URL::to('/delete-task/'.$task->task_id)}}" class="active styling-edit" ui-toggle-class="">
                                            <i class="fa fa-trash-alt"></i>
                                        </td>
                                        <td>
                                            <span class="text-ellipsis">
                                            <?php
                                            if($task->task_status==0){
                                            ?>
                                                <a href="{{URL::to('/start-task/'.$task->task_id)}}"><button type="button"  style="width:200px;" class="btn btn-primary waves-effect waves-light">Chưa hoạt động</button></a>
                                            <?php
                                            }
                                            if($task->task_status==1){
                                            ?>
                                                <a href="{{URL::to('/submit-task/'.$task->task_id)}}"><button type="button" style="width:200px;" class="btn btn-info waves-effect waves-light">Đang xử lý</button></a>
                                            <?php
                                            }

                                            if($task->task_status==2){
                                            ?>
                                               <a href="{{URL::to('/end-task/'.$task->task_id)}}"><button type="button" style="width:100px;" class="btn btn-success waves-effect waves-light">Chấp nhận</button>
                                               <a href="{{URL::to('/refuse-task/'.$task->task_id)}}"><button type="button" style="width:100px;" class="btn btn-danger waves-effect waves-light">Từ chối</button>
                                            <?php
                                            }
                                            ?>
                                        </td>
                                        <td>@foreach($all_project as $key => $value1) 
                                            @if($task->project_id==$value1->project_id)
                                            {{$value1->project_name}}<br>
                                            @endif
                                            @endforeach</td>
                                            <td>@foreach($all_priority as $key => $value2) 
                                            @if($task->priority_id==$value2->priority_id)
                                            {{$value2->priority_name}}<br>
                                            @endif
                                            @endforeach</td> 

                                          

                                        <td>@foreach($all_employee as $key => $value) 
                                            @if($task->task_id==$value->task_id)
                                           <img src="{{ URL::to('/public/avatar/'.$value->e_avatar)}}" title="{{$value->e_name}}" height="35" width="35"  class="rounded-circle">
                                            @endif
                                            @endforeach</td>    

                                        <td>{{$task->task_start}}</td>        
                                        <td>{{$task->task_end}}</td>
                                        
                                        <td><a href="{{URL::to('/download/'.$task->task_file)}}">{{ $task->task_file}}</a>
                                            <div class="form-group row">
                                                <div class="col-sm-2">
                                                    <input  type="file" name="task_file[]" multiple>
                                                </div>
                                            </div>
                                            <a href="{{URL::to('/upload-task-file-in-project/'.$task->task_id)}}" class="active styling-edit" ui-toggle-class="">
                                            <i class="fas fa-file-upload"></i>
                                        </td>
                                        <td>
                                        <a href="{{URL::to('/edit-task/'.$task->task_id)}}" class="active styling-edit" ui-toggle-class="">
                                            <i class="fa fa-edit"></i>
                                        <a onclick="return confirm('Bạn có chắc là muốn xóa công việc này ko?')" href="{{URL::to('/delete-task/'.$task->task_id)}}" class="active styling-edit" ui-toggle-class="">
                                            <i class="fa fa-trash-alt"></i>
                                        </td>
                                        <td>
                                            <span class="text-ellipsis">
                                            <?php
                                            if($task->task_status==0){
                                            ?>
                                                <a href="{{URL::to('/start-task/'.$task->task_id)}}"><button type="button"  style="width:200px;" class="btn btn-warning waves-effect waves-light">Chưa hoạt động</button></a>
                                            <?php
                                            }

                                            if($task->task_status==1){
                                            ?>
                                                <a href="{{URL::to('/submit-task/'.$task->task_id)}}"><button type="button" style="width:200px;" class="btn btn-info waves-effect waves-light">Đang làm</button></a>
                                            <?php
                                            }

                                            if($task->task_status==2){
                                            ?>
                                              <a href="{{URL::to('/end-task/'.$task->task_id)}}"><button type="button" style="width:100px;" class="btn btn-primary waves-effect waves-light">Chấp nhận</button></a>
                                               <a href="{{URL::to('/refuse-task/'.$task->task_id)}}"><button type="button" style="width:95px;" class="btn btn-danger waves-effect waves-light">Từ chối</button></a>
                                            <?php
                                            }

                                            if($task->task_status==3){
                                            ?>
                                                <button style="width:200px;" type="button" class="btn btn-success waves-effect waves-light">Hoàn tất</button>
                                            <?php
                                            }
                                             if($task->task_status==4){
                                            ?>
                                                <a href="{{URL::to('/start-task/'.$task->task_id)}}"><button type="button" style="width:200px;" class="btn btn-danger waves-effect waves-light">Bị từ chối</button></a>
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
                </div>
            </div>
        </div>
    </div><!-- container fluid -->
</div> <!-- Page content Wrapper -->
@endsection -->