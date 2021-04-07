<!DOCTYPE html>
<html lang="en">

<head>
    <title>Controllo Licenza</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="../images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../css/util.css">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-check100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="../images/img-02.png" alt="IMG">
                </div>

                <form class="login100-form validate-form" id="form">
                    <span class="login100-form-title">
                        CONTROLLO LICENZA
                    </span>

                    <div class="wrap-input100 validate-input" data-validate="Il dominio è richiesto">
                        <input class="input100" type="text" id="dominio" name="dominio" placeholder="Dominio">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-globe" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Il numero licenza richiesta">
                        <input class="input100" type="text" id="license_key" name="license_key" placeholder="Num licenza">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-key" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            CONTROLLA
                        </button>
                    </div>
                    <div class="text-center p-t-136">
                        <a class="txt2">
                        </a>
                    </div>
                </form>
                <div class="text-center text-success">
                    <span class="label label-success" id="licenza_trovata"></span>
                </div>
                <div class="text-center text-error">
                    <bold><span class="label label-danger" id="error"></span><bold>
                </div>
            </div>
        </div>
    </div>

    <!--===============================================================================================-->
    <script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="../vendor/bootstrap/js/popper.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="../vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="../vendor/tilt/tilt.jquery.min.js"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <!--===============================================================================================-->
    <script src="../js/check.js"></script>

</body>

</html>