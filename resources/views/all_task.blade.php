@extends('admin_layout')
@section('admin_content')
<div class="page-content-wrapper ">

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h4 class="page-title m-0">Danh sách công việc</h4>
                            <?php
                                $message= Session::get('message');
                                 if($message){
                                      echo '<span class="text-alert">'.$message.'</span>';
                                      Session::put('message', null);
                                    }
                            ?>        
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
            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="background-color: white; border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                    <tr>
                        <th>Tên công việc</th>
                        <th>Tên dự án</th>
                        <th>Người giao</th>
                        <th>Người nhận</th>
                        <th>Deadline</th>
                        <th>Ghi chú</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($all_task as $key => $task)
                    <tr>
            
                        <td>{{$task->task_name}}</td>
                        <td>{{$task->project_id}}</td>
                        <td>#</td>
                        <td>#</td>                
                        <td>{{$task->task_end}}</td>
                        <td>{{$task->task_note}}</td>
                        <td>
                        <a href="{{URL::to('/info-task/'.$task->task_id)}}" class="active styling-edit" ui-toggle-class="">
                            <i class="fa fa-eye"></i>
                        <a href="{{URL::to('/edit-task/'.$task->task_id)}}" class="active styling-edit" ui-toggle-class="">
                            <i class="fa fa-edit"></i>
                        <a onclick="return confirm('Bạn có chắc là muốn xóa công việc này ko?')" href="{{URL::to('/delete-task/'.$task->task_id)}}" class="active styling-edit" ui-toggle-class="">
                            <i class="fa fa-trash-alt"></i>
                        </td>
                         <td><span class="text-ellipsis">
                            <button type="button" style="width:130px;" class="btn btn-success waves-effect waves-light">Hoàn thành</button>
                            <button type="button" style="width:130px;" class="btn btn-light waves-effect waves-light">Đang chạy</button>
                        </span></td>      
                    </tr>
                @endforeach                 
                </tbody>
            </table>

        </div>
    </div><!-- container fluid -->

</div> <!-- Page content Wrapper -->
@endsection