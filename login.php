<?php
include 'includes/head.php';
?>

<?php
if (!$_SESSION['login']) {
    include 'includes/register-form.php';
} else {
    echo '<div class="main-body" style="display:none">' .
        '<div class="main-content">' .
        '<h1 class="login-info">Welcomeback! ' . $_SESSION['user'] . '</h1>' .
        '<h1 class="login-info">. You can go back to <a href="index.php">home</a><h1>' .
        '</div></div>';
}
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="js/myFramework.js"></script>
<!-- check  Form Validation -->
<script src="js/formverify.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    //Animate frame
    backgroundAnimate(20000);// see more functions in myFramework.js

    //Login action
    $('.main-content').css('text-align','left');
    $(document).on('submit','#login-form',function(event){
        event.preventDefault();
        let uid=$('#login-id').val();
        //console.log(uid);
        let pw=$('#login-pw').val();
        //console.log(pw);
        $.ajax({
          url: 'includes/verify-login.php',
          type: 'POST',
          dataType: 'json',
          data: {loginRequest:true, user:uid, password:pw},
          success: function(response) {
            console.log(response['checkLogin']);
            console.log(response['info']);
            if(response['checkLogin']){
              $('.main-content').empty();
              $('.main-content').html('<h1 class="login-info">'+response['info']+'</h1>');
              $('.main-content').append('<h1 class="login-info">. You can go back to <a href="index.php">home</a><h1>');
            }else{
              //$('#login-id').val('');
              $('#login-pw').val('');
              $('#login-info').text(response['info']);

            }
          }
        });
    });

    //Create new user action
    $(document).on('submit','#register-form',function(event){
      event.preventDefault();
      if($('#register-form button[type="submit"]').attr('id')==='checked-well'){
      console.log('sent register form');
      var newname=$('#create-name').val();
      var newemail=$('#create-email').val();
      var newuid=$('#create-uid').val();
      var newpw1=$('#create-pw1').val();
      var newpw2=$('#create-pw2').val();
      console.log(newname+' '+newemail+' '+ newuid+' '+newpw1+' ' +newpw2);
      $.ajax({
        url: 'includes/create-user.php',
        type: 'POST',
        dataType: 'json',
        data: {create_user:true, name:newname,email:newemail, uid:newuid,pw1:newpw1,pw2:newpw2},
        success: function(response) {
          console.log(response['checkCreate']);
          console.log(response['info']);
          if(response['checkCreate']){
            $('.main-content').empty();
            $('.main-content').html('<h1 class="login-info">'+response['info']+'</h1>');
            $('.main-content').append('<h1 class="login-info">. You can go back to <a href="index.php">home</a><h1>');
          }else{
            $('#form-message').html(response['info']);
            $('#form-message').show();
            $('#form-message').fadeOut(3000);
          }
        }
      });
      }else if($('#register-form button[type="submit"]').attr('id')==='checked-error'){
        $('#form-message').html("Opps! Something's wrong above, please check again!");
        $('#form-message').show();
        $('#form-message').fadeOut(3000);
      }
    });


  });


</script>

</body>
</html>
