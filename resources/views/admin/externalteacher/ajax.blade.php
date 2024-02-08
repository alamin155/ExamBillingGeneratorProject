<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

  <script type="text/javascript">
  	$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
 });
  </script>
  <script type="text/javascript">
  	$(document).ready(function() {
  		$(document).on('click','.add_teacher',function(e)
      {
        e.preventDefault();
        let name = $('#name').val();
        let designation = $('#designation').val();
        let address = $('#address').val();
        let mobile = $('#mobile').val();
        let email = $('#email').val();
        let bankname = $('#bankname').val();
        let bankaccount = $('#bankaccount').val();
        let depart=$('#depart').val();
        let status = $('#status').val();
        //console.log(name+designation+address+mobile+email+bankname+bankaccount+status);
        $.ajax({
          url:"{{route('add.teacher')}}",
          method:'post',
          data:{name:name,designation:designation,address:address,mobile:mobile,email:email,bankname:bankname,bankaccount:bankaccount,depart:depart,status:status},
          success:function(res){
            if(res.statu=='success'){
              $('#addModal').modal('hide');
              $('#addteacherForm')[0].reset();
              $('.table').load(location.href+' .table');
              Command: toastr["success"]("External Teacher Add Successfully!","success")

               toastr.options = {
              "closeButton": false,
              "debug": false,
              "newestOnTop": false,
              "progressBar": false,
               "positionClass": "toast-top-right",
                "preventDuplicates": false,
               "onclick": null,
                "showDuration": "300",
                 "hideDuration": "1000",
               "timeOut": "5000",
               "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
               }
            }

          },error:function(err){
            let error=err.responseJSON;
            $.each(error.errors,function(index,value){
              $('.errMsgContainer').append('<span class="text-danger">'+value+'</span>'+'<br>');
            });

          }

        });        
      })
      //Show the update External Teacher
      $(document).on('click','.update_teacher_form',function(){
        let id= $(this).data('id');
        let name= $(this).data('name');
        let designation= $(this).data('designation');
        let address= $(this).data('address');
        let mobile= $(this).data('mobile');
        let email= $(this).data('email');
        let bankname= $(this).data('bankname');
        let bankaccount= $(this).data('bankaccount');
        let depart = $(this).data('depart');
        let status= $(this).data('status');
        $('select[name="depart"]').val(depart);
        $('#up_id').val(id);
        $('#up_name').val(name);
        $('#up_designation').val(designation);
        $('#up_address').val(address);
        $('#up_mobile').val(mobile);
        $('#up_email').val(email);
        $('#up_bankname').val(bankname);
        $('#up_bankaccount').val(bankaccount);

        $('#up_status').val(status);
      });

      // update External teacher
      $(document).on('click','.update_teacher',function(e)
      {
        e.preventDefault();
        let up_id = $('#up_id').val();
        let up_name = $('#up_name').val();
        let up_designation = $('#up_designation').val();
        let up_address = $('#up_address').val();
        let up_mobile = $('#up_mobile').val();
        let up_email = $('#up_email').val();
        let up_bankname = $('#up_bankname').val();
        let up_bankaccount = $('#up_bankaccount').val();
        let up_depart=$('#up_depart').val();
        let up_status = $('#up_status').val();
        //console.log(name+designation+address+mobile+email+bankname+bankaccount+status);
        $.ajax({
          url:"{{route('update.teacher')}}",
          method:'post',
          data:{up_id:up_id,up_name:up_name,up_designation:up_designation,up_address:up_address,up_mobile:up_mobile,up_email:up_email,up_bankname:up_bankname,up_bankaccount:up_bankaccount,up_depart:up_depart,up_status:up_status},
          success:function(res){
           // $('select[name="depart"]').val(res.data.up_depart);
            if(res.statu=='success'){
              $('#updateModal').modal('hide');
              
              $('#updateteacherForm')[0].reset();
              $('.table').load(location.href+' .table');
              Command: toastr["success"]("External Teacher Update Successfully!","success")

               toastr.options = {
              "closeButton": false,
              "debug": false,
              "newestOnTop": false,
              "progressBar": false,
               "positionClass": "toast-top-right",
                "preventDuplicates": false,
               "onclick": null,
                "showDuration": "300",
                 "hideDuration": "1000",
               "timeOut": "5000",
               "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
               }

            }

          },error:function(err){
            let error=err.responseJSON;
            $.each(error.errors,function(index,value){
              $('.errMsgContainer').append('<span class="text-danger">'+value+'</span>'+'<br>');
            });

          }

        });        
      })
      
      //delete external teacher
      $(document).on('click','.delete_teacher',function(e)
      {
        e.preventDefault();
        let teacher_id = $(this).data('id');
        
        if(confirm('Are you sure to delete teacher')){
          $.ajax({
          url:"{{route('delete.teacher')}}",
          method:'post',
          data:{teacher_id:teacher_id},
          success:function(res){
            if(res.statu=='success'){

              $('.table').load(location.href+' .table');
              Command: toastr["success"]("External Teacher Deleted Successfully!","success")

               toastr.options = {
              "closeButton": false,
              "debug": false,
              "newestOnTop": false,
              "progressBar": false,
               "positionClass": "toast-top-right",
                "preventDuplicates": false,
               "onclick": null,
                "showDuration": "300",
                 "hideDuration": "1000",
               "timeOut": "5000",
               "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
               }


            }

          }

        });      

        }
        
      })
  	});
  </script>