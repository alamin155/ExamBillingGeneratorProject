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
  		$(document).on('click','.add_committee',function(e)
      {
        e.preventDefault();
        let tech=$('#tech').val();
        let designation = $('#designation').val();
        let department = $('#department').val();
        let address = $('#address').val();
        let remk=$('#remk').val();
        let exam=$('#exam').val();
        //console.log(name+designation+address+mobile+email+bankname+bankaccount+status);
        $.ajax({
          url:"{{route('add.committee')}}",
          method:'post',
          data:{designation:designation,department:department,address:address,tech:tech,remk:remk,exam:exam,},
          success:function(res){
            if(res.statu=='success'){
              $('#addModal').modal('hide');
              $('#addcommitteeForm')[0].reset();
              $('.table').load(location.href+' .table');
              Command: toastr["success"]("Examination Committee Add Successfully!","success")

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
      $(document).on('click','.update_committee_form',function(){
        let id= $(this).data('id');
        let designation= $(this).data('designation');
        let department= $(this).data('department');
        let address= $(this).data('address');
        let tech = $(this).data('tech');
        let remk= $(this).data('remk');
        $('select[name="tech"]').val(tech);
        $('select[name="remk"]').val(remk);
        $('#up_id').val(id);
        $('#up_designation').val(designation);
        $('#up_department').val(department);
        $('#up_address').val(address);
      });

      // update External teacher
      $(document).on('click','.update_committee',function(e)
      {
        e.preventDefault();
        let up_id = $('#up_id').val();
        let up_designation = $('#up_designation').val();
        let up_department = $('#up_department').val();
        let up_address = $('#up_address').val();
        let up_tech=$('#up_tech').val();
        let up_remk = $('#up_remk').val();
        //console.log(name+designation+address+mobile+email+bankname+bankaccount+status);
        $.ajax({
          url:"{{route('update.committee')}}",
          method:'post',
          data:{up_id:up_id,up_designation:up_designation,up_department:up_department,up_address:up_address,up_tech:up_tech,up_remk:up_remk},
          success:function(res){
           // $('select[name="depart"]').val(res.data.up_depart);
            if(res.statu=='success'){
              $('#updateModal').modal('hide');
              
              $('#updatecommitteeForm')[0].reset();
              $('.table').load(location.href+' .table');
              Command: toastr["success"]("Examination Committee Update Successfully!","success")

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
      $(document).on('click','.delete_committee',function(e)
      {
        e.preventDefault();
        let committee_id = $(this).data('id');
        
        if(confirm('Are you sure to delete Examination Committee')){
          $.ajax({
          url:"{{route('delete.committee')}}",
          method:'post',
          data:{committee_id:committee_id},
          success:function(res){
            if(res.statu=='success'){

              $('.table').load(location.href+' .table');
              Command: toastr["success"]("Examination Committee Deleted Successfully!","success")

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