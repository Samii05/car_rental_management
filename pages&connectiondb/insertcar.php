<?php
// Inclure le fichier de connexion à la base de données
require_once 'connectdb.php';

// Insertion d'une nouvelle voiture dans la base de données
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Collecte des données du formulaire
    $immat = $_POST['immat'];
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $price = $_POST['price'];

    // Préparation et exécution de la requête SQL
    $stmt = $conn->prepare("INSERT INTO car (immat, brand, model, priceByDay) VALUES (:immat, :brand, :model, :price)");
    $stmt->bindParam(':immat', $immat);
    $stmt->bindParam(':brand', $brand);
    $stmt->bindParam(':model', $model);
    $stmt->bindParam(':price', $price);

    if ($stmt->execute()) {
        echo "<p style='color: green;'>Voiture ajoutée avec succès !</p>";
        // Utiliser JavaScript pour recharger la page après 1 seconde (1000 millisecondes)
        echo "<script>setTimeout(() => { location.reload(); }, 1000);</script>";
    } else {
        echo "<p style='color: red;'>Erreur lors de l'ajout de la voiture.</p>";
    }
}

// Récupérer et afficher la liste des voitures depuis la base de données
$stmt = $conn->query("SELECT * FROM car");
$cars = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une Nouvelle Voiture</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom, #f5f5f5, #e9ecef);
            color: #333;
            margin: 0;
            padding: 40px;
        }

        nav {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: #424242;
            padding: 15px 0;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            z-index: 1000;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: background-color 0.3s ease;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            padding: 10px 30px;
            margin: 0 10px;
            border-radius: 5px;
            background-color: #555;
            transition: background-color 0.3s ease;
            font-weight: bold;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        nav a:hover {
            background-color: #777;
        }

        h2 {
            color: #343a40;
            margin-bottom: 40px;
            margin-top: 150px;
            text-align: center;
            font-size: 36px;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: separate;
            border-spacing: 0;
            background-color: #fff;
            border-radius: 20px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        th, td {
            padding: 16px;
            text-align: left;
            border-bottom: 1px solid #ccc;
        }

        th {
            background-color: #333;
            color: #fff;
            border-radius: 20px 20px 0 0;
        }

        tr:hover {
            background-color: rgba(0, 0, 0, 0.05);
            transition: background-color 0.3s ease;
        }

        form {
            background-color: #f8f9fa;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 60%;
            margin: 0 auto;
            text-align: center;
        }

        form label {
            display: block;
            margin-bottom: 16px;
            color: #343a40;
            font-weight: bold;
        }

        form input[type="text"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 24px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 4px;
            transition: border-color 0.3s ease;
        }

        form input[type="submit"] {
            background-color: #343a40;
            color: #fff;
            border: none;
            padding: 14px 24px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        form input[type="submit"]:hover {
            background-color: #5a6268;
            transform: scale(1.05);
        }

        .button-container {
            background-color: #D3D3D3;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 30px;
            margin-top: 40px;
            text-align: center;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
        }

        .theme-button {
            background-color: #343a40;
            color: #fff;
            border: none;
            padding: 16px 24px;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s ease;
            font-size: 16px;
            margin: 0 60px;
            margin-top: 95px;
        }

        .theme-button:hover {
            background-color: #5a6268;
        }

        .other-title {
            text-align: center;
            margin-top: 40px;
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <nav>
        <a href="indexx.php">Accueil</a>
        <a href="insertcar.php">Voiture</a>
        <a href="insertrental.php">Location</a>
        <a href="insertclient.php">Client</a>
        <a href="insertsale.php">Vente</a>
    </nav>

    <h2>Liste des Voitures</h2>

    <table>
        <tr style="background-color: #f8f9fa;">
            <th>Immatriculation</th>
            <th>Marque</th>
            <th>Modèle</th>
            <th>Prix par Jour</th>
        </tr>
        <?php foreach ($cars as $car): ?>
            <tr>
                <td><?php echo $car['immat']; ?></td>
                <td><?php echo $car['brand']; ?></td>
                <td><?php echo $car['model']; ?></td>
                <td><?php echo $car['priceByDay']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <h2 style="margin-top: 40px;">Ajouter une Voiture</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <label for="immat">Immatriculation :</label>
        <input type="text" name="immat" placeholder="000012" required>

        <label for="brand">Marque :</label>
        <input type="text" name="brand" placeholder="AUDI" required>

        <label for="model">Modèle :</label>
        <input type="text" name="model" placeholder="Q5" required>

        <label for="price">Prix par Jour :</label>
        <input type="text" name="price" placeholder="250000" required>

        <input type="submit" name="submit" value="Ajouter la Voiture">
    </form>

    <div class="button-container">
        <div class="other-title">Autres</div>
        <!-- Boutons pour accéder aux autres fonctionnalités -->
        <a href="updateprice.php">
            <button class="theme-button">Modifier le Prix d'une Voiture</button>
        </a>
		
        <a href="selectcarb.php">
            <button class="theme-button">Sélectionner les Voitures par Marque</button>
        </a>
		
        <a href="callstored_procedure.php">
            <button class="theme-button">Sélectionner le Prix par Jours</button>
        </a>
	
    </div>
</body>
</html>
