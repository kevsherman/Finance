<?php
/*
//  This page shows the current users stock portolio 
//
//  Variables are passed in from index.php via $user, which called all db rows for the user:
//  Eg:
//            Array
//                    (
//                   [0] => Array
//                        (
//                           [id] => 20
//                           [username] => newguy12
//                           [hash] => $1$V411.CmR$JTOkUNRexX40YIdbBRwtP1
//                           [cash] => 10000.0000
//                        )
//
//                    )
//
/////////////////////////////////////////////////////////////////////////////////////////*/ ?>

<div id="welcome">
    <h2>Welcome <?= $user[0]["username"] ?> </h2>
</div>

<h2>Current Portfolio</h2>

        <table class="table">
            <tr>
                <td><strong>Company</strong></td>
                <td><strong>Shares Held</strong></td>
                <td><strong>Share Price</strong></td>
            </tr>

        <?php foreach ($positions as $position): ?>
            <tr>
                <td><?= $position["symbol"] ?></td>
                <td><?= $position["shares"] ?></td>
                <td>$<?= $position["price"] ?></td>
            </tr>
        <? endforeach ?>   
            <tr>
                <td><strong>Total Securities</strong></td>
                <td> - </td>
                <td><strong>$<?= $totalvalue ?></strong></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Cash ($CAN)</td>
                <td> - </td>
                <td>$<?= $user[0]["cash"] ?></td>
            </tr>
             
            <tr>
                <td><strong>Total Account Holdings</td>
                <td> - </td>
                <td><strong>$<?= $totalvalue + $user[0]["cash"]; ?></strong></td>
            </tr>
             
        </table>





