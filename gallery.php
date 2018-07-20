<?php
include 'includes/head.php';
?>

<?php
include 'includes/check-login.php';
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="js/myFramework.js"></script>
<script src="js/myGallery.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
     //Animate frame
    backgroundAnimate(20000);// see more functions in myFramework.js

    //myGallery====================================================


    if($('#checkLogin').length)
    {
      $('.main-content').html('<div id="carousel-container">loading...</div>'+
        '<div id="uploadform-container">loading...</div>'+
        '<div id="gallery-container">gallery loading...</div>').css('text-align','left');
    }

    //Carousel*****************
    if($('#carousel-container').length)
    {
        getSlideData();// see more functions in myGallery.js
    }

    //Upload img****************
    $('#uploadform-container').html('<h2>Upload your images</h2>'+
    '<form id="upLoadImgForm" class="" action="gallery.php" method="post" enctype="multipart/form-data">'+

     '<div class="form-group">'+
       ' <label for="img-file">Upload image here</label>'+
       ' <input class="form-control" type="file" id="img-file" name="img-file" value="">'+
      '</div>'+

      '<div class="form-group">'+
        '<label for="caption">Caption</label>'+
        '<input class="form-control" type="text" name="caption" value="" id="caption">'+
      '</div>'+

      '<button type="submit" class="btn btn-primary" name="submitImg" id="submitImg">Upload</button>'+
    '</form>'+
    '<div id="upload-result"></div>');

     $(document).on('submit','#upLoadImgForm',function(event){
          // i got some error so i need form reload gallery
          // event.preventDefault();
          // console.log('sent file');
          let formData = new FormData($(this)[0]);
          if($('#img-file').val()){
            // console.log(formData);
          $.ajax({
          type: 'POST',
          url: 'slide-oop.php',
          data: formData,
          dataType: 'json',
          cache: false,
          contentType: false,
          processData: false,
          success: function(response){
              if(response['error']!=''){
                $('#upload-result').html(response['messages']);
              }else{
                $('#upload-result').html(response['error']);
              }
              $('#upload-result').children().fadeOut(4000);

            getSlideData();
            }
          });
          }

      });

      // $('#gallery-container')***********************
      $.ajax({
          type: 'POST',
          url: 'slide-oop.php',
          data: {getGallery:true},
          dataType: 'html',
          success: function(response){
              //console.log(response);
              $('#gallery-container').html(response);
          }
      });

  });


</script>

</body>
</html>
