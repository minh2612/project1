@extends('users_layout')
@section('users_content')
<div class="page-content-wrapper ">

    <div class="container-fluid">


        <!-- end row -->
        <div class="table-responsive">
            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;"><h5>Dự án gần đây</h5>
                <thead>
                    <tr>                     
                        <th>Dự án</th>
                        <th>Công việc</th>
                        <th>Người phụ trách</th>                        
                        <th>Thành viên</th>
                        <th>Ngày bắt đầu</th>
                        <th>Ngày kết thúc</th>
                        <th>Trạng thái</th>
                        
                    </tr>
                </thead>
                  <tr>
                    @foreach($all_task as $key => $value)
                        <th>{{$value->project_name}}</th>
                        <th>{{$value->task_name}}</th>  
                        <th>{{$value->task_admin}}</th> 
                       <th> @foreach($all_employee as $key)
                            @if($key->task_id==$value->task_id)
                               {{$key->e_name}}<br>
                            @endif
                        @endforeach</th>
                         <th>{{$value->task_start}}</th> 
                        <th>{{$value->task_end}}</th>   
                        <td>
                            <span class="text-ellipsis">
                            <?php
                            if($value->task_status==0){
                            ?>
                                <a href="{{URL::to('/start-user-task/'.$value->task_id)}}"><button type="button"  style="width:130px;" class="btn btn-primary waves-effect waves-light">Bắt đầu</button></a>
                            <?php
                            }

                            if($value->task_status==1){
                            ?>
                                <a href="{{URL::to('/submit-user-task/'.$value->task_id)}}"><button type="button" style="width:130px;" class="btn btn-info waves-effect waves-light">Đang diễn ra</button></a>
                            <?php
                            }

                            if($value->task_status==2){
                            ?>
                                <button type="button" style="width:130px;" class="btn btn-danger waves-effect waves-light">Đang đợi duyệt</button>
                            <?php
                            }

                            if($value->task_status==3){
                            ?>
                                <button style="width:130px;" type="button" class="btn btn-success waves-effect waves-light">Hoàn tất</button>
                            <?php
                            }
                            if($value->task_status==4){
                            ?>
                                 <a href="{{URL::to('/submit-user-task/'.$value->task_id)}}"><button style="width:130px;" type="button" class="btn btn-warning waves-effect waves-light">Bắt đầu lại</button></a>
                            <?php
                            }
                            ?>
                            </span>
                        </td> 
                    </tr>
                    @endforeach
                <tbody>
                   
                </tbody>
            </table>
        </div>
    </div><!-- container fluid -->

</div> <!-- Page content Wrapper -->
@endsection