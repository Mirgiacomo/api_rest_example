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
    var license_key = document.getElementById("license_key").value;
    $.ajax({
    url: "../license/check",
    method: "POST",
    data: "dominio=" + dominio + "&license_key=" + license_key,
    })
    .done(function (response) {
        if(response == true){
              document.getElementById("error").style.display= 'none';
              document.getElementById("licenza_trovata").style.display= '';
              document.getElementById('licenza_trovata').textContent = "LICENZA TROVATA";
            
          } else {
              document.getElementById("licenza_trovata").style.display= 'none';
              document.getElementById("error").style.display= '';
              document.getElementById('error').textContent = "LICENZA NON TROVATA";
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
