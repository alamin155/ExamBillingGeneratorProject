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
      $(document).on('click','.add_laboratoryexamteacher',function(e) {
      e.preventDefault();
      let cous=$('#cous').val();
      let tech = [];
      // Retrieve selected staff values
      $('.tech-fields select').each(function() {
        let value = parseInt($(this).val());
        if (value > 0) {
          tech.push(value);
        }
      });
      let student = $('#student').val();
      let numberofday=$('#numberofday').val();
      let exam = $('#exam').val();
      // Ajax request
      $.ajax({
        url: "{{ route('add.laboratoryexamteacher') }}",
        method: 'POST',
        data: {tech: tech, cous: cous, exam: exam, numberofday: numberofday,student:student,},
        success: function(res) {
          if(res.status == 'success') {
            $('#addModal').modal('hide');
            $('#addlaboratoryexamteacherForm')[0].reset();
            $('.table').load(location.href+' .table');
            toastr["success"]("Laboratory Exam Lab Attendant and Technician Add Successfully!", "Success");
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
      //Show the update External Teacher
      $(document).on('click','.update_laboratoryexamteacher_form',function(){
        let id= $(this).data('id');
        let cous= $(this).data('cous');
        let designation= $(this).data('designation');
        let department= $(this).data('department');
        let address= $(this).data('address');
        let tech = $(this).data('tech');
        let numberofday = $(this).data('numberofday');
        let student = $(this).data('student');
        $('select[name="tech"]').val(tech);
        $('select[name="cous"]').val(cous);
        $('#up_id').val(id);
        $('#up_designation').val(designation);
        $('#up_department').val(department);
        $('#up_address').val(address);
        $('#up_student').val(student);
        $('#up_numberofday').val(numberofday);
      });

      // update External teacher
      $(document).on('click','.update_laboratoryexamteacher',function(e)
      {
        e.preventDefault();
        let up_id = $('#up_id').val();
        let up_cous = $('#up_cous').val();
        let up_designation = $('#up_designation').val();
        let up_department = $('#up_department').val();
        let up_address = $('#up_address').val();
        let up_tech=$('#up_tech').val();
        let up_numberofday=$('#up_numberofday').val();
        let up_student=$('#up_student').val();
        //console.log(name+designation+address+mobile+email+bankname+bankaccount+status);
        $.ajax({
          url:"{{route('update.laboratoryexamteacher')}}",
          method:'post',
          data:{up_id:up_id,up_cous:up_cous,up_tech:up_tech,up_numberofday:up_numberofday,up_student:up_student},
          success:function(res){
           // $('select[name="depart"]').val(res.data.up_depart);
            if(res.statu=='success'){
              $('#updateModal').modal('hide');
              
              $('#updatelaboratoryexamteacherForm')[0].reset();
              $('.table').load(location.href+' .table');
              Command: toastr["success"]("Laboratory Exam Teacher Update Successfully!","success")

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
      $(document).on('click','.delete_laboratoryexamteacher',function(e)
      {
        e.preventDefault();
        let laboratoryexamteacher_id = $(this).data('id');
        
        if(confirm('Are you sure to delete Laboratory Exam Teacher')){
          $.ajax({
          url:"{{route('delete.laboratoryexamteacher')}}",
          method:'post',
          data:{laboratoryexamteacher_id:laboratoryexamteacher_id},
          success:function(res){
            if(res.statu=='success'){

              $('.table').load(location.href+' .table');
              Command: toastr["success"]("Laboratory Exam Teacher Deleted Successfully!","success")

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