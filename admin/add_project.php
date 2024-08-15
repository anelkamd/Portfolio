<?php
require_once('../bd/conbd.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = strip_tags($_POST['title']);
    $category = strip_tags($_POST['category']);
    $image_url = strip_tags($_POST['image_url']);
    $link = strip_tags($_POST['link']);

    try {
        $sql = $pdo->prepare("INSERT INTO projects (title, category, image_url, link) VALUES (?, ?, ?, ?)");
        $sql->execute([$title, $category, $image_url, $link]);

        // Redirection vers la page admin après ajout
        header("Location: admin.php?success=1");
    } catch (PDOException $e) {
        echo "Erreur SQL : " . $e->getMessage();
    }
}
?>
