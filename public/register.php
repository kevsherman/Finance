<?php

  //configuration
  require("../includes/config.php");

  //if form was submitted
  if ($_SERVER["REQUEST_METHOD"] == "POST"){

      //if the username is field, return apology
      if(empty($_POST["username"])) {
        
        apologize("Please provide a username!");   
      }

      //if no password, return apology
      elseif (empty($_POST["password"])){

        apologize("Please provide a password!");
      }
      
      //if password doesn't match the re-entered password, return apology  
      elseif ($_POST["password"] !== $_POST["confirmation"]){

        apologize("Passwords do not match!");
      }

      //if all is as should be, insert new user into table 'users'
      if (query("INSERT INTO users (username, hash, cash) VALUES(?, ?, 10000.00)", $_POST["username"], crypt($_POST["password"])) === false){
            
            apologize("Username has been taken!");
        }
        
        else{
            $rows = query("SELECT LAST_INSERT_ID() AS id");
            $id = $rows[0]["id"];
            $_SESSION["id"] = $id;
            redirect("index.php");
        }


  
  }
  else{
    //else render form
    render("register_form.php", ["title" => "Register"]);
    }
    

?>
  
