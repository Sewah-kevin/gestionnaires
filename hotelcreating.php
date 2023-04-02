<body>
    <div style="margin-left:600px; margin-top:100px;">
    <h1 style="color: #333; font-family: Arial, sans-serif;">Nouvel Hotel</h1>
    <form method="post">
        <label for="name_hotel" style="display: block; margin-bottom: 10px; font-family: Arial, sans-serif;">Nom d'Hotel :</label>
        <input type="text" id="name_hotel" name="name_hotel" required style="padding: 5px; border: 1px solid #ccc; border-radius: 3px; font-size: 16px; font-family: Arial, sans-serif;width: 300px;"><br>

        <label for="adress_hotel" style="display: block; margin-bottom: 10px; font-family: Arial, sans-serif;">Adresse d'Hotel :</label>
        <input type="text" id="adress_hotel" name="adress_hotel" required style="padding: 5px; border: 1px solid #ccc; border-radius: 3px; font-size: 16px; font-family: Arial, sans-serif;width: 300px;"><br>

        <label for="telephone_hotel" style="display: block; margin-bottom: 10px; font-family: Arial, sans-serif;">Téléphone Hotel :</label>
        <input type="text" id="telephone_hotel" name="telephone_hotel" required style="padding: 5px; border: 1px solid #ccc; border-radius: 3px; font-size: 16px; font-family: Arial, sans-serif;width: 300px;"><br>

        <input type="submit" value="Ajouter l'hôtel" style="background-color: #007bff; color: #fff; padding: 10px 20px; border: none; border-radius: 3px; font-size: 16px; font-family: Arial, sans-serif;margin-top:30px;">

        <a href="index.php?listeHotel"><em class="fa fa-bed">&nbsp;</em>
                    Voir Liste
        </a>
    </form>
</div>
</body>

<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotelms";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}

// Vérification si le formulaire est soumis
if($_SERVER["REQUEST_METHOD"] == "POST") {

    $success_message="";

    // Validation du nom de l'hôtel
    $name_hotel = trim($_POST["name_hotel"]);
    if(empty($name_hotel)) {
        $name_hotel_err = "Veuillez saisir le nom de l'hôtel.";
    } else {
        $name_hotel = htmlspecialchars($name_hotel);
    }

    // Validation de l'adresse de l'hôtel
    $adress_hotel = trim($_POST["adress_hotel"]);
    if(empty($adress_hotel)) {
        $adress_hotel_err = "Veuillez saisir l'adresse de l'hôtel.";
    } else {
        $adress_hotel = htmlspecialchars($adress_hotel);
    }

    // Validation du numéro de téléphone de l'hôtel
    $telephone_hotel = trim($_POST["telephone_hotel"]);
    if(empty($telephone_hotel)) {
        $telephone_hotel_err = "Veuillez saisir le numéro de téléphone de l'hôtel.";
    } else {
        $telephone_hotel = htmlspecialchars($telephone_hotel);
    }
    

    // Si aucune erreur de validation n'est survenue, on insère les données dans la base de données
    if(empty($name_hotel_err) && empty($adress_hotel_err) && empty($telephone_hotel_err)) {
        try {
            $sql = "INSERT INTO hotel VALUES (NULL, :name_hotel, :adress_hotel, :telephone_hotel)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":name_hotel", $name_hotel);
            $stmt->bindParam(":adress_hotel", $adress_hotel);
            $stmt->bindParam(":telephone_hotel", $telephone_hotel);
            $stmt->execute();
            $success_message = "L'hôtel a été ajouté avec succès !";
        } catch(PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }

    // Fermeture de la connexion à la base de données
    $conn = null;
}
?>


