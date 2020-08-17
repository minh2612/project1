@extends('users_layout')
@section('users_content')
<div class="page-content-wrapper ">

    <div class="container-fluid">


        <!-- end row -->
        <div class="table-responsive">
            <table class="table mb-0"><h5>Công việc hoàn thành</h5>
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

                            if($value->task_status==3){
                            ?>
                                <button type="button" style="width:130px;" class="btn btn-success waves-effect waves-light">Hoàn thành</button></a>
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