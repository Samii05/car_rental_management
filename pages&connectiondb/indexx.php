<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion de Location de Voitures</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #fff;
            color: #fff;
            overflow-x: hidden;
            transition: background-color 0.3s ease;
        }

        /* Navigation */
        nav {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: #424242;
            padding: 30px 0;
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

        /* Header */
        header {
            background-color: #616161;
            color: #fff;
            text-align: center;
            padding: 65px 0; /* Réduit pour moins d'espace */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: padding 0.3s ease;
        }

        h1 {
            font-size: 25px; /* Taille réduite */
			margin-top:75px;
            margin-bottom: 10px;
            animation: animate__fadeInDown 1s ease forwards;
            z-index: 2;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        /* Main Content */
        section {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: #fff;
            text-align: center;
            position: relative;
            overflow: hidden;
            padding-top: 60px; /* Réduit pour aligner les sections */
        }

        .carousel {
            width: 100%;
            height: calc(150vh - 60px); /* Allongé pour occuper plus d'espace */
            overflow: hidden;
            position: absolute;
            top: 0;
            left: 0;
        }

        .carousel img {
            width: 100%;
            height: auto; /* Change to auto to maintain aspect ratio */
            object-fit: cover; /* Ensures the image covers the container */
        }

        h2 {
            font-family: 'Georgia', serif;
            font-size: 30px;
            margin-bottom: 20px;
            animation: animate__fadeInUp 1s ease forwards;
            padding: 40px 20px;
        }

        p {
            font-family: 'Georgia', serif;
            font-size: 16px;
            animation: animate__fadeInUp 1s ease forwards;
        }

        .cta-button {
            display: inline-block;
            padding: 16px 32px;
            border-radius: 50px;
            background-color: #333;
            color: #fff;
            text-decoration: none;
            font-size: 18px;
            transition: background-color 0.3s ease;
            animation: animate__fadeInUp 1s ease forwards;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        }

        .cta-button:hover {
            background-color: #555;
        }

        /* Parallax Section */
        .parallax {
            padding: 160px 20px;
            text-align: center;
            background-color: #BDBDBDBD; /* Change background to white */
            background-size: cover;
            background-attachment: fixed;
            color: #000; /* Change text color to black */
            overflow: hidden;
            position: relative;
        }

        footer {
            background-color: #424242;
            color: #fff;
            text-align: center;
            padding: 40px 0;
            box-shadow: 0 -4px 8px rgba(0, 0, 0, 0.1);
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

    <header>
        <h1 class="animate__animated animate__fadeInDown">Gestion de Location de Voitures</h1>
    </header>

    <section>
        <div class="carousel">
            <div><img src="https://images.pexels.com/photos/6418840/pexels-photo-6418840.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="Image 1"></div>
            <div><img src="https://images.pexels.com/photos/3311574/pexels-photo-3311574.jpeg" alt="Image 2"></div>
            <div><img src="https://images.pexels.com/photos/17217569/pexels-photo-17217569/free-photo-of-voiture-vehicule-chaussee-urbain.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="Image 3"></div>
            <div><img src="https://images.pexels.com/photos/19911371/pexels-photo-19911371/free-photo-of-building-batiment-immeuble-voiture.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="Image 4"></div>
        </div>
        <div>
            <h2 class="animate__animated animate__fadeInUp">Bienvenue sur notre plateforme de location de voitures !</h2>
            <p class="animate__animated animate__fadeInUp">Découvrez nos services et ajoutez de nouveaux clients, marques, modèles et voitures.</p>
            <a href="#features" class="cta-button animate__animated animate__fadeInUp">En savoir plus</a>
        </div>
    </section>

    <div class="parallax" id="features">
        <h2>Explorez notre gamme de voitures de location</h2>
        <p>Parcourez nos modèles de voitures et trouvez celle qui vous convient le mieux.</p>
        <a href="selectcarb.php" class="cta-button">Sélectionner des Voitures selon Marque/Modèle</a>
    </div>

    <footer>
        <p>&copy; 2024 Gestion de Location de Voitures</p>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.carousel').slick({
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 3000,
                dots: false,
                arrows: false,
                fade: true,
                cssEase: 'linear'
            });

            $('.cta-button').hover(function() {
                $(this).toggleClass('animate__bounce');
            });
        });
    </script>
</body>
</html>
