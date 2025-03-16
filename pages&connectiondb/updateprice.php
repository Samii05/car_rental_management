<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mise à Jour du Prix de Voiture</title>
    <style>
 /* Styles généraux pour le document */
body {
    font-family: Arial, sans-serif;
    background-color: #f5f5f5;
    color: #333;
    padding: 20px;
}

/* Titre centré */
h2 {
    color: #343a40;
    text-align: center; /* Centrer le texte */
    margin-bottom: 20px; /* Espacement inférieur */
}

/* Styles spécifiques au formulaire */
form {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    border-radius: 5px;
    background-color: #ddd; /* Fond gris clair */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Ombre douce */
}

input[type="text"] {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
    transition: border-color 0.3s ease;
}

button {
    background-color: #343a40; /* Gris foncé */
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #5a6268; /* Gris plus foncé au survol */
}

    </style>
</head>
<body>
    <h2>Mise à Jour du Prix de Voiture</h2>
    <?php
    // Inclure le fichier de connexion à la base de données
    require_once 'connectdb.php';

    // Vérifier si un formulaire de mise à jour a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $immatToUpdate = $_POST['immatToUpdate'];
        $newPrice = $_POST['newPrice'];

        // Mettre à jour le prix de la voiture dans la base de données
        $stmt = $conn->prepare("UPDATE Car SET priceByDay = :newPrice WHERE immat = :immatToUpdate");
        $stmt->bindParam(':newPrice', $newPrice);
        $stmt->bindParam(':immatToUpdate', $immatToUpdate);

        if ($stmt->execute()) {
            echo '<p style="color: #343a40;">Le prix de location de la voiture a été mis à jour avec succès.</p>';
        } else {
            echo '<p style="color: #ff0000;">Erreur lors de la mise à jour du prix de location de la voiture.</p>';
        }
    }

    // Afficher le formulaire de mise à jour du prix
    ?>
    <form method="POST" action="">
        <label for="immatToUpdate">Immatriculation de la Voiture :</label>
        <input type="text" id="immatToUpdate" name="immatToUpdate" placeholder="000012" required>
        <label for="newPrice">Nouveau Prix :</label>
        <input type="text" id="newPrice" name="newPrice" placeholder="25000" required>
        <button type="submit">Mettre à Jour</button>
    </form>
</body>
</html>
