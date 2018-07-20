<?php
include 'includes/head.php';
?>

<?php
// include 'includes/check-login.php';
include 'includes/personal-info.php';
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="js/myFramework.js"></script>
<script src="js/snow-effect.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
     //Animate frame
    backgroundAnimate(20000);// see more functions in myFramework.js

    //About me========================
    $('<canvas id="canvas"></canvas>').insertBefore('.main-content');
    // if($('#checkLogin').length)
    // {
    //   $('.main-content').html('<div class="row">'+
    //                             '<div class="col-md-4 personal-img"></div>'+
    //                             '<div class="col-md-8 personal-info"></div></div>').css('text-align','left');

    // }
    // $('.main-content .col-md-4').html('<img class="personal-img" src="images/user-images/me.jpg" alt="">');

    // $('.main-content .col-md-8').html('<h1 class="name">Le Nguyen Han Hoan</h1>'+
    //                                     '<h1 class="age">Age: 27</h1> '+
    //                                     '<h1 class="uni">University: AUT- ITEC</h1>'+
    //                                     '<h1 class="major">Major: Computer science</h1>'+
    //                                     '<h1 class="id-student">ID: 1659012</h1>');

  });


</script>

</body>
</html>
