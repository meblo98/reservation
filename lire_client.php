<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Include config file
    require_once "config.php";
    
    // Prepare a select statement
    $sql = "SELECT * FROM client WHERE id_client = ?";
    
    if($stmt = mysqli_prepare($connexion, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        // Set parameters
        $param_id = trim($_GET["id"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                /* Fetch result row as an associative array. Since the result set
                contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                // Retrieve individual field value
                $id_clientt = $row['id_client'];
                $prenom = $row["prenom"];
                $nom = $row["nom"];
                $adresse_email = $row["adresse_email"];
                $telephone = $row["telephone"];
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: error.php");
                exit();
            }
            
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($connexion);
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="mt-5 mb-3">Detail</h1>
                    <div class="form-group">
                        <label>Prenom</label>
                        <p><b><?php echo $row["prenom"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Nom</label>
                        <p><b><?php echo $row["nom"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Numero telephone</label>
                        <p><b><?php echo $row["telephone"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Adresse email</label>
                        <p><b><?php echo $row["adresse_email"]; ?></b></p>
                    </div>
                    <p>
                        <a href="list_client.php" class="btn btn-primary">Back</a>
                        <?php
                        echo '<a href="modif_client.php?id='. $row['id_client'] .'" class="btn btn-primary "><span class="fa fa-pencil"></span>modifier</a>';
                        echo '<a <a href="sup_client.php?id='. $row['id_client'] .'"  class="btn btn-danger"><span class="fa fa-trash"></span>Supprimer</a>';
                        ?>
                    </p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>