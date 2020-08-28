@extends('admin_layout')
@section('admin_content')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<div class="page-content-wrapper ">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h4 class="page-title m-0">Thêm khách hàng</h4> 
                            <ul>
                                @foreach($errors->all() as $error)
                                     <li>{{$error}}</li>
                                @endforeach
                            </ul>                      
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- end page-title-box -->
            </div>
        </div> 
        <!-- end page title -->
        <form role="form" action="{{URL::to('/save-customer')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group row">
                <label height="100" width="100" class="col-sm-2 col-form-label">Ảnh đại diện</label>
                <div class="col-sm-2">
                    <input type="file" name="image" height="100" width="100" type="file"  onchange="showPreview(event);">
                    <img id="show_image";>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tên khách hàng</label>
                <div class="col-sm-4">
                    <input class="form-control" type="text" name="name">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-4">
                    <input class="form-control" type="email" name="email">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Địa chỉ</label>
                <div class="col-sm-4">
                    <input class="form-control" type="text" name="address">
                </div>
            </div>
            
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Số điện thoại</label>
                <div class="col-sm-4">
                    <input class="form-control" type="text" name="phone">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Giới tính</label>
                <div class="col-sm-4">
                    <select class="form-control" name="sex">
                    @foreach($sex as $s)
                    <option value="{{$s->sex_id}}">{{$s->sex_name}}</option>
                    @endforeach                              
                    </select>
                </div>
            </div>
 
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nhóm khách hàng</label>
                <div class="col-sm-4">
                    <select class="form-control" name="customer_group">
                    @foreach($customer_group as $cg)
                    <option value="{{$cg->customer_group_id}}">{{$cg->customer_group_name}}</option>
                    @endforeach                              
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Dịch vụ sử dụng</label>
                <div class="col-sm-4">
                    <select class="form-control select2" name="service[]" multiple="multiple">
                    @foreach($service as $sv)
                    <option value="{{$sv ->service_name}}">{{$sv ->service_name}}</option>
                    @endforeach                              
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="example-name-input" class="col-sm-2 col-form-label">Mô tả</label>
                <div class="col-sm-4">
                    <textarea name="note" id="note"></textarea>
                </div>
            </div>
            <button type="submit" name="add" class="btn btn-success waves-effect waves-light">Thêm khách hàng</button>
        </form>
    </div><!-- container fluid -->
</div> <!-- Page content Wrapper -->
    <script type="text/javascript">
        $(document).ready(function() {
        $('.select2').select2();
        });
    </script>
    <script type="text/javascript">CKEDITOR.replace( 'note' );</script>
@endsection

