@extends('admin_layout')
@section('admin_content')
<div class="page-content-wrapper container">

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h4 class="page-title m-0">Danh sách dự án</h4>
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
            <table id="datatable" class="table table-bordered dt-responsive nowrap container" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                    <tr>
                        <th>Tên dự án</th>
                        <th>Người giao</th>
                        <th>Người tham gia</th>
                        <th>Ngày bắt đầu</th>
                        <th>Ngày kết thúc</th>
                        <th>Công việc<br> cần xử lý</th>
                        <th>Công việc<br> đã xong</th>
                        <th>Công việc<br> chưa xong</th>
                        <th>Hành động</th>
                        <th>Trạng thái</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($all_project as $key => $project)
                    <tr>
            
                        <td>{{$project->project_name}}</td>
                       
                        <td>{{$project->e_name}}</td>
                        <td>@foreach($all_employee as $key => $value) 
                            @if($project->project_name==$value->project_name)
                            {{$value->e_name}}<br>
                            @endif
                            @endforeach</td>                    
                        <td>{{$project->project_start}}</td>
                        <td>{{$project->project_end}}</td>
                        
                        @php
                            $i = 0;
                        @endphp
                        @foreach($all_task as  $value1) 
                            @if($project->project_id==$value1->project_id)
                                @php
                                    $i +=1;
                                @endphp
                            @endif
                        @endforeach
                        <td>{{$i}}</td>
                        @php
                            $i1 = 0;
                        @endphp
                        @foreach($all_task as  $value1) 
                            @if($project->project_id==$value1->project_id && $value1->task_status==3)
                                @php
                                    $i1 +=1;
                                @endphp
                            @endif
                        @endforeach
                        <td>{{$i1}}</td>

                        @php
                            $i2 = 0;
                        @endphp
                        @foreach($all_task as  $value1) 
                            @if($project->project_id==$value1->project_id && $value1->task_status!=3)
                                @php
                                    $i2 +=1;
                                @endphp
                            @endif
                        @endforeach
                        <td>{{$i2}}</td>
                        
                        

                        <td>
                        <a href="{{URL::to('/info-task/'.$project->project_id)}}" class="active styling-edit" ui-toggle-class="">
                            <i class="fa fa-eye"></i>
                        <a href="{{URL::to('/edit-project/'.$project->project_id)}}" class="active styling-edit" ui-toggle-class="">
                            <i class="fa fa-edit"></i>
                        <a onclick="return confirm('Bạn có chắc là muốn xóa dự án này ko?')" href="{{URL::to('/delete-project/'.$project->project_id)}}" class="active styling-edit" ui-toggle-class="">
                            <i class="fa fa-trash-alt"></i>
                        </td>
                         <td><span class="text-ellipsis">
                        @if($i==$i1 && $i>0)
                            <button type="button" style="width:130px;" class="btn btn-success waves-effect waves-light">Hoàn thành</button>
                        @endif
                        @if($i!=$i1 ||($i==$i1 && $i==0))
                            <button type="button" style="width:130px;" class="btn btn-light waves-effect waves-light">Đang chạy</button>
                         @endif   
                        </span></td>      
                    </tr>
                @endforeach                 
                </tbody>
            </table> 
        </div>
    </div><!-- container fluid -->

</div> <!-- Page content Wrapper -->
@endsection