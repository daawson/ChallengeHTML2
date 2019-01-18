<?php
    session_start();
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Thasadith:400,700" rel="stylesheet"> <!-- er zijn 2 types van zelfde font 400 en 700 dus regular en bold -->
    <link type="text/css" rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon.png">
    <script src="js/script.js"></script>
</head>
<body>
<header>
    <p id="logo">Challenge</p>
    <p id="logo_desc">Effe bikkelen op een mooie website</p>
</header>
<nav>
    <div id="nav-bar">
        <a href="index.php">Home</a>
        <a href="#">Archeologie</a>
        <a href="#">Backpacking</a>
        <a href="#">Bergbeklimmen</a>
    </div>
    <div id="nav-bar-dropdown">
        <button id="menu" onclick="toggleDropDown()"><img src="bicon.svg" style="color: gray; float: left;">Menu</button>
        <div id="drop" class="hide">
            <a href="index.php">Home</a>
            <a href="#">Archeologie</a>
            <a href="#">Backpacking</a>
            <a href="#">Bergbeklimmen</a>
        </div>
    </div>
    <div id="login">
        <?php
        if(isset($_SESSION['role'])){
            echo "Welcome <a href='logout.php'>".$_SESSION['naam']."</a>";
        }
        else{
            echo "<a href='login.php'>Login</a>";
        }
        ?>
    </div>
</nav>
<main>
    <div id="wrap">
        <section>
            <article class="big">
                <h1>Tis weer lente</h1>
                <p class="desc">Geplaatst 17 Januari door mij</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Donec ac ante quis leo luctus tincidunt vitae in leo.
                    Fusce sem nunc, mollis vel dolor vel, imperdiet luctus lectus.</p>
                <img class='scale' src="img/cow.jpg">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Donec ac ante quis leo luctus tincidunt vitae in leo.
                Fusce sem nunc, mollis vel dolor vel, imperdiet luctus lectus.
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Donec ac ante quis leo luctus tincidunt vitae in leo.
                    Fusce sem nunc, mollis vel dolor vel, imperdiet luctus lectus.
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Donec ac ante quis leo luctus tincidunt vitae in leo.
                    Fusce sem nunc, mollis vel dolor vel, imperdiet luctus lectus.</p>
                <p></p>
            </article>
            <article class="big">
                <?php
                if(!isset($_SESSION['role'])){
                    echo '<p>U moet eerst inloggen om op nieuws te reageren!</p><p></p>';
                }
                else {
                    echo
                        '<p>Je plaats berichten als '.$_SESSION["naam"].'</p>' .
                        '<form action="post.php" method="get">' .
                            'Bericht:<br>' .
                            '<input type="text" id="msg" name="msg"><br>' .
                            '<input type="submit" value="Post je reactie">' .
                        '</form>' .
                        '<p></p>'
                    ;
                }
                ?>
            </article>
            <article class="big">
                <?php
                    $host = 'localhost';
                    $port = '3306';
                    $user = 'root';
                    $pass = '';
                    $db = 'school';
                    $dbh = new PDO('mysql:host='.$host.';dbname='.$db.';port='.$port, $user, $pass);
                    $stmt = $dbh->prepare("SELECT id, user, date, text FROM comment");
                    $stmt->execute();
                    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

                    foreach($stmt->fetchAll() as $item){
                        echo "<div class='comment'>";
                        echo "<p>".$item['user']."<p>";
                        echo "<p>".$item['date']."<p>";
                        echo "<p>".$item['text']."<p>";
                        if($_SESSION['role']=='admin'){
                            echo "<a href='remove.php?id=".$item['id']."'"." class='rm'>Remove</a>";
                        }
                        echo "</div>";

                    }
                ?>
            </article>
        </section>
        <section>

            <article class="sideart mg"><a class='mg' href="index.php">Home</a></article>
            <article class="sideart mg"><a class='mg' href="vk.html">Volgende artikel</a> </article>
            <article class="sideart">
                <h1>Laatste berichten</h1>
                <a href="twl.php">Tis weer lente</a>
                <a href="vk.html">Verder kijken</a>
                <a href="#">No messages.</a>
                <a href="#">No messages.</a>
            </article>
            <article class="sideart">
                <h1>Dieren in het nieuws</h1>
                <a href="#">In het nieuws</a>
                <a href="#">Lente berichten</a>
            </article>
        </section>
    </div>
</main>
<footer>

</footer>
</body>
</html>