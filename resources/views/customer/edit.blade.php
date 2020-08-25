@extends('admin_layout')
@section('admin_content')
<div class="page-content-wrapper ">

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h4 class="page-title m-0">Cập nhật thông tin khách hàng</h4>
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
        
<script>                     
function showPreview(event){
  if(event.target.files.length > 0){
    var src = URL.createObjectURL(event.target.files[0]);
    var preview = document.getElementById("show_image");
    preview.src = src;
    preview.style.fontSize ="1px";
  }
}
</script>
        <!-- end page title -->
        @foreach($customer as $c)
        <form role="form" action="{{URL::to('/update-customer/'.$c->customer_id)}}" method="post" enctype="multipart/form-data">
        	{{csrf_field()}}   

        	<div class="form-group row">
			    <label for="example-name-input" height="100" width="100" class="col-sm-2 col-form-label">Ảnh</label>
			    <div class="col-sm-4">
			        <img src="{{ URL::to('/public/avatar/'.$c->customer_image)}}" height="100" width="100" class="img-thumbnail">@php echo" ====>"; @endphp 
			        <input name="image" height="100" width="100" type="file"  onchange="showPreview(event);"/>		    
                <img id="show_image";>        
			    </div>
			</div>  
        	
			<div class="form-group row">
			    <label for="example-name-input" class="col-sm-2 col-form-label">Tên khách hàng</label>
			    <div class="col-sm-4">
			        <input class="form-control" value="{{$c->customer_name}}" type="text" name="name">
			    </div>
			</div>

			<div class="form-group row">
			    <label for="example-email-input" class="col-sm-2 col-form-label">Email</label>
			    <div class="col-sm-4">
			        <input class="form-control" value="{{$c->customer_email}}" type="email" name="email">
			    </div>
			</div>
	
			<div class="form-group row">
			    <label for="example-tel-input" class="col-sm-2 col-form-label">Địa chỉ</label>
			    <div class="col-sm-4">
			        <input class="form-control" value="{{$c->customer_address}}" type="text" name="address">
			    </div>
			</div>

			<div class="form-group row">
			    <label for="example-tel-input" class="col-sm-2 col-form-label">Số điện thoại</label>
			    <div class="col-sm-4">
			        <input class="form-control" value="{{$c->customer_phone}}" type="tel" name="phone">
			    </div>
			</div>

			<div class="form-group row">
		        <label class="col-sm-2 col-form-label">Giới tính</label>
		        <div class="col-sm-4">
		            <select class="form-control" name="sex">
                    @foreach($sex as $s)
                        @if($s->sex_id == $c->sex_id)
                        <option selected value="{{$s->sex_id}}">{{$s->sex_name}}</option>
                        @else
                        <option value="{{$s->sex_id}}">{{$s->sex_name}}</option>
                        @endif
                    @endforeach                         
		            </select>
		        </div>
		    </div>

	    	<div class="form-group row">
		        <label class="col-sm-2 col-form-label">Nhóm khách hàng</label>
		        <div class="col-sm-4">
		            <select class="form-control" name="customer_group">
                    @foreach($customer_group as $cg)
                        @if($cg->customer_group_id == $c->customer_group_id)
                        <option selected value="{{$cg->customer_group_id}}">{{$cg->customer_group_name}}</option>
                        @else
                        <option value="{{$cg->customer_group_id}}">{{$cg->customer_group_name}}</option>
                        @endif
                    @endforeach                         
		            </select>
		        </div>
		    </div>
		    <div class="form-group row">
		        <label class="col-sm-2 col-form-label">Dịch vụ sử dụng</label>
		        <div class="col-sm-4">
		            <select class="form-control" name="service">
                    @foreach($service as $s)
                        @if($s->service_id == $c->service_id)
                        <option selected value="{{$s->service_id}}">{{$s->service_name}}</option>
                        @else
                        <option value="{{$s->service_id}}">{{$s->service_name}}</option>
                        @endif
                    @endforeach                         
		            </select>
		        </div>
		    </div>
		    <div class="row">
                <label class="col-sm-2 col-form-label">Ghi chú</label>
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <textarea id="elm1" name="note">{{$c->customer_note}}</textarea>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
            <button type="submit" name="update_customer" class="btn btn-success waves-effect waves-light">Cập nhật</button>
		</form>
		@endforeach
    </div><!-- container fluid -->

</div> <!-- Page content Wrapper -->
@endsection