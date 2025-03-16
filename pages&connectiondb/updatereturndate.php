<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mise à Jour de la Date de Retour</title>
    <style>
        /* Styles généraux pour le document */
/* Styles généraux pour le document */
body {
    font-family: Arial, sans-serif;
    background-color: #f8f9fa;
    color: #333;
    padding: 20px;
}

/* Titre centré */
h2 {
    color: #343a40;
    text-align: center; /* Centrer le texte */
    margin-bottom: 40px; /* Espacement inférieur */
}

/* Styles spécifiques au formulaire */
form {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    border-radius: 5px;
    background-color: #fff; /* Fond blanc */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Ombre plus prononcée */
}

input[type="date"],
input[type="text"] {
    width: 100%;
    padding: 12px;
    margin-bottom: 20px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 5px;
    transition: border-color 0.3s ease;
}

button {
    background-color: #343a40;
    color: #fff;
    border: none;
    padding: 14px 24px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

button:hover {
    background-color: #5a6268;
}

/* Styles pour les messages de succès et d'erreur */
.success-message {
    color: green;
}

.error-message {
    color: red;
}


    </style>
</head>
<body>
    <h2>Mise à Jour de la Date de Retour</h2>
    <?php
    // Inclure le fichier de connexion à la base de données
    require_once 'connectdb.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $rentalId = $_POST['rentalId'];
        $returnDate = $_POST['returnDate'];

        // Mettre à jour la date de retour dans la base de données
        $stmt = $conn->prepare("UPDATE Rental SET eDate = :returnDate WHERE rentalID = :rentalId");
        $stmt->bindParam(':returnDate', $returnDate);
        $stmt->bindParam(':rentalId', $rentalId);

        if ($stmt->execute()) {
            echo '<p class="success-message">Date de retour mise à jour avec succès.</p>';
        } else {
            echo '<p class="error-message">Erreur lors de la mise à jour de la date de retour.</p>';
        }
    }
    ?>

    <form method="POST" action="">
        <label for="rentalId">ID de la Location :</label>
        <input type="text" id="rentalId" name="rentalId" placeholder="30" required><br><br>

        <label for="returnDate">Nouvelle Date de Retour :</label>
        <input type="date" id="returnDate" name="returnDate" required><br><br>

        <button type="submit">Mettre à Jour</button>
    </form>
</body>
</html>
