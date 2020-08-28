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
                            <p>&nbsp;</p>
                            <a href="{{URL::to('/add-project/')}}" class="active styling-edit" ui-toggle-class="">
                            <button style="margin-left: 30px" type="button" class="btn btn-success waves-effect waves-light">Thêm dự án</button></a> 
                            <h4 style="padding-left: 430px"  class="page-title m-0">Danh sách dự án</h4>
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
        <?php
            $message= Session::get('message');
             if($message){
                  echo '<span class="text-alert">'.$message.'</span>';
                  Session::put('message', null);
                }
        ?> 
        <!-- end page title -->
        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">     
                        <div class="table-responsive">
                            <table id="datatable" class="table table-bordered " style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên dự án</th>
                                        <th>Loại dự án</th>
                                        <th>Tên khách hàng</th>
                                        <th>Người quản lý dự án</th>
                                        <th>Ngày bắt đầu</th>
                                        <th>Ngày kết thúc</th>
                                        <th>File đính kèm</th>
                                        <th>Tổng số<br>công việc</th>
                                        <th>Công việc<br>đã xử lý</th>
                                        <th>Công việc<br>chưa xử lý</th>
                                        <th>Hành động</th>
                                        <th>Trạng thái</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $e=0;
                                    @endphp
                                    @foreach($all_project as $key => $project)
                                    @php
                                    $e++;
                                    @endphp
                                    <tr>
                                        <td>{{$e}}</td>
                                        <td>{{$project->project_name}}</td>
                                        <td>{{$project->service_name}}</td>
                                        <td>{{$project->customer_name}}</td>
                                        <td><img style="border-radius: 50%" src="{{ URL::to('/public/avatar/'.$project->e_avatar)}}" height="50" width="50" class="img-thumbnail" title="{{$project->e_name}}"></td>                      
                                        <td>{{$project->project_start}}</td>
                                        <td>{{$project->project_end}}</td>
                                        <!-- @php
                                            $file=explode(',', $project->project_file);

                                        @endphp -->
                                        <td>
                                            @foreach(explode(',', $project->project_file) as $dowloadfile)
                                            <a href="{{URL::to('/download/'.$dowloadfile)}}">{{ $dowloadfile}}</a>
                                            
                                            @endforeach
                                            <div class="form-group row">
                                                <div class="col-sm-2">
                                                    <input  type="file" name="task_file[]" multiple>
                                                </div>
                                            </div>
                                             <a href="{{URL::to('/upload-project-file/'.$project->project_id)}}" class="active styling-edit" ui-toggle-class="">
                                            <i class="fas fa-file-upload"></i>
                                        </td>
                                        
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
                                        <a href="{{URL::to('/detail-project/'.$project->project_id)}}" class="active styling-edit" ui-toggle-class="">
                                            <i class="fa fa-eye"></i>
                                        <a href="{{URL::to('/edit-project/'.$project->project_id)}}" class="active styling-edit" ui-toggle-class="">
                                            <i class="fa fa-edit"></i>
                                        <a onclick="return confirm('Bạn có chắc là muốn xóa dự án này ko?')" href="{{URL::to('/delete-project/'.$project->project_id)}}" class="active styling-edit" ui-toggle-class="">
                                            <i class="fa fa-trash-alt"></i>
                                        </td>
                                         <td><span class="text-ellipsis">
                                        @if($i==$i1 && $i>0)
                                            <button type="button" style="width:150px;" class="btn btn-success waves-effect waves-light">Hoàn thành</button>
                                        @endif
                                        @if($i!=$i1 ||($i==$i1 && $i==0))
                                            <button type="button" style="width:150px;" class="btn btn-light waves-effect waves-light">Đang chạy</button>
                                         @endif   
                                        </span></td>      
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