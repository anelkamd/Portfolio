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

<style>
    /* Container for the form */
.form-container {
    max-width: 500px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

/* Each form group */
.form-group {
    margin-bottom: 15px;
}

/* Labels for the form inputs */
.form-label {
    font-size: 14px;
    font-weight: bold;
    margin-bottom: 5px;
    color: #333;
}

/* Style for the form inputs */
.form-input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 14px;
    outline: none;
    transition: border-color 0.3s;
}

.form-input:focus {
    border-color: #007bff;
}

/* Submit button styling */
.form-button {
    width: 100%;
    padding: 10px;
    background-color: #007bff;
    color: white;
    font-size: 16px;
    font-weight: bold;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.form-button:hover {
    background-color: #0056b3;
}

/* Responsive styling */
@media (max-width: 768px) {
    .form-container {
        padding: 15px;
    }

    .form-button {
        font-size: 14px;
    }
}

</style>

<!-- Formulaire d'ajout de projet -->
<form action="add_project.php" method="POST" class="form-container">
    <div class="form-group">
        <label for="title" class="form-label">Titre du projet :</label>
        <input type="text" id="title" name="title" class="form-input" required>
    </div>

    <div class="form-group">
        <label for="category" class="form-label">Catégorie :</label>
        <input type="text" id="category" name="category" class="form-input" required>
    </div>

    <div class="form-group">
        <label for="image_url" class="form-label">URL de l'image :</label>
        <input type="text" id="image_url" name="image_url" class="form-input" required>
    </div>

    <div class="form-group">
        <label for="link" class="form-label">Lien du projet :</label>
        <input type="text" id="link" name="link" class="form-input" required>
    </div>

    <button type="submit" class="form-button">Ajouter le projet</button>
</form>
