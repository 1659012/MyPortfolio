<?php
include 'includes/head.php';
?>

<?php
include 'includes/user-info.php';
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="js/myFramework.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
     //Animate frame
    backgroundAnimate(20000);// see more functions in myFramework.js

    $('.user-info').css('text-align', 'left');
    if($('#uid').length){
      $.ajax({
          url: 'includes/functions.php',
          type: 'POST',
          dataType: 'json',
          data: {getUserData:true, uid:$('#uid').attr('uid')},
          success: function(res) {
              $('#user-id').text(res['id']);
              $('#user-uid').text(res['uid']);
              $('#user-name').text(res['name']);
              $('#user-email').text(res['email']);
              $('#user-date').text(res['date']);
          }
          });

    }

  });


</script>

</body>
</html>
