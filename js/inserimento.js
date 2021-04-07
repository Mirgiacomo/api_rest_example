(function ($) {
  var input = $(".validate-input .input100");

  $("#form").submit(function (e) {
    var check = true;

    for (var i = 0; i < input.length; i++) {
      if (validate(input[i]) == false) {
        showValidate(input[i]);
        check = false;
      }
    }

    var dominio = document.getElementById("dominio").value;
    var mailchimp_api_key = document.getElementById("mailchimp_api_key").value;
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    $.ajax({
    url: "../license/activate",
    method: "POST",
    data: "dominio=" + dominio + "&mailchimp_api_key=" + mailchimp_api_key + "&username=" + username + "&password=" + password,
    })
    .done(function (response) {
        if(response.success){

              document.getElementById("error").style.display= 'none';
              document.getElementById("license_number").style.display= '';
              document.getElementById('license_number').textContent = "LICENZA NUMERO : " + response.success;
            
          } else {
              document.getElementById("license_number").style.display= 'none';
              document.getElementById("error").style.display= '';
              document.getElementById('error').textContent = "ERRORE : " + response.error;
          }
    })
    .fail(function (jqXHR) {
        alert(jqXHR);
        document.getElementById('error').textContent = "ERRORE : " + jqXHR;
    });
    e.preventDefault();
  });

  $(".validate-form .input100").each(function () {
    $(this).focus(function () {
      hideValidate(this);
    });
  });

  function validate(input) {
    if ($(input).val().trim() == "") {
      return false;
    }
  }

  function showValidate(input) {
    var thisAlert = $(input).parent();

    $(thisAlert).addClass("alert-validate");
  }

  function hideValidate(input) {
    var thisAlert = $(input).parent();

    $(thisAlert).removeClass("alert-validate");
  }
})(jQuery);
