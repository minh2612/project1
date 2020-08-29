@extends('admin_layout')
@section('admin_content')
<div class="page-content-wrapper ">

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h4 class="page-title m-0">Cập nhật quyền</h4>
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
  
                 
            <form role="form" method="post" action="{{URL::to('/update-roles/'.$e->e_id)}}" enctype="multipart/form-data">
            {{csrf_field()}}     
           

                           
           
               
            

          <div style="margin-left: 20px;   width: 400px;" class="container float-left">
            <h6 style="padding-bottom:10px; " class="page-title m-0"><input id="checkall1" class='' type="checkbox"> <span class="badge badge-success">VAI TRÒ</span> </h6>
            @foreach($permission  as $permission1)
                @if(strpos($permission1->name,'role'))
                    <div class="form-check" >
                        <input type="checkbox" class="1" name="permission[]"  {{ $hasrole->contains($permission1->id_roles) ? 'checked' : ''}} value="{{$permission1->id_roles }}">
                        <label class="form-check-label" > {{trans('auth.'.$permission1->name)}}</label>
                    </div>
                @endif
                @endforeach
        </div> 

        
         <div style="margin-left: 20px;   width: 400px;" class="container float-left" >
            <h6 style="padding-bottom:10px; " class="page-title m-0"><input id="checkall2" class='' type="checkbox"> <span class="badge badge-success">NHÂN VIÊN</span> </h6>
            
            @foreach($permission  as $permission1)
                @if(strpos($permission1->name,'employee'))
                <div class="form-check" >
                        <input type="checkbox" class="2" name="permission[]"  {{ $hasrole->contains($permission1->id_roles) ? 'checked' : ''}} value="{{$permission1->id_roles }}">
                        <label class="form-check-label" > {{trans('auth.'.$permission1->name)}}</label>
                    </div>
                @endif
            @endforeach    
        </div>  

         <div style="margin-left: 20px;   width: 400px;" class="container float-left">
            <h6 style="padding-bottom:10px; " class="page-title m-0"><input id="checkall3" class='' type="checkbox"> <span class="badge badge-success">DỰ ÁN</span> </h6>
            @foreach($permission  as $permission1)
                @if(strpos($permission1->name,'project'))
                    <div class="form-check" >
                        <input type="checkbox" class="3" name="permission[]"  {{ $hasrole->contains($permission1->id_roles) ? 'checked' : ''}} value="{{$permission1->id_roles }}">
                        <label class="form-check-label" > {{trans('auth.'.$permission1->name)}}</label>
                    </div>
                @endif
                @endforeach
        </div> 

         <div style="margin-left: 20px; margin-top: 30px;  width: 400px;" class="container float-left">
            <h6 style="padding-bottom:10px; " class="page-title m-0"><input id="checkall4" class='' type="checkbox"> <span class="badge badge-success">CÔNG VIỆC</span> </h6>
            @foreach($permission  as $permission1)
                @if(strpos($permission1->name,'task'))
                    <div class="form-check" >
                        <input type="checkbox" class="4" name="permission[]"  {{ $hasrole->contains($permission1->id_roles) ? 'checked' : ''}} value="{{$permission1->id_roles }}">
                        <label class="form-check-label" > {{trans('auth.'.$permission1->name)}}</label>
                    </div>
                @endif
                @endforeach
        </div> 
   

         

         


         <div style="margin-left: 20px; margin-top: 30px;  width: 400px;" class="container float-left"  >
            <h6 style="padding-bottom:10px; " class="page-title m-0"><input id="checkall5" class='' type="checkbox"> <span class="badge badge-success">CHỨC VỤ</span> </h6>
            @foreach($permission  as $permission1)
                @if(strpos($permission1->name,'position'))
                    <span ><div class="form-check" >
                        <input type="checkbox" class="5" name="permission[]"  {{ $hasrole->contains($permission1->id_roles) ? 'checked' : ''}} value="{{$permission1->id_roles }}">
                        <label class="form-check-label" > {{trans('auth.'.$permission1->name)}}</label>
                    </div></span>
                @endif
            @endforeach    
        </div>    
               
        <div  style="margin-left: 20px; margin-top: 30px;  width: 400px;" class="container float-left">
            <h6 style="padding-bottom:10px; " class="page-title m-0"><input id="checkall6" class='' type="checkbox"><span class="badge badge-success"> PHÒNG BAN</span></h6>
            @foreach($permission  as $permission1)
                @if(strpos($permission1->name,'department'))
                    <span><div class="form-check" >
                        <input type="checkbox" class="6" name="permission[]"  {{ $hasrole->contains($permission1->id_roles) ? 'checked' : ''}} value="{{$permission1->id_roles }}">
                        <label class="form-check-label" > {{trans('auth.'.$permission1->name)}}</label>
                    </div></span>
                @endif
            @endforeach  
            </div>
          
              
              <ul>
               @foreach ($errors->all() as $error)
                    <li>{{$error }}</li>
               @endforeach
            </ul>
                      
                 <button  style="margin-right: 800px; margin-top: 80px;" type="submit" name="add_position" class=" float-left btn btn-success waves-effect waves-light">Cập nhật quyền</button>        
        </form>
      
        
        </div> 

        </div>   

        
        <script type="text/javascript">
                 $("#checkall1").click(function (){
             if ($("#checkall1").is(':checked')){
                $(".1").each(function (){
                   $(this).prop("checked", true);
                   });
                }else{
                   $(".1").each(function (){
                        $(this).prop("checked", false);
                   });
                }
         });
                 </script>
                 <script type="text/javascript">
                 $("#checkall2").click(function (){
             if ($("#checkall2").is(':checked')){
                $(".2").each(function (){
                   $(this).prop("checked", true);
                   });
                }else{
                   $(".2").each(function (){
                        $(this).prop("checked", false);
                   });
                }
         });
                 </script>
                 <script type="text/javascript">
                 $("#checkall3").click(function (){
             if ($("#checkall3").is(':checked')){
                $(".3").each(function (){
                   $(this).prop("checked", true);
                   });
                }else{
                   $(".3").each(function (){
                        $(this).prop("checked", false);
                   });
                }
         });
                 </script>
                 <script type="text/javascript">
                 $("#checkall4").click(function (){
             if ($("#checkall4").is(':checked')){
                $(".4").each(function (){
                   $(this).prop("checked", true);
                   });
                }else{
                   $(".4").each(function (){
                        $(this).prop("checked", false);
                   });
                }
         });
                 </script>
                 <script type="text/javascript">
                 $("#checkall5").click(function (){
             if ($("#checkall5").is(':checked')){
                $(".5").each(function (){
                   $(this).prop("checked", true);
                   });
                }else{
                   $(".5").each(function (){
                        $(this).prop("checked", false);
                   });
                }
         });
                 </script>
                 <script type="text/javascript">
                 $("#checkall6").click(function (){
             if ($("#checkall6").is(':checked')){
                $(".6").each(function (){
                   $(this).prop("checked", true);
                   });
                }else{
                   $(".6").each(function (){
                        $(this).prop("checked", false);
                   });
                }
         });
                 </script>
  

 <!-- Page content Wrapper -->
@endsection
