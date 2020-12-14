<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Prijava</title>
        <meta charset="UTF-8">
        <title>Bolha klon</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-parallax-js@5.5.1/dist/simpleParallax.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="./pristine/dist/pristine.js"  type="text/javascript"></script>
        <style>
            body {
                height: 100vh;
            }
            #formDiv {
                max-width: 576px;
                margin: auto;
                display: flex;
                align-items: center;
                justify-content: center;
                height: 100%;
            }
            #regBtn:hover {
                color: #0056b3 !important;
                text-decoration: none !important;
                
            }
            button {
                text-decoration: none !important;
            }
            .pristine-error {
                color: red;
            }
        </style>
    </head>
    <body>
        <div id="formDiv" style="display:none;">
            <div style="min-width:100%; border-radius: 0.25rem; background-color: #f8f9fa;border: 1px solid #9f98bd">
                <form style="width:85%; margin:auto; padding-bottom: 1.5rem;" action="login_do.php" method="POST" name="form1" id="form1">
                    <div class="form-group">
                        <nav class="navbar navbar-light bg-light">
                            <span class="navbar-brand mb-0 h1" style="margin:auto; font-size: 2.5em;">Logo</span>
                        </nav>
                        <nav class="navbar navbar-light bg-light">
                            <span class="navbar-brand mb-0 h1" style="margin:auto; font-size: 1.4em;">Prijava</span>
                        </nav>
                      <label for="emailInput">Email</label>
                      <input type="email" required="" class="form-control" id="emailInput" name="emailInput" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                      <label for="passInput">Geslo</label>
                      <input type="password" class="form-control" id="passInput" name="passInput" required="">
                    </div>
                    <div class="form-group form-check">
                      <input type="checkbox" class="form-check-input" id="Check">
                      <label class="form-check-label" for="Check">Ostanite prijavljeni</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Prijava</button>
                    <button class="btn btn-link" style="float:right;">
                        <p id="regBtn" onclick="toReg()" style="color:#007bff; margin: 0; text-decoration: none;">Registracija</p>
                    </button>
                </form>
                
            </div>
        </div>
        
        <script>
                $("#formDiv").fadeIn(500, "swing");
        </script>
        <script>
            function toReg () {
                $("#formDiv").fadeOut(500, "swing");
                setTimeout(() => { window.location.href = "reg.php";  }, 500);
            }
        </script>
      
    </body>
</html>
