function changeBackground(time) {
  var imageFile = ["img.jpg", "img1.jpg", "img2.jpg", "img3.jpg", "img4.jpg", "img5.jpg"];
  var currentIndex = 0;
  setInterval(function () {
    if (currentIndex == imageFile.length) { currentIndex = 0; }
    $('body').css({
      'object-fit': 'cover',
      'background-size': 'cover',
      'background-repeat': 'no-repeat',
      'background-position': '20%',
      'background': 'url("./background/home-background/' + imageFile[currentIndex++] + '")',
      'transition': 'background-image 4s opacity',
    });
  }, time);
}
//================================
function activeNavbarLink() {
  $('.nav-link').css('border-left', 'none');
  var title = document.location.href.match(/[^\/]+$/)[0];
  title = title.replace('.php', '');
  //console.log(title);
  var titlelist = ['index', 'about', 'portfolio-info', 'gallery', 'login', 'logout']; //follow order to correct mark link-item 
  $.each(titlelist, function (index, value) {
    if (title === value) {
      $('.nav-link').eq(index).css('border-left', '5px solid aqua');
    }
  });

}
//================================
function backgroundAnimate(time) {
  $('body').css({ 'background': 'url("./background/home-background/img2.jpg")' });
  $('.navbar').animate({ opacity: '0.2' }, "fast");
  $('.navbar').animate({ opacity: '0.95' }, "slow");
  activeNavbarLink();
  activeLogoutModal();
  $('.main-content').css('text-align', 'center');
  $('.main-body').fadeIn('slow');
  changeBackground(time);
}

//=================================
function activeLogoutModal() {
  var modal = document.getElementById('myModal');
  var btn = document.getElementById("logout");
  var span = document.getElementsByClassName("close-button")[0];
  var goback = document.getElementsByClassName("goback")[0];

  btn.onclick = function () {
    modal.style.display = "block";
  }
  span.onclick = function () {
    modal.style.display = "none";
  }
  goback.onclick = function () {
    modal.style.display = "none";
  }
  window.onclick = function (event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
}
//====================================================
function adjustTimeValue(i) {
  if (i < 10) {
    i = "0" + i;
  }
  return i;
}

function getCurrentTime() {
  let today = new Date();
  let h = today.getHours();
  let m = today.getMinutes();
  // let s = today.getSeconds();
  let dw = today.getDay();
  let d = today.getDate();
  let mth = today.getMonth();
  let y = today.getFullYear();
  let p = (h < 12) ? 'AM' : 'PM';
  if (h >= 12) { h -= 12 }
  m = adjustTimeValue(m);
  // s = adjustTimeValue(s);
  document.getElementById('now-time').innerHTML = '<div id="time-smh">' + h + ':' + m + ' ' + p + '</div>';
  t = setTimeout(function () {
    getCurrentTime()
  }, 1000);
}