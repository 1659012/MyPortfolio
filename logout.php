<?php
session_start();
session_unset();
session_destroy();
include 'includes/head.php';
?>

<?php
include 'includes/check-login.php';
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="js/myFramework.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
     //Animate frame
    backgroundAnimate(20000);// see more functions in myFramework.js

  });


</script>

</body>
</html>
