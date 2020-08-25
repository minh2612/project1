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
                            <h4 class="page-title m-0">Danh sách vai trò</h4>
                            <p>&nbsp;</p>
                            <a href="{{URL::to('/add-roles/')}}" class="active styling-edit" ui-toggle-class="">
                            <i class="fas fa-plus-circle fa-2x"></i></a> 
                            <p>&nbsp;</p>
                            <?php
                                $message= Session::get('message');
                                 if($message){
                                      echo '<span class="text-alert">'.$message.'</span>';
                                      Session::put('message', null);
                                    }
                            ?>
                            </div>                            
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
            <table id="datatable" class="table table-bordered " style="background-color: white;border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên vai trò</th>                        
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i=0;
                    @endphp
                    @foreach($all_roles as $key => $roles)
                    @php
                    $i++;
                    @endphp
                  <tr>
                    <td>{{$i}}</td>
                    <td>{{ $roles->name}}</td>
                    <td>
                          
                        <a href="{{URL::to('/edit-roles/'.$roles->id_roles)}}" class="active styling-edit" ui-toggle-class="">
                            <i class="fa fa-edit"></i>
                        <a onclick="return confirm('Bạn có muốn xóa?')" href="{{URL::to('/delete-roles/'.$roles->id_roles)}}" class="active styling-edit" ui-toggle-class="">
                            <i class="fa fa-trash-alt"></i>          
                     </td>
                  </tr>
                  @endforeach   
                </tbody>
            </table>
        </div>
    </div><!-- container fluid -->

</div> <!-- Page content Wrapper -->
@endsection