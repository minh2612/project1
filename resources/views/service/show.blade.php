@extends('admin_layout')
@section('admin_content')
<div class="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <div class="row">
                            <h4 class="page-title m-0">Danh sách dịch vụ</h4>
                            <p>&nbsp;</p>
                            <a href="{{URL::to('/add-service/')}}" class="active styling-edit" ui-toggle-class="">
                            <button type="button" class="btn btn-success waves-effect waves-light">Thêm dịch vụ</button></a> 
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
                                        <th>Tên dịch vụ</th>                       
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i=0;
                                    @endphp
                                    @foreach($service as $sv)
                                    @php
                                    $i++;
                                    @endphp
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$sv->service_name}}</td>
                                        <td>
                                            <a href="{{URL::to('/edit-service/'.$sv->service_id)}}" class="active styling-edit" ui-toggle-class="">
                                                <i class="fa fa-edit"></i>
                                            <a onclick="return confirm('Bạn có muốn xóa?')" href="{{URL::to('/delete-service/'.$sv->service_id)}}" class="active styling-edit" ui-toggle-class="">
                                                <i class="fa fa-trash-alt"></i>          
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