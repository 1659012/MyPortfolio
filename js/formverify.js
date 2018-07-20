$(document).ready(function () {

  var name_error = true;
  var uid_error = true;
  var psw1_error = true;
  var psw2_error = true;
  var email_error = true;
  $("#create-name").focusout(function () {
    checkName();
  });

  $("#create-uid").focusout(function () {
    checkUid();
  });

  $("#create-pw1").focusout(function () {
    checkPsw1();
  });

  $("#create-pw2").focusout(function () {
    checkPsw2();
  });

  $("#create-email").focusout(function () {
    checkEmail();
  });


  function checkName() {
    var nameLength = $("#create-name").val().length;
    //console.log(nameLength);
    if (nameLength < 5 || nameLength > 20) {
      $('label[for="create-name"] span').html("You must enter a name between 5 - 20 characters!");
      name_error = true;
    } else {
      $('label[for="create-name"] span').html("");
      name_error = false;
    }
  }

  function checkUid() {
    var uidLength = $("#create-uid").val().length;
    //console.log(uidLength);
    if (uidLength < 5 || uidLength > 20) {
      $('label[for="create-uid"] span').html("You must enter a username between 5 - 20 characters!");
      uid_error = true;
    } else {
      $('label[for="create-uid"] span').html("");
      uid_error = false;
    }
  }

  function checkPsw1() {
    var psw_length = $("#create-pw1").val().length;
    if (psw_length < 5) {
      $('label[for="create-pw1"] span').html("Your password must be at least 5 characters!");
      psw1_error = true;
    } else {
      $('label[for="create-pw1"] span').html("");
      psw1_error = false;
    }
  }

  function checkPsw2() {
    var psw1 = $("#create-pw1").val();
    var psw2 = $("#create-pw2").val();
    if (psw1 != psw2) {
      $('label[for="create-pw2"] span').html("Your passwords do not match!");      
      psw2_error = true;
    } else {
      $('label[for="create-pw2"] span').html('');
      psw2_error = false;
    }
  };

  function checkEmail() {
    var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
    if (pattern.test($("#create-email").val())) {
      $('label[for="create-email"] span').html("");
      email_error = false;
    } else {
      $('label[for="create-email"] span').html("Please enter a valid email!");
      email_error = true;
    }
  }


  $(document).on('submit','#register-form',function(event){
    event.preventDefault();
    if (email_error == true|| uid_error ==true || psw1_error == true || psw2_error == true || email_error == true) {  
      $('#register-form button[type="submit"]').attr('id','checked-error');
    }else{
      $('#register-form button[type="submit"]').attr('id','checked-well');
      console.log('good form!');
    }
  });

})