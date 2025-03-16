<?php
// Inclure le fichier de connexion à la base de données
require_once 'connectdb.php';

// Récupérer tous les clients depuis la base de données
$stmt = $conn->query("SELECT * FROM Client");
$clients = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un Nouveau Client</title>
    <style>
 body {
    font-family: Arial, sans-serif;
    background: linear-gradient(to bottom, #f5f5f5, #e9ecef); /* Dégradé de couleur */
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

h2 {
    color: #343a40;
    margin-bottom: 40px; /* Espacement supplémentaire en bas */
	margin-top:150px;
    text-align: center;
    font-size: 36px; /* Taille de police plus grande */
    text-transform: uppercase; /* Mettre en majuscules */
    letter-spacing: 2px; /* Espacement des lettres */
    font-weight: bold; /* Gras */
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1); /* Ombre du texte */
}

table {
    width: 90%;
    margin: 20px auto;
    border-collapse: separate;
    border-spacing: 0;
    background-color: #fff;
    border-radius: 20px; /* Coins arrondis plus prononcés */
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); /* Ombre douce */
}

th, td {
    padding: 16px;
    text-align: left;
    border-bottom: 1px solid #ccc; /* Bordure basse pour les lignes */
}

th {
    background-color: #333;
    color: #fff;
    border-radius: 20px 20px 0 0;
}

/* Animation de survol pour les lignes du tableau */
tr:hover {
    background-color: rgba(0, 0, 0, 0.05); /* Fond légèrement coloré au survol */
    transition: background-color 0.3s ease;
}

form {
    background-color: #f8f9fa;
    padding: 40px; /* Augmentez l'espacement intérieur pour un look plus aéré */
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    width: 60%;
    margin: 0 auto; /* Centrer le formulaire horizontalement */
    text-align: center; /* Centrer le contenu à l'intérieur du formulaire */
}

form label {
    display: block;
    margin-bottom: 16px;
    color: #343a40;
    font-weight: bold; /* Texte en gras pour les étiquettes */
}

form input[type="text"] {
    width: 100%;
    padding: 12px;
    margin-bottom: 24px; /* Espacement supplémentaire entre les champs */
    box-sizing: border-box;
    border: 1px solid #ddd;
    border-radius: 4px;
    transition: border-color 0.3s ease; /* Animation de transition pour la bordure */
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

.button-container {
    background-color: #D3D3D3; /* Couleur de fond gris clair */
    border-radius: 10px; /* Coins arrondis */
    padding: 30px; /* Espacement intérieur */
    margin-top: 40px; /* Espacement depuis le formulaire */
    text-align: center; /* Centrer les boutons horizontalement */
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1); /* Ombre légère */
}

.theme-button {
    background-color: #343a40;
    color: #fff;
    border: none;
    padding: 16px 24px; /* Taille des boutons */
    border-radius: 4px;
    cursor: pointer;
    text-decoration: none;
    transition: background-color 0.3s ease;
    font-size: 16px; /* Taille du texte */
    margin: 0 auto; /* Centrer les boutons horizontalement */
    display: block; /* Afficher en tant que bloc pour occuper toute la largeur */
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
        <h2>Liste des Clients Existants</h2>
        <table>
            <tr>
                <th>ID Client</th>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Téléphone</th>
                <th>Rue</th>
                <th>Ville</th>
                <th>Profession</th>
            </tr>
            <?php foreach ($clients as $client): ?>
                <tr>
                    <td><?php echo $client['idClient']; ?></td>
                    <td><?php echo $client['fName']; ?></td>
                    <td><?php echo $client['lName']; ?></td>
                    <td><?php echo $client['phone']; ?></td>
                    <td><?php echo $client['street']; ?></td>
                    <td><?php echo $client['city']; ?></td>
                    <td><?php echo $client['job']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </section>
    <h2 style="margin-top: 40px;">Ajouter un Client</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <!-- Formulaire d'ajout de client -->
        <label for="idClient">Identifiant Client :</label>
        <input type="text" name="idClient" placeholder="000011" required><br><br>

        <label for="fName">Prénom :</label>
        <input type="text" name="fName" placeholder="Sami Ramzi" required><br><br>

        <label for="lName">Nom :</label>
        <input type="text" name="lName" placeholder="REZIG" required><br><br>

        <label for="phone">Téléphone :</label>
        <input type="text" name="phone" placeholder="0541884803" ><br><br>

        <label for="street">Rue :</label>
        <input type="text" name="street" placeholder="14 Rue Ferradj et Zabani Rouiba "><br><br>

        <label for="city">Ville :</label>
        <input type="text" name="city" placeholder="Alger"><br><br>

        <label for="job">Profession :</label>
        <input type="text" name="job" placeholder="Etudiant" required><br><br>

        <input type="submit" name="submit" value="Ajouter le Client">
    </form>

    <?php
    // Traitement de l'ajout de client ici
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
        // Récupérer les données du formulaire
        $idClient = $_POST['idClient'];
        $fName = $_POST['fName'];
        $lName = $_POST['lName'];
        $phone = $_POST['phone'];
        $street = $_POST['street'];
        $city = $_POST['city'];
        $job = $_POST['job'];

        // Préparation et exécution de la requête SQL pour ajouter le client
        $stmt = $conn->prepare("INSERT INTO Client (idClient, fName, lName, phone, street, city, job) 
                                VALUES (:idClient, :fName, :lName, :phone, :street, :city, :job)");
        $stmt->bindParam(':idClient', $idClient);
        $stmt->bindParam(':fName', $fName);
        $stmt->bindParam(':lName', $lName);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':street', $street);
        $stmt->bindParam(':city', $city);
        $stmt->bindParam(':job', $job);

        if ($stmt->execute()) {
            // Affichage du message de succès après l'ajout du client
            echo "<p style='color: green;'>Client ajouté avec succès !</p>";
            // Utilisation de JavaScript pour recharger la page après 1 seconde (1000 millisecondes)
            echo "<script>setTimeout(() => { location.reload(); }, 1000);</script>";
        } else {
            // Affichage du message d'erreur en cas d'échec de l'ajout du client
            echo "<p style='color: red;'>Erreur lors de l'ajout du client.</p>";
        }
    }
    
    ?>
</body>
</html>
