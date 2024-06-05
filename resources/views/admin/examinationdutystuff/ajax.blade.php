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
  		$(document).on('click','.add_examinationdutystuff',function(e)
      {
        e.preventDefault();
        let staf=$('#staf').val();
        let numberofexam=$('#numberofexam').val();
        let examdutycarriedout=$('#examdutycarriedout').val();
        let hours=$('#hours').val();
        let exam = $('#exam').val();
        //console.log(name+designation+address+mobile+email+bankname+bankaccount+status);
        $.ajax({
          url:"{{route('add.examinationdutystuff')}}",
          method:'post',
          data:{staf:staf,exam:exam,numberofexam:numberofexam,examdutycarriedout:examdutycarriedout,hours:hours,},
          success:function(res){
            if(res.statu=='success'){
              $('#addModal').modal('hide');
              $('#addexaminationdutystuffForm')[0].reset();
              $('.table').load(location.href+' .table');
              Command: toastr["success"]("Examination Duty Stuff Add Successfully!","success")

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
      $(document).on('click','.update_examinationdutystuff_form',function(){
        let id= $(this).data('id');
        let designation= $(this).data('designation');
        let department= $(this).data('department');
        let address= $(this).data('address');
        let staf = $(this).data('staf');
        let numberofexam = $(this).data('numberofexam');
        let examdutycarriedout= $(this).data('examdutycarriedout');
        let hours= $(this).data('hours');
        $('select[name="staf"]').val(staf);
        $('#up_id').val(id);
        $('#up_designation').val(designation);
        $('#up_department').val(department);
        $('#up_address').val(address);
        $('#up_numberofexam').val(numberofexam);
        $('#up_examdutycarriedout').val(examdutycarriedout);
        $('#up_hours').val(hours);
      });

      // update External teacher
      $(document).on('click','.update_examinationdutystuff',function(e)
      {
        e.preventDefault();
        let up_id = $('#up_id').val();
        let up_cous = $('#up_cous').val();
        let up_designation = $('#up_designation').val();
        let up_department = $('#up_department').val();
        let up_address = $('#up_address').val();
        let up_staf=$('#up_staf').val();
        let up_numberofexam=$('#up_numberofexam').val();
        let up_examdutycarriedout=$('#up_examdutycarriedout').val();
        let up_hours=$('#up_hours').val();
        //console.log(name+designation+address+mobile+email+bankname+bankaccount+status);
        $.ajax({
          url:"{{route('update.examinationdutystuff')}}",
          method:'post',
          data:{up_id:up_id,up_staf:up_staf,up_numberofexam:up_numberofexam,up_examdutycarriedout:up_examdutycarriedout,up_hours:up_hours,},
          success:function(res){
           // $('select[name="depart"]').val(res.data.up_depart);
            if(res.statu=='success'){
              $('#updateModal').modal('hide');
              
              $('#updateexaminationdutystuffForm')[0].reset();
              $('.table').load(location.href+' .table');
              Command: toastr["success"]("Examination Duty Stuff Updated Successfully!","success")

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
      
      //delete Question Paper Setter Internal
      $(document).on('click','.delete_examinationdutystuff',function(e)
      {
        e.preventDefault();
        let examinationdutystuff_id = $(this).data('id');
        
        if(confirm('Are you sure to delete Examination Duty Stuff')){
          $.ajax({
          url:"{{route('delete.examinationdutystuff')}}",
          method:'post',
          data:{examinationdutystuff_id:examinationdutystuff_id},
          success:function(res){
            if(res.statu=='success'){

              $('.table').load(location.href+' .table');
              Command: toastr["success"]("Examination Duty Stuff Deleted Successfully!","success")

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
      //pp
  
  	});
  </script>