<script src="https://code.jquery.com/jquery-3.7.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
<link rel="stylesheet" href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css"/>

<script type="text/javascript">
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  // Toastr config
  toastr.options = {
    "closeButton": true,
    "progressBar": true,
    "timeOut": "3000",
    "extendedTimeOut": "1000",
    "positionClass": "toast-top-right"
  };

  $(document).ready(function() {

    // Add
    $(document).on('click','.add_questiontypingpublishing',function(e){
      e.preventDefault();
      let tech=$('#tech').val();
      let numberofquestion=$('#numberofquestion').val();
      let numberofpage=$('#numberofpage').val();
      let exam = $('#exam').val();

      $.ajax({
        url:"{{route('add.questiontypingpublishing')}}",
        method:'post',
        data:{tech:tech,exam:exam,numberofquestion:numberofquestion,numberofpage:numberofpage},
        success:function(res){
          if(res.status){
            $('#addModal').modal('hide');
            $('#add_questiontypingpublishingForm')[0].reset();
            $('.table').load(location.href+' .table');
            toastr.success(res.message);
          }
        },
        error:function(err){
          $('.errMsgContainer').html('');
          let error=err.responseJSON;
          $.each(error.errors,function(index,value){
            $('.errMsgContainer').append('<span class="text-danger">'+value+'</span><br>');
          });
        }
      });
    });

    // Update Modal show
    $(document).on('click','.update_questiontypingpublishing_form',function(){
      $('#up_id').val($(this).data('id'));
      $('#up_designation').val($(this).data('designation'));
      $('#up_department').val($(this).data('department'));
      $('#up_address').val($(this).data('address'));
      $('#up_numberofquestion').val($(this).data('numberofquestion'));
      $('#up_numberofpage').val($(this).data('numberofpage'));
      $('select[name="up_tech"]').val($(this).data('tech'));
    });

    // Update
    $(document).on('click','.update_questiontypingpublishing',function(e){
      e.preventDefault();
      let up_id = $('#up_id').val();
      let up_tech=$('#up_tech').val();
      let up_numberofquestion =$('#up_numberofquestion').val();
      let up_numberofpage =$('#up_numberofpage').val();

      $.ajax({
        url:"{{route('update.questiontypingpublishing')}}",
        method:'post',
        data:{up_id:up_id,up_tech:up_tech,up_numberofquestion:up_numberofquestion,up_numberofpage:up_numberofpage},
        success:function(res){
          if(res.status){
            $('#updateModal').modal('hide');
            $('#updatequestiontypingpublishingForm')[0].reset();
            $('.table').load(location.href+' .table');
            toastr.success("Question Typing & Publishing Updated Successfully!");
          }
        },
        error:function(err){
          $('.errMsgContainer').html('');
          let error=err.responseJSON;
          $.each(error.errors,function(index,value){
            $('.errMsgContainer').append('<span class="text-danger">'+value+'</span><br>');
          });
        }
      });
    });

    // Delete
    $(document).on('click','.delete_questiontypingpublishing',function(e){
      e.preventDefault();
      let questiontypingpublishing_id = $(this).data('id');

      if(confirm('Are you sure to delete Question Typing & Publishing?')){
        $.ajax({
          url:"{{route('delete.questiontypingpublishing')}}",
          method:'post',
          data:{questiontypingpublishing_id:questiontypingpublishing_id},
          success:function(res){
            if(res.status){
              $('.table').load(location.href+' .table');
              toastr.success("Question Typing & Publishing Deleted Successfully!");
            }
          }
        });
      }
    });

  });
</script>
