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
  		$(document).on('click','.add_examinationwork',function(e)
      {
        e.preventDefault();
        let details=$('#details').val();
        let name=$('#name').val();
        let amountofmoney=$('#amountofmoney').val();
        let exam = $('#exam').val();
        //console.log(name+designation+address+mobile+email+bankname+bankaccount+status);
        $.ajax({
          url:"{{route('add.examinationwork')}}",
          method:'post',
          data:{exam:exam,details:details,name:name,amountofmoney:amountofmoney,},
          success:function(res){
            if(res.statu=='success'){
              $('#addModal').modal('hide');
              $('#addexaminationworkForm')[0].reset();
              $('.table').load(location.href+' .table');
              Command: toastr["success"]("Examination Duty Teacher Add Successfully!","success")

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
      //Show the update Rate of Remuneration for Examination Work
      $(document).on('click','.update_examinationwork_form',function(){
        let id= $(this).data('id');
        let details= $(this).data('details');
        let name= $(this).data('name');
        let amountofmoney= $(this).data('amountofmoney');
        $('#up_id').val(id);
        $('#up_details').val(details);
        $('#up_name').val(name);
        $('#up_amountofmoney').val(amountofmoney);
      });

      // update Rate of Remuneration for Examination Work
      $(document).on('click','.update_examinationwork',function(e)
      {
        e.preventDefault();
        let up_id = $('#up_id').val();
        let up_details=$('#up_details').val();
        let up_name=$('#up_name').val();
        let up_amountofmoney=$('#up_amountofmoney').val();
        $.ajax({
          url:"{{route('update.examinationwork')}}",
          method:'post',
          data:{up_id:up_id,up_details:up_details,up_name:up_name,up_amountofmoney:up_amountofmoney},
          success:function(res){
           // $('select[name="depart"]').val(res.data.up_depart);
            if(res.statu=='success'){
              $('#updateModal').modal('hide');
              
              $('#updateexaminationworkForm')[0].reset();
              $('.table').load(location.href+' .table');
              Command: toastr["success"]("Rate of Remuneration for Examination Work Updated Successfully!","success")

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
      
      //delete Rate of Remuneration for Examination Work
      $(document).on('click','.delete_examinationwork',function(e)
      {
        e.preventDefault();
        let examinationwork_id = $(this).data('id');
        
        if(confirm('Are you sure to delete Rate of Remuneration for Examination Work')){
          $.ajax({
          url:"{{route('delete.examinationwork')}}",
          method:'post',
          data:{examinationwork_id:examinationwork_id},
          success:function(res){
            if(res.statu=='success'){

              $('.table').load(location.href+' .table');
              Command: toastr["success"]("Rate of Remuneration for Examination Work Deleted Successfully!","success")

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