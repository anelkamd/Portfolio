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
<style>
 /* Conteneur principal */
#__next {
    font-family: Arial, sans-serif;
}

/* Barre de navigation (navbar) */
.navbar {
    background-color: #2d3748;
    padding: 15px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    position: sticky;
    top: 0;
    z-index: 1000;
    width: 100%;
}

/* Navigation */
.nav-links {
    display: flex;
    gap: 20px;
}

/* Liens de navigation */
.nav-item {
    display: flex;
    align-items: center;
    padding: 10px;
    text-decoration: none;
    color: white;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.nav-item:hover {
    background-color: #4a5568;
}

/* Icônes des liens */
.icon {
    margin-right: 10px;
    height: 24px;
    width: 24px;
    fill: none;
    stroke: currentColor;
    stroke-width: 2;
    stroke-linecap: round;
    stroke-linejoin: round;
}

/* Contenu principal */
.main-content {
    padding: 20px;
    background-color: #ffffff;
    overflow-y: auto;
}

/* Contenu de la zone principale */
.content-area {
    max-width: 1200px;
    margin: 0 auto;
}


</style>
<div id="__next">
    <div class="navbar">
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
    <div class="main-content">
        <main class="content-area">
            <!-- Contenu principal ici -->
        </main>
    </div>
</div>
