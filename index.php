<?php

$qid=$_GET['queid'];
$classid=$_GET['classId'];
//echo $qid;
//echo $classid;

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dynamic add/remove input fields in PHP Jquery AJAX</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="card text-center" style="margin-bottom:50px;">
  <h2>Enter the options</h2>
</div>
  
<div class="container">
  <div class="row">
    <div class="col-md-1"></div>
      <div class="col-md-10">
        <div class="form-group">
          <form name="add_name" id="add_name">
            <table class="table table-bordered table-hover" id="dynamic_field">
              <tr>
                <td><input type="text" name="name[]" placeholder="Enter option" class="form-control name_list" /></td>
                <td><button type="button" name="add" id="add" class="btn btn-primary">Add More</button></td>  
              </tr>
            </table>
            <input type="submit" class="btn btn-success" name="submit" id="submit" value="Submit">
          </form>
        </div>
      </div>
    <div class="col-md-1"></div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<script type="text/javascript">
  $(document).ready(function(){

    var i = 1;

    $("#add").click(function(){
      i++;
      $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="name[]" placeholder="Enter option" class="form-control name_list"/></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
    });

    $(document).on('click', '.btn_remove', function(){  
      var button_id = $(this).attr("id");   
      $('#row'+button_id+'').remove();  
    });

    $("#submit").on('click',function(){
      var formdata = $("#add_name").serialize();
      $.ajax({
        url   :"action.php?queid=<?php echo $qid; ?>&classId=<?php echo $classid; ?>",
        type  :"POST",
        data  :formdata,
        cache :false,
        success:function(result){
          alert(result);
         // var cid="<?php echo $classid?>"
         // window.location.href='class_content_admin.php?classId='+cid;

          // if(result=="success")
          // {
          //   //?php echo $classid?
          //   //var cid="<>";
          //   // alert("Options are successfully inserted");
          //   // window.location="home.php";
          // }
          // else{
          //   alert("Options not inserted. Try again");
          // $("#add_name")[0].reset();
        //}
        },
        error: function(xhr, ajaxOptions, thrownerror){}
      });
    });
  });
</script>