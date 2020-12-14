<html>
    <head>
        <meta charset="UTF-8">
        <title>Prijava</title>
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
       
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            ul { list-style: none; }
ul>li>a {
color: grey;
text-decoration: none;
line-height: 1.8;
}
ul>li>a:hover,
a:hover{
color: #cd0909;
font-weight: 500;
}

.col-heading {
display: block;
font-size: 2rem;
text-transform: uppercase;
color:#304f50;
font-weight: 500;
margin: 1rem 0;
padding: .4rem 0px;
border-bottom: 1px solid #c7c7c7; 
letter-spacing: 3px;
}

.fa {
color: #304f50;
margin-right: 10px;
font-size:18px;
width:2.25rem;
}
#to-top {
display: none;
position: fixed;
bottom: 40px;
right: 20px;
font-size: 18px;
border: none;
outline: none;
background-color: #304f50;
color: white;
padding: 15px;
border-radius: 14px;
cursor: pointer;
z-index: 99;
}
#to-top:hover {
background-color: #555;
}

#bottom-footer {
background-color:cadetblue;
color:white;
margin-top: 2rem;
padding-top: .3rem;
}
.vertical-links>li {
display: inline-block;
vertical-align: text-bottom;
}
.vertical-links>li>a {
color: white;
font-weight: 400;
margin-left: 1rem;
list-style-type:square;
}
#searchbox {
        width: 170%; 
        height: 3em; 
        margin-left: 2vw;
    }
    #searchbox-textbox {
        width: 80%
    }
    
    #sidebar-button {
        display: none;
    }
    #main-div {
        margin-top: 10vh;
        margin-bottom: 15.2vh;
        height: 70vh; 
        width: 550px; 
        background-color: #e8eff4;
        border-radius: 5px;
        padding: 10px;
    }
    form {
        margin: auto;
        text-align: left;
    }
    
@media only screen and (max-width: 1200px) {
    #dropdown-header {
        display: none;
    }
    #searchbox {
        width: 300%; 
        height: 3em; 
        
        
    }
    #header-container {
        max-width: 100%
    }
    #searchbox-textbox {
        width: 84vw;
    }
    #sidebar-button {
        display: block;
    }
    #mySidebar {
        width: 80%;
        min-width: 80%
    }
    #mySidebar a {
        text-align: center;
        font-size: 3em;
    }
    #main-div {
        
    }
}

        </style>
    </head>
    <body>
        <div class="container" id="main-div" style="text-align: center;">
            <a href="index.php" class="navbar-brand" style="color: #568bff; font-weight: bold; font-size: 4em; margin:auto">VVRSTI</a>
            
            <form style="width: 80%; height: 40%" method="POST" action="login_do.php">
                
                <div class="form-group" >
                    <label for="userInput">Uporabniško ime</label>
                    <input type="text" class="form-control" id="emailInput" name="userInput" placeholder="Uporabniško ime" required>
                  
                </div>
                <div class="form-group">
                    <label for="passInput">Geslo</label>
                    <input type="password" name="passInput" class="form-control" id="passInput" placeholder="Geslo" required>
                </div>
               
                <input type="submit" class="btn btn-primary" value="Prijava" id="submitButton" style="float: right" /><br>
                
            </form>
            
        </div>
    </body>
   
            <?php









require 'footer_small.php';

?>
</html>