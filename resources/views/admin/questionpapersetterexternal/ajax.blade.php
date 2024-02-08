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
  		$(document).on('click','.add_questionpapersetterexternal',function(e)
      {
        e.preventDefault();
        let cous=$('#cous').val();
        let tech=$('#tech').val();
        let designation = $('#designation').val();
        let department = $('#department').val();
        let address = $('#address').val();
        let exam = $('#exam').val();
        //console.log(name+designation+address+mobile+email+bankname+bankaccount+status);
        $.ajax({
          url:"{{route('add.questionpapersetterexternal')}}",
          method:'post',
          data:{designation:designation,department:department,address:address,tech:tech,cous:cous,exam:exam,},
          success:function(res){
            if(res.statu=='success'){
              $('#addModal').modal('hide');
              $('#addquestionpapersetterexternalForm')[0].reset();
              $('.table').load(location.href+' .table');
              Command: toastr["success"]("Question Paper Setter External Add Successfully!","success")

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
      $(document).on('click','.update_questionpapersetterexternal_form',function(){
        let id= $(this).data('id');
        let cous= $(this).data('cous');
        let designation= $(this).data('designation');
        let department= $(this).data('department');
        let address= $(this).data('address');
        let tech = $(this).data('tech');
        $('select[name="tech"]').val(tech);
        $('select[name="cous"]').val(cous);
        $('#up_id').val(id);
        $('#up_designation').val(designation);
        $('#up_department').val(department);
        $('#up_address').val(address);
      });

      // update External teacher
      $(document).on('click','.update_questionpapersetterexternal',function(e)
      {
        e.preventDefault();
        let up_id = $('#up_id').val();
        let up_cous = $('#up_cous').val();
        let up_designation = $('#up_designation').val();
        let up_department = $('#up_department').val();
        let up_address = $('#up_address').val();
        let up_tech=$('#up_tech').val();
        //console.log(name+designation+address+mobile+email+bankname+bankaccount+status);
        $.ajax({
          url:"{{route('update.questionpapersetterexternal')}}",
          method:'post',
          data:{up_id:up_id,up_cous:up_cous,up_designation:up_designation,up_department:up_department,up_address:up_address,up_tech:up_tech},
          success:function(res){
           // $('select[name="depart"]').val(res.data.up_depart);
            if(res.statu=='success'){
              $('#updateModal').modal('hide');
              
              $('#updatequestionpapersetterexternalForm')[0].reset();
              $('.table').load(location.href+' .table');
              Command: toastr["success"]("Question Paper Setter External Update Successfully!","success")

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
      $(document).on('click','.delete_questionpapersetterexternal',function(e)
      {
        e.preventDefault();
        let Questionpapersetterexternal_id = $(this).data('id');
        
        if(confirm('Are you sure to delete Question Paper Setter External')){
          $.ajax({
          url:"{{route('delete.questionpapersetterexternal')}}",
          method:'post',
          data:{Questionpapersetterexternal_id:Questionpapersetterexternal_id},
          success:function(res){
            if(res.statu=='success'){

              $('.table').load(location.href+' .table');
              Command: toastr["success"]("Question Paper Setter External Deleted Successfully!","success")

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