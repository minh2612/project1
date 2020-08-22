@extends('admin_layout')
@section('admin_content')
<div class="page-content-wrapper ">

    <div class="container-fluid">


        <!-- end row -->
        <div class="table-responsive">
            <table class="table mb-0"><h5>Công việc đang chạy</h5>
                <thead>
                    <tr>                     
                        <th>Dự án</th>
                        <th>Tên công việc</th>
                        <th>Người phụ trách</th>                        
                        <th>Thành viên</th>
                        <th>Ngày bắt đầu</th>
                        <th>Ngày kết thúc</th>
                        <th>Mức độ ưu tiên</th>

                        <th>Trạng thái</th>
                        
                    </tr>
                </thead>
                <tbody>
                  <tr>
                    @foreach($all_task as $key => $value)
                        <th>{{$value->project_id}}</th>
                        <th>{{$value->task_name}}</th>  
                        <th>{{$value->e_name}}</th> 
                       <th> @foreach($all_employee as $key)
                            @if($key->task_id==$value->task_id)
                               {{$key->e_name}}<br>
                            @endif
                        @endforeach</th>
                         <th>{{$value->task_start}}</th> 
                        <th>{{$value->task_end}}</th> 
                          <th>{{$value->task_priority}}</th> 
                        <td>
                            <span class="text-ellipsis">
                            <?php

                            if($value->task_status==4){
                            ?>
                                <a href="{{URL::to('/submit-user-task/'.$value->task_id)}}"><button type="button" style="width:130px;" class="btn btn-danger waves-effect waves-light">Đang diễn ra</button></a>
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