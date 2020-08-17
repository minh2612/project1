@extends('admin_layout')
@section('admin_content')
<div class="page-content-wrapper ">

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h4 class="page-title m-0">Bảng lương</h4>
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
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên nhân viên</th>                        
                        <th>Lương</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div><!-- container fluid -->

</div> <!-- Page content Wrapper -->
@endsection