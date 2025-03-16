<?php
// Inclure le fichier de connexion à la base de données
require_once 'connectdb.php';

// Initialiser les variables
$brand = '';
$model = '';
$cars = [];

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Récupérer les valeurs du formulaire
    $brand = $_POST['brand'];
    $model = $_POST['model'];

    // Préparer la requête SQL pour récupérer les voitures en fonction de la marque et du modèle
    $stmt = $conn->prepare("SELECT * FROM Car WHERE brand = :brand AND model = :model");
    $stmt->bindParam(':brand', $brand);
    $stmt->bindParam(':model', $model);

    // Exécuter la requête
    if ($stmt->execute()) {
        $cars = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Récupérer Voitures par Marque et Modèle</title>
    <style>
        /* Styles généraux pour le document */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 20px;
    background-color: #f8f8f8;
    color: #333;
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
    background-color: #fff;
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

input[type="submit"] {
    background-color: #343a40;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

input[type="submit"]:hover {
    background-color: #5a6268; /* Gris plus foncé au survol */
}

/* Styles pour le tableau */
table {
    width: 80%;
    margin-top: 20px;
    border-collapse: collapse;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Ombre douce */
}

table, th, td {
    border: 1px solid #ccc;
    padding: 10px;
    text-align: left;
}

th {
    background-color: #343a40;
    color: #fff;
}

    </style>
</head>
<body>
    <h2>Récupérer Voitures par Marque et Modèle</h2>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="brand">Marque :</label>
        <input type="text" id="brand" name="brand" placeholder="AUDI" value="<?php echo htmlspecialchars($brand); ?>" required>
        <label for="model">Modèle :</label>
        <input type="text" id="model" name="model" placeholder="Q5" value="<?php echo htmlspecialchars($model); ?>" required>
        <input type="submit" name="submit" value="Rechercher">
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])): ?>
        <?php if (!empty($cars)): ?>
            <h2>Résultats de la Recherche :</h2>
            <table>
                <thead>
                    <tr>
                        <th>Immatriculation</th>
                        <th>Marque</th>
                        <th>Modèle</th>
                        <th>Prix par Jour</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cars as $car): ?>
                        <tr>
                            <td><?php echo $car['immat']; ?></td>
                            <td><?php echo $car['brand']; ?></td>
                            <td><?php echo $car['model']; ?></td>
                            <td><?php echo $car['priceByDay']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Aucune voiture trouvée pour la marque "<?php echo htmlspecialchars($brand); ?>" et le modèle "<?php echo htmlspecialchars($model); ?>"</p>
        <?php endif; ?>
    <?php endif; ?>
</body>
</html>
