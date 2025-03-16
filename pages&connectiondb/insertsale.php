<?php
// Inclure le fichier de connexion à la base de données
require_once 'connectdb.php';



// Traitement de l'ajout de vente
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Récupérer les données du formulaire
    $idClient = $_POST['idClient'];
    $immat = $_POST['immat'];
    $salePrice = $_POST['salePrice'];
    $saleDate = $_POST['saleDate'];

    // Préparation et exécution de la requête SQL pour ajouter la vente
    $stmt = $conn->prepare("INSERT INTO sale(idClient, immat, salePrice, saleDate) 
                            VALUES (:idClient, :immat, :salePrice, :saleDate)");
    $stmt->bindParam(':idClient', $idClient);
    $stmt->bindParam(':immat', $immat);
    $stmt->bindParam(':salePrice', $salePrice);
    $stmt->bindParam(':saleDate', $saleDate);

    if ($stmt->execute()) {
        echo "<p style='color: green;'>Vente ajoutée avec succès !</p>";
        // Utiliser JavaScript pour recharger la page après 1 seconde (1000 millisecondes)
        echo "<script>setTimeout(() => { location.reload(); }, 1000);</script>";
    } else {
        echo "<p style='color: red;'>Erreur lors de l'ajout de la vente.</p>";
    }
}
// Récupérer toutes les ventes depuis la base de données
$stmt = $conn->query("SELECT * FROM sale");
$sales = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une Nouvelle Vente</title>
    <style>
        /* Styles généraux pour le document */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            color: #333;
            margin: 0;
            padding: 0;
        }

        /* Navigation */
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

        .container {
            width: 80%;
            margin: 20px auto;
        }

        h2 {
            color: #343a40;
            margin-top: 188px;
            margin-bottom: 40px;
            text-align: center;
            font-size: 36px;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* Styles spécifiques au formulaire */
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

        form input[type="text"],
        form input[type="date"],
        form input[type="submit"] {
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
        }

        /* Styles spécifiques au tableau */
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

        /* Décoration d'écriture générale */
        .button-container {
            background-color: #D3D3D3;
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
            margin: 0 auto;
            display: block;
        }

        .theme-button:hover {
            background-color: #5a6268;
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

    <section>
        <h2>Liste des Ventes Existantes</h2>
        <table>
            <tr>
                <th>idClient</th>
                <th>Immatriculation</th>
                <th>Prix de vente</th>
                <th>Date de vente</th>
            </tr>
            <?php foreach ($sales as $sale): ?>
                <tr>
                    <td><?php echo htmlspecialchars($sale['idClient']); ?></td>
                    <td><?php echo htmlspecialchars($sale['immat']); ?></td>
                    <td><?php echo htmlspecialchars($sale['salePrice']); ?></td>
                    <td><?php echo htmlspecialchars($sale['saleDate']); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </section>

    <h2 style="margin-top: 40px;">Ajouter une Vente</h2>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <!-- Formulaire d'ajout de vente -->
        <label for="idClient">Identifiant Client :</label>
        <input type="text" name="idClient" placeholder="000012" required>

        <label for="immat">Immatriculation :</label>
        <input type="text" name="immat" placeholder="000011" required>

        <label for="salePrice">Prix de vente :</label>
        <input type="text" name="salePrice" placeholder="25000" required>

        <label for="saleDate">Date de Vente :</label>
        <input type="date" name="saleDate" required>

        <input type="submit" name="submit" value="Ajouter une Vente">
    </form>
</body>
</html>
