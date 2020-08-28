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
                            <p>&nbsp;</p>
                            <a href="{{URL::to('/add-position/')}}" class="active styling-edit" ui-toggle-class="">
                            <button style="margin-left: 30px" type="button" class="btn btn-success waves-effect waves-light">Thêm chức vụ</button></a>
                            <h4 style="padding-left: 430px" class="page-title m-0">Danh sách chức vụ</h4> 
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
                                        <th>Tên chức vụ</th>                       
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i=0;
                                    @endphp
                                    @foreach($position as $p)
                                    @php
                                    $i++;
                                    @endphp
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$p->position_name}}</td>
                                        <td>
                                            <a href="{{URL::to('/edit-position/'.$p->position_id)}}" class="active styling-edit" ui-toggle-class="">
                                                <i class="fa fa-edit"></i>
                                            <a onclick="return confirm('Bạn có muốn xóa?')" href="{{URL::to('/delete-position/'.$p->position_id)}}" class="active styling-edit" ui-toggle-class="">
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