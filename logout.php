<?php 
    session_start();
    session_unset();
    session_destroy();
?>
<html>
    <head>
        <meta name="google-signin-client_id" content="686963027894-p7oee249bp8ufsiljptb78jvu5tdb3is.apps.googleusercontent.com">
    </head>
    <body>
        <script src="https://apis.google.com/js/platform.js?onload=onLoadCallback" async defer></script>
        <script>
            window.onLoadCallback = function(){
                gapi.load('auth2', function() {
                    gapi.auth2.init().then(function(){
                        var auth2 = gapi.auth2.getAuthInstance();
                        auth2.signOut().then(function () {
                            document.location.href = 'login.php';
                        });
                    });
                });
            };
        </script>
    </body>
</html>
