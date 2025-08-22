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
  		$(document).on('click','.add_supervisiongraduate',function(e)
      {
        e.preventDefault();
        let tech=$('#tech').val();
        let numberofstudent=$('#numberofstudent').val();
        let exam = $('#exam').val();
        $.ajax({
          url:"{{route('add.supervisiongraduate')}}",
          method:'post',
          data:{tech:tech,exam:exam,numberofstudent:numberofstudent,},
          success:function(res){
            if(res.statu=='success'){
              $('#addModal').modal('hide');
              $('#addsupervisiongraduateForm')[0].reset();
              $('.table').load(location.href+' .table');
              Command: toastr["success"]("Supervision Thesis/Project/Plant Design (Graduate) Add Successfully!","success")

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
      //Show the update Supervision Thesis/Project/Plant Design (Graduate)
      $(document).on('click','.update_supervisiongraduate_form',function(){
        let id= $(this).data('id');
        let designation= $(this).data('designation');
        let department= $(this).data('department');
        let address= $(this).data('address');
        let tech = $(this).data('tech');
        let numberofstudent = $(this).data('numberofstudent');
        $('select[name="tech"]').val(tech);
        $('#up_id').val(id);
        $('#up_designation').val(designation);
        $('#up_department').val(department);
        $('#up_address').val(address);
        $('#up_numberofstudent').val(numberofstudent);
      });

      // update External teacher
      $(document).on('click','.update_supervisiongraduate',function(e)
      {
        e.preventDefault();
        let up_id = $('#up_id').val();
        let up_designation = $('#up_designation').val();
        let up_department = $('#up_department').val();
        let up_address = $('#up_address').val();
        let up_tech=$('#up_tech').val();
        let up_numberofstudent=$('#up_numberofstudent').val();
        $.ajax({
          url:"{{route('update.supervisiongraduate')}}",
          method:'post',
          data:{up_id:up_id,up_tech:up_tech,up_numberofstudent:up_numberofstudent,},
          success:function(res){
            if(res.statu=='success'){
              $('#updateModal').modal('hide');
              
              $('#updatesupervisiongraduateForm')[0].reset();
              $('.table').load(location.href+' .table');
              Command: toastr["success"]("Supervision Thesis/Project/Plant Design (Graduate) Updated Successfully!","success")

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
      
      //delete Supervision Thesis/Project/Plant Design (Graduate)
      $(document).on('click','.delete_supervisiongraduate',function(e)
      {
        e.preventDefault();
        let supervisiongraduate_id = $(this).data('id');
        
        if(confirm('Are you sure to delete Supervision Thesis/Project/Plant Design (Graduate)')){
          $.ajax({
          url:"{{route('delete.supervisiongraduate')}}",
          method:'post',
          data:{supervisiongraduate_id:supervisiongraduate_id},
          success:function(res){
            if(res.statu=='success'){

              $('.table').load(location.href+' .table');
              Command: toastr["success"]("Supervision Thesis/Project/Plant Design (Graduate) Deleted Successfully!","success")

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