<!DOCTYPE html>

<html>

    <head>

        <link href="css/bootstrap.min.css" rel="stylesheet"/>
        <link href="css/bootstrap-theme.min.css" rel="stylesheet"/>
        <link href="css/styles.css" rel="stylesheet"/>

        <?php if (isset($title)): ?>
            <title>C$50 Finance: <?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title>C$50 Finance</title>
        <?php endif ?>

        <!-- Suppressed notice that 'title is undefined' */ -->
        <?php if(@$title == "Log In"): ?>
            <link href="css/home.css" rel="stylesheet" />
        <?php endif ?>

        <script src="js/jquery-1.10.2.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/scripts.js"></script>

    </head>

    <body>

        <div class="container">

            <div id="top">
                <a href="index.php"><h1>Wallstreet Hacker</h1></a>
            </div>

            <nav class="navbar navbar-default" role="navigation">
                  <div class="container-fluid">
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                              <ul class="nav navbar-nav">
                                <li class="active"><a href="quote.php" class="navbar-link">Search Stocks</a></li>
                                <li class="active"><a href="buy.php" class="navbar-link">Buy Stocks</a></li>
                                <li class="active"><a href="sell.php" class="navbar-link">Sell Stocks</a></li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="logout.php" class="navbar-link">Log Out</a></li>
                            </ul>

                        </div>
                    </div>
            </nav>

                        
            <div id="middle">















