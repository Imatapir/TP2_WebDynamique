<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP2</title>
    <link rel="stylesheet" href="resources/css/style.css">
</head>     
<body>
<nav>
    <ul>
        <li><a href="?controller=forum">Forums</a></li>
        <?php if(isset($_SESSION['fingerPrint'])){ ?>
        <li><a href="?controller=forum&function=create">Forum Create</a></li>
        <?php } ?>
        <?php if(!isset($_SESSION['fingerPrint'])){ ?>
        <li><a href="?controller=user&function=create">Register</a></li>
        <?php } ?>
    </ul>
    <ul>
        <?php if(isset($_SESSION['fingerPrint'])){ ?>
        <li><a href="?controller=user&function=logout">Logout</a></li>
        <?php }else{ ?>
        <li><a href="?controller=user&function=login">Login</a></li>
        <?php } ?>
    </ul>
</nav>
    <main>
        <?php echo $content; ?>
    </main>
    <footer>
        Copryright 2026
    </footer>
</body>
</html>
