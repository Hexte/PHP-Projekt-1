<?php 

echo '
        <div>
            <div class="header">
                <div class="logo" style="height: 2em; line-height: 2em; width:20%; float: left;">
                    <h2 style="font-weight: bold; text-align: center; height: 2em; line-height: 2em; margin:0;">
                        VVRSTI
                    </h2>
                </div>
                <div class="search" style="height: 4em; line-height: 4em; width:50%; float: left;">
                    <form class="form-inline" style="height: 4em; line-height: 4em;">
                        <input class="form-control mr-sm-2" id="searchbox" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
                <div class="personal" style="height: 4em; line-height: 4em; width:15%; float: right; margin-right: 4.75em;">
                    <div class="user" style="height: 4em; line-height: 4em; width:50%; float: right; text-align:center">';
                        if (isset($_SESSION['user_id'])){
                            echo '<a href="../kosarica.php">Košarica</a>';
                        }
                        else {
                            echo '<a href="login.php" style="color: white; text-decoration:none;"><button type="button" class="btn btn-primary">Prijava</button></a>';
                        } 
                   echo '</div>
                    <div class="basket" style="height: 4em; line-height: 4em; width:50%; float: right; text-align:center">';
                        if (isset($_SESSION['user_id'])){
                            echo '<a href="index.php?id=' . $_SESSION['user_id'] . '">Profil</a>';
                        }
                        else {
                            echo '<a href="reg.php" style="color: white; text-decoration:none;"><button type="button" class="btn btn-primary">Registracija</button></a>';
                        } 
                    echo '</div>
                </div>
            </div>
        </div>
';

?>
