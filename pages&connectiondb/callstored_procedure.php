<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Recherche Prix d'une voiture</title>
    <style>
        /* Styles généraux pour le document */
body {                     
    font-family: Arial, sans-serif;
    background-color: #f8f9fa; /* Couleur de fond plus claire */
    color: #343a40; /* Couleur de texte principale */
    padding: 20px;
    margin: 0;
}

/* Titre centré */
h2 {
    color: #343a40; /* Couleur de titre en gris foncé */
    text-align: center;
    margin-bottom: 20px; /* Espacement inférieur */
}

/* Styles spécifiques au formulaire */
form {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ddd; /* Bordure plus douce */
    border-radius: 5px;
    background-color: #fff; /* Fond blanc */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Ombre légère */
}

/* Styles pour les champs de saisie */
input[type="text"] {
    width: 100%;
    padding: 12px;
    margin-bottom: 20px; /* Espacement plus grand sous le champ de saisie */
    box-sizing: border-box;
    border: 1px solid #ddd; /* Bordure douce */
    border-radius: 5px;
    transition: border-color 0.3s ease;
}

/* Styles pour le bouton */
button {
    background-color: #5a6268; /* Couleur de fond gris souris */
    color: #fff;
    border: none;
    padding: 12px 24px; /* Ajustement du padding */
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #343a40; /* Couleur de fond gris foncé au survol */
}

/* Styles pour le tableau */
table {
    width: 100%;
    margin-top: 20px;
    border-collapse: collapse;
}

/* Styles pour les cellules du tableau */
table, th, td {
    border: 1px solid #ddd;
    padding: 12px;
    text-align: left;
}

/* Styles pour l'en-tête du tableau */
th {
    background-color: #343a40; /* Couleur de fond gris foncé pour l'en-tête de tableau */
    color: #fff;
}

    </style>
</head>
<body>
    <h2>Recherche de Prix de Voiture par Immatriculation</h2>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="immat">Entrez l'Immatriculation :</label>
        <input type="text" id="immat" name="immat" placeholder="000012" required>
        <button type="submit">Rechercher</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupérer le prix entré par l'utilisateur depuis le formulaire
        $immat = $_POST['immat'];

        // Inclure le fichier de connexion à la base de données
        require_once 'connectdb.php'; // Assurez-vous d'avoir ce fichier avec la connexion à la base de données

        // Appel de la procédure stockée RetrieveCarsByPrice
        $stmt = $conn->prepare("CALL RetrievePriceimmat(:immat)");
        $stmt->bindParam(':immat', $immat, PDO::PARAM_STR);
        $stmt->execute();

        // Affichage des résultats dans un tableau HTML
        echo "<h3>Résultats de la recherche :</h3>";
        echo "<table>";
        echo "<tr><th>Immatriculation</th><th>Prix</th></tr>";
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $row['immat'] . "</td>";
			echo "<td>" . $row['PriceByDay'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    ?>
</body>
</html>
