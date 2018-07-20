function getSlideData() {

  $.ajax({
    url: "slide-oop.php",
    type: "POST",
    data: { getImages: true },
    dataType: 'json',
    success: function (data) {
      let temp = '<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="3000">' +
        '<ol class="carousel-indicators"> </ol>' +

        '<div class="carousel-inner"></div>' +

        '<a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">' +
        '<span class="carousel-control-prev-icon  nav-button" aria-hidden="true"></span>' +
        '<span class="sr-only">Previous</span></a>' +

        '<a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">' +
        '<span class="carousel-control-next-icon  nav-button" aria-hidden="true"></span>' +
        '<span class="sr-only">Next</span></a>' + '</div>';

      $('#carousel-container').html(temp);

      for (var i in data) {
        // let name = data[i]['name'];
        // name=name.slice(7);        
        $('.carousel-indicators').append('<li data-target="#myCarousel" data-slide-to="' + i + '"></li>');
        let item = '<div class="carousel-item">' +
          '<img class="d-block w-100" src="' + data[i]['name'] + '" alt="slide ' + i + '">' +
          '<div class="carousel-caption d-none d-md-block">' +
          // '<h3>' + name + '</h3>' +// minus ' images/'
          '<p>' + data[i]['caption'] + '</p>' +
          '<p>Upload by ' + data[i]['uid'] + '</p>' +
          '</div>' +
          '</div>';
        $('.carousel-inner').append(item);
      }

      $('.carousel-indicators li').eq(0).addClass('active');
      $('.carousel-inner .carousel-item').eq(0).addClass('active');
    }
  });
}