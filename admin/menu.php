<?php require_once('./../bd/conbd.php'); ?>
<?php
ob_start();
session_start();
if (!isset($_SESSION['user'])) {
    header('location: ./admn/admin.php');
    exit;
}
?>

<!DOCTYPE html>
<html class="light" style="color-scheme: light;">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>Page Admin</title>
    <meta name="next-head-count" content="3">
    <link rel="apple-touch-icon" sizes="180x180" href="icon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/45e38e596f.js" crossorigin="anonymous"></script>

</head>

<body>
<div id="__next">
    <div class="container">
        <div class="sidebar">
            <div class="sidebar-content">
                <nav class="nav-links">
                    <a href="index.php" class="nav-item">
                        <svg class="icon" xmlns="http://www.w3.org/2000/svg">
                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                        </svg>
                        Welcome
                    </a>
                    <a href="adduser.php" class="nav-item">
                        <svg class="icon" xmlns="http://www.w3.org/2000/svg">
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                        Ajout Utilisateur
                    </a>
                    <a href="logout.php" class="nav-item">
                        <svg class="icon" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                            <polyline points="16 17 21 12 16 7"></polyline>
                            <line x1="21" y1="12" x2="9" y2="12"></line>
                        </svg>
                        Déconnexion
                    </a>
                </nav>
            </div>
        </div>
        <div class="main-content">
            <main class="content-area">
                <!-- Contenu principal ici -->
            </main>
        </div>
    </div>
</div>
