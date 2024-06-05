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
      $(document).on('click','.add_laboratoryexamlabattendantlabtechnician',function(e) {
      e.preventDefault();
      let cous=$('#cous').val();
      let staf = [];
      // Retrieve selected staff values
      $('.staf-fields select').each(function() {
        let value = parseInt($(this).val());
        if (value > 0) {
          staf.push(value);
        }
      });
      let numberofday=$('#numberofday').val();
      let exam = $('#exam').val();
      // Ajax request
      $.ajax({
        url: "{{ route('add.laboratoryexamlabattendantlabtechnician') }}",
        method: 'POST',
        data: {staf:staf, cous: cous, exam: exam, numberofday: numberofday,},
        success: function(res) {
          if(res.status == 'success') {
            $('#addModal').modal('hide');
            $('#addlaboratoryexamlabattendantlabtechnicianForm')[0].reset();
            $('.table').load(location.href+' .table');
            toastr["success"]("Laboratory Exam Lab Attendant Labtechnician Add Successfully!", "Success");
          }
        },
        error: function(err) {
          let error = err.responseJSON;
          $.each(error.errors, function(index, value) {
            $('.errMsgContainer').append('<span class="text-danger">'+value+'</span>'+'<br>');
          });
        }
      });
    });
      //Show the update Laboratory Exam Lab Attendant Labtechnician
      $(document).on('click','.update_laboratoryexamlabattendantlabtechnician_form',function(){
        let id= $(this).data('id');
        let cous= $(this).data('cous');
        let designation= $(this).data('designation');
        let department= $(this).data('department');
        let address= $(this).data('address');
        let staf = $(this).data('staf');
        let numberofday = $(this).data('numberofday');
        $('select[name="staf"]').val(staf);
        $('select[name="cous"]').val(cous);
        $('#up_id').val(id);
        $('#up_designation').val(designation);
        $('#up_department').val(department);
        $('#up_address').val(address);
        $('#up_numberofday').val(numberofday);
      });

      // update Laboratory Exam Lab Attendant Labtechnician
      $(document).on('click','.update_update_laboratoryexamlabattendantlabtechnician',function(e)
      {
        e.preventDefault();
        let up_id = $('#up_id').val();
        let up_cous = $('#up_cous').val();
        let up_designation = $('#up_designation').val();
        let up_department = $('#up_department').val();
        let up_address = $('#up_address').val();
        let up_staf=$('#up_staf').val();
        let up_numberofday=$('#up_numberofday').val();
        $.ajax({
          url:"{{route('update.laboratoryexamlabattendantlabtechnician')}}",
          method:'post',
          data:{up_id:up_id,up_cous:up_cous,up_staf:up_staf,up_numberofday:up_numberofday,},
          success:function(res){
            if(res.statu=='success'){
              $('#updateModal').modal('hide');
              
              $('#updatelaboratoryexamlabattendantlabtechnicianForm')[0].reset();
              $('.table').load(location.href+' .table');
              Command: toastr["success"]("Laboratory Exam Lab Attendant Labtechnician Update Successfully!","success")

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
      
      //delete Laboratory Exam Lab Attendant Labtechnician
      $(document).on('click','.delete_laboratoryexamlabattendantlabtechnician',function(e)
      {
        e.preventDefault();
        let laboratoryexamlabattendantlabtechnician_id = $(this).data('id');
        
        if(confirm('Are you sure to delete Laboratory Exam Lab Attendant Labtechnician!')){
          $.ajax({
          url:"{{route('delete.laboratoryexamlabattendantlabtechnician')}}",
          method:'post',
          data:{laboratoryexamlabattendantlabtechnician_id:laboratoryexamlabattendantlabtechnician_id},
          success:function(res){
            if(res.statu=='success'){

              $('.table').load(location.href+' .table');
              Command: toastr["success"]("Laboratory Exam Lab Attendant Labtechnician Deleted Successfully!","success")

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