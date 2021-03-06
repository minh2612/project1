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
                                <h4 class="page-title m-0">Chi tiết dự án</h4>
                                <p>&nbsp;</p>
                                <a href="{{URL::to('/add-task-in-project/')}}" class="active styling-edit" ui-toggle-class="">
                                <button type="button" class="btn btn-success waves-effect waves-light">Thêm công việc</button></i></a>
                            </div>           
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- end page-title-box -->
            </div>
        </div>
        <?php
            $message= Session::get('message');
             if($message){
                  echo '<span class="text-alert">'.$message.'</span>';
                  Session::put('message', null);
                }
        ?> 
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
                        <th>File đính kèm</th>
                        <th>Hành động</th>
                        <th>Trạng thái</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($all_task as $key => $task)
                    <tr>
            
                        <td>{{$task->task_name}}</td>
                        <td>
                            {{$task->project_name}}<br>
                        </td>
                        <td>@foreach($employee as $key => $value) 
                            @if($task->task_id==$value->task_id)
                            <img style="border-radius: 50%" src="{{ URL::to('/public/avatar/'.$value->e_avatar)}}" height="50" width="50" class="img-thumbnail" title="{{$value->e_name}}"><br><br>
                            @endif
                            @endforeach</td>            
                        <td>{{$task->task_end}}</td>
                        <td>{{$task->priority_name}}</td>
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
                        <a href="{{URL::to('/edit-task-in-project/'.$task->task_id)}}" class="active styling-edit" ui-toggle-class="">
                            <i class="fa fa-edit"></i>
                        <a onclick="return confirm('Bạn có chắc là muốn xóa công việc này ko?')" href="{{URL::to('/delete-task-in-project/'.$task->task_id)}}" class="active styling-edit" ui-toggle-class="">
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
    </div><!-- container fluid -->

</div> <!-- Page content Wrapper -->
@endsection