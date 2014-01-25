<?php
/*     
//      This controller will provide a stock quote for a provided symbol
//
////////////////////////////////////////////////////////////////////*/

    require("../includes/config.php");

        if($_SERVER ["REQUEST_METHOD"] == "POST"){
    
           $quote = lookup($_POST["symbol"]);
           render("displayquote.php", ["quote" => $quote]);
        }

        else{
            render("getquote_form.php");
        }



?>
