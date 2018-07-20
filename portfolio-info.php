<?php
include 'includes/head.php';
?>
<?php
include 'includes/portfolio-info-detail.php';
?>
<?php
if ($_SESSION['login']) {
    include 'includes/comments.php';
} else {
    echo '<div class="main-body" style="display:none">' .
        '<div class="main-content">' .
        '<h1 class="login-info">Please <a href="login.php"> login </a>to view contents</h1>' .
        '</div></div>';
}
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="js/myFramework.js"></script>
<script type="text/javascript">

  $(document).ready(function() {
     //Animate frame
    backgroundAnimate(25000);// see more functions in myFramework.js

    if($('#comments-section').length){
      $('#comments-section').css('text-align','left');
      getAllComments();

      $('#user-comment-container').html('<div class="each-comment-container">'+
                                          '<form action="" id="comment-form" class="form-group">'+
                                          '<label for="user-comment">Leave your comment:</label>'+
                                          '<textarea class="form-control" rows="5" id="user-comment"></textarea>'+
                                          '<button type="submit" name="create_account" class="btn btn-primary">Submit</button> </form> </div>');


    }

    $(document).on('submit','#comment-form',function(event){
      event.preventDefault();
      var com=$('#user-comment').val();
      // console.log(com);
      if(com!=''){
        let user=$('#uid').attr('uid');
        $.ajax({
          url: 'includes/functions.php',
          type: 'POST',
          data: {sendComment:true,comment:com,uid:user},
          success: function(res) {
            if(res=='success'){
            $('#user-comment').val('');
            $('#comment-form').append('<p id="get-message" style="display:inline">Thanks for your comment! Have a nice day!</p>');
            getAllComments();
            $('#get-message').fadeOut(3000);
            }
          }
        });
      }
    });
  });
  //--------------------------------------------
  function getAllComments() {
    $.ajax({
          url: 'includes/functions.php',
          type: 'POST',
          // dataType: 'text',
          data: {getAllComments:true},
          success: function(res) {
            $('#all-comments-container').html(res);
          }
        });
  }
</script>

</body>
</html>
