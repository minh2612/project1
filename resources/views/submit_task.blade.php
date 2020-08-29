@extends('admin_layout')
@section('admin_content')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
    $('.select2').select2();
    });
</script>
<div class="page-content-wrapper ">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h4 class="page-title m-0">Gửi công việc</h4>
                            <?php
                            $message= Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message', null);
                            }
                            ?>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{$error }}</li>
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
         @foreach($task as $key=> $task)
        <form role="form" action="{{URL::to('/submit-user-task/')}}" method="post" enctype="multipart/form-data">
        	{{csrf_field()}}
            <div class="form-group row">
                <label for="example-name-input" class="col-sm-2 col-form-label">Tên công việc</label>
                <div class="col-sm-4">
                    <label for="example-name-input" class="form-control"  type="text" name="task_name">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-date-input" class="col-sm-2 col-form-label">File đính kèm</label>
                <div class="col-sm-2">
                    <input multiple="" type="file" name="task_file[]">
                </div>
            </div>
            
            <div class="form-group row">
                <label for="example-name-input" class="col-sm-2 col-form-label">Mô tả</label>
                <div class="col-sm-4">
                    <textarea name="task_note" id="note"></textarea>
                </div>
            </div>
 
            <button type="submit" name="add_task" class="btn btn-success waves-effect waves-light">Hoàn thành công việc</button>
		</form>
        @endforeach
    </div><!-- container fluid -->

</div> <!-- Page content Wrapper -->
@endsection