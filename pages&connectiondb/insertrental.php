<?php
// Inclure le fichier de connexion à la base de données
require_once 'connectdb.php';

// Insertion d'une nouvelle location dans la base de données
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Collecte des données du formulaire
    $locDate = $_POST['locDate'];
    $sDate = $_POST['sDate'];
    $eDate = $_POST['eDate'];
    $rentalType = $_POST['rentalType'];
    $immat = $_POST['immat'];
    $idClient = $_POST['idClient'];

    // Préparation et exécution de la requête SQL
    $stmt = $conn->prepare("INSERT INTO rental (locDate, sDate, eDate, rentalType, immat, idClient) VALUES (:locDate, :sDate, :eDate, :rentalType, :immat, :idClient)");
    $stmt->bindParam(':locDate', $locDate);
    $stmt->bindParam(':sDate', $sDate);
    $stmt->bindParam(':eDate', $eDate);
    $stmt->bindParam(':rentalType', $rentalType);
    $stmt->bindParam(':immat', $immat);
    $stmt->bindParam(':idClient', $idClient);

    if ($stmt->execute()) {
        echo "<p style='color: green;'>Location ajoutée avec succès !</p>";
        // Utiliser JavaScript pour recharger la page après 1 seconde (1000 millisecondes)
        echo "<script>setTimeout(() => { location.reload(); }, 1000);</script>";
    } else {
        echo "<p style='color: red;'>Erreur lors de l'ajout de la location.</p>";
    }
}

// Récupération des locations existantes depuis la base de données
$stmt = $conn->query("SELECT * FROM rental");
$rentals = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une Location</title>
    <style>
body {
    font-family: Arial, sans-serif;
    background: linear-gradient(to bottom, #f5f5f5, #e9ecef);
    color: #333;
    margin: 0;
    padding: 40px;
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

header {
    background-color: #333;
    color: #fff;
    text-align: center;
    padding: 20px 0;
}

.container {
    width: 80%;
    margin: 20px auto;
}

h2 {
    color: #343a40;
    margin-bottom: 40px;
	margin-top:150px;
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

th,
td {
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

form input[type="text"],
form input[type="date"] {
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
    margin: 0 10px;
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
        <h2>Liste des Locations Existants</h2>
        <table>
            <tr>
			    <th>LocationID</th>
                <th>Date de Location</th>
                <th>Date de Début</th>
                <th>Date de Fin</th>
                <th>Type de Location</th>
                <th>Immatriculation</th>
                <th>ID Client</th>
            </tr>
            <!-- Affichage des locations existantes -->
            <?php foreach ($rentals as $rental): ?>
                <tr>
				    <td><?php echo $rental['rentalID']; ?></td>
                    <td><?php echo $rental['locDate']; ?></td>
                    <td><?php echo $rental['sDate']; ?></td>
                    <td><?php echo $rental['eDate']; ?></td>
                    <td><?php echo $rental['rentalType']; ?></td>
                    <td><?php echo $rental['immat']; ?></td>
                    <td><?php echo $rental['idClient']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </section>

    <div class="form-container">
        <h2 style="margin-top: 40px;">Ajouter une Location</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <label for="locDate">Date de Location :</label>
            <input type="date" name="locDate" required><br><br>

            <label for="sDate">Date de Début :</label>
            <input type="date" name="sDate" required><br><br>

            <label for="eDate">Date de Fin :</label>
            <input type="date" name="eDate" required><br><br>

            <label for="rentalType">Type de Location :</label>
            <input type="text" name="rentalType" placeholder="ND || WD" required><br><br>

            <label for="immat">Immatriculation :</label>
            <input type="text" name="immat" placeholder="000012" required><br><br>

            <label for="idClient">Identifiant Client:</label>
            <input type="text" name="idClient" placeholder="000013"required><br><br>

            <input type="submit" name="submit" value="Ajouter la Location">
        </form>
    </div>

    <!-- Bouton pour accéder à updateprice.php -->
    <div class="button-container">
        
        <div class="update-button">
<a href="updatereturndate.php" style="margin-left: 10px;">
    <button class="theme-button">Modifier la date de retour</button>
    </a>
        </div>
    </div>
</body>
</html>
