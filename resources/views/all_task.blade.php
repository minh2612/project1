@extends('admin_layout')
@section('admin_content')
@php
use Carbon\Carbon;
@endphp
<div class="page-content-wrapper ">

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="row">
                            <h4 class="page-title m-0">Danh sách công việc</h4>
                            <p>&nbsp;</p>
                            <a href="{{URL::to('/add-task/')}}" class="active styling-edit" ui-toggle-class="">
                            <button type="button" class="btn btn-success waves-effect waves-light">Thêm công việc</button></a> 
                            <p>&nbsp;</p>
                            </div>
                                    
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
            <table id="datatable" class="table table-bordered" style="background-color: white; border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                    <tr>
                        <th>Tên công việc</th>
                        <th>Tên dự án</th>
                        <th>Người làm</th>
                        <th>Deadline</th>
                        <th>Mức độ ưu tiên</th>
                        <th>Ghi chú</th>
                        <th>File đính kèm</th>
                        <th>Hành động</th>
                        <th>Trạng thái</th>
                        
                    </tr>
                </thead>
                <tbody>
                @foreach($all_task as $key => $task)
                    <tr>
                        
                        <td>{{$task->task_name}}</td>
                        <td>@foreach($all_project as $key => $value1) 
                            @if($task->project_id==$value1->project_id)
                            {{$value1->project_name}}<br>
                            @endif
                            @endforeach</td>
                        <td>@foreach($all_employee as $key => $value) 
                            @if($task->task_id==$value->task_id)
                            {{$value->e_name}}<br>
                            @endif
                            @endforeach</td>   
                        @if($task->task_end<Carbon::now('Asia/Ho_Chi_Minh'))       
                        <td style="background-color: red;">{{$task->task_end}}</td>
                        
                        @else
                        <td>{{$task->task_end}}</td>
                        
                        @endif
                        <td>@foreach($all_priority as $key => $value2) 
                            @if($task->priority_id==$value2->priority_id)
                            {{$value2->priority_name}}<br>
                            @endif
                            @endforeach</td>
                        <td>{{$task->task_note}}</td>
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
                                <a href="{{URL::to('/start-task/'.$task->task_id)}}"><button type="button"  style="width:150px;" class="btn btn-primary waves-effect waves-light">Chưa hoạt động</button></a>
                            <?php
                            }

                            if($task->task_status==1){
                            ?>
                                <a href="{{URL::to('/submit-task/'.$task->task_id)}}"><button type="button" style="width:150px;" class="btn btn-info waves-effect waves-light">Đang làm</button></a>
                            <?php
                            }

                            if($task->task_status==2){
                            ?>
                               <button type="button" style="width:150px;" class="btn btn-danger waves-effect waves-light">Đang đợi duyệt</button>
                            <?php
                            }

                            if($task->task_status==3){
                            ?>
                                <button style="width:150px;" type="button" class="btn btn-success waves-effect waves-light">Hoàn tất</button>
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
@endsection