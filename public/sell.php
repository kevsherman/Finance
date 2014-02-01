<?php

require("../includes/config.php");

//if form was submitted, initiate stock sell
if ($_SERVER["REQUEST_METHOD"] == "POST") {

        //What stock are they selling?
        $stock = $_POST["symbol"];

        //How many shares are they selling?
        $amt = $_POST["amt"];

        //How many shares do they have currently?
        $shares = query("SELECT shares FROM stocks WHERE id = ? AND symbol = ?", $_SESSION["id"], $_POST["symbol"]);

        //if amount they want to sell is more than they have, apologize
        if($shares <= $amt){
            render("apologize.php", "sorry, you dont have that many shares");
        }

        //What is the sale value? (current stock price * amount of shares to sell)
        $stockdetail = lookup($_POST["symbol"]);
        $newcash = $stockdetail["price"] * $amt;

        //add $ to cash
        query ("UPDATE users SET cash = cash + ? WHERE id = ?", $newcash, $_SESSION["id"]);

        //remove sold stocks from portfolio
        query("UPDATE stocks SET shares = shares - ? WHERE id = ? AND symbol = ?", $amt, $_SESSION["id"], $_POST["symbol"]);

        //find new stock total
        $newshares = query("SELECT shares FROM stocks WHERE id = ? AND symbol =?", $_SESSION["id"], $_POST["symbol"]);


        //if new stock total == 0, delete the row
            if($newshares[0]["shares"] == 0){
                query("DELETE FROM stocks WHERE id = ? AND symbol = ?", $_SESSION["id"], $_POST["symbol"]);
            }

        //redirect back to index.php
        redirect("index.php");

}

//but if not submitted, just render the form
else{
    render("sell_form.php", ["title" =>"Sell Form"]);
}



?>

