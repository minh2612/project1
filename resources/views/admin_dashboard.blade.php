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
            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                    <tr>
                        <th>Tên công việc</th>
                        <th>Người giao</th>
                        <th>Người nhận</th>
                        <th>Ngày bắt đầu</th>
                        <th>Ngày kết thúc</th>
                        <th>Ghi chú</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($info_task as $key => $info)
                    <tr>
                        <td>{{ $info->task_name }}</td>
                        <td>{{ $info->task_admin }}</td>
                        <td> @foreach($all_user as $key => $value) 
                           @if($info->task_name==$value->task_name)
                            {{$value->e_name}}<br>
                           @endif
                         @endforeach</td>
                        <td>{{ $info->task_start }}</td>
                        <td>{{ $info->task_end}}</td>
                        <td>{{ $info->task_note }}</td>
                        <td>
                            <span class="text-ellipsis">
                            <?php
                            if($info->task_status==2){
                            ?>
                              <a href="{{URL::to('/end-task/'.$info->task_id)}}"><button type="button"  style="width:100px;" class="btn btn-primary waves-effect waves-light">Chấp nhận</button></a><br>
                                 <a href="{{URL::to('/refuse-task/'.$info->task_id)}}"><button type="button"  style="width:100px;" class="btn btn-danger waves-effect waves-light">Từ chối</button></a>
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