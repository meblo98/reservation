<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Include config file
    require_once "config.php";
    
    // Prepare a select statement
    $sql = "SELECT *
    FROM billet
    INNER JOIN billet ON billet.id_vol = vol.id_vol,
    INNER JOIN client ON billet.id_client = client.id_client WHERE id_bilet = ?";
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
                $numero_billet = $row["numero_billet"];
                $prix = $row["prix"];
                $classe = $row["classe"];
                $prenom = $row["prenom"];
                $nom = $row["nom"];
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="mt-5 mb-3">Detail</h1>
                    <div class="form-group">
                        <label>Numero billet</label>
                        <p><b><?php echo $row["numero_billet"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Titre</label>
                        <p><b><?php echo $row["prix"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Categorie</label>
                        <p><b><?php echo $row["classe"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <p><b><?php echo $row["prenom"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Date de création</label>
                        <p><b><?php echo $row["nom"]; ?></b></p>
                    </div>
                    <p>
                        <a href="index.php" class="btn btn-primary">Back</a>
                        <?php
                        echo '<a href="modif_billet.php?id='. $row['id_bilet'] .'" class="btn btn-primary "><span class="fa fa-pencil"></span>modifier</a>';
                        echo '<a <a href="sup_billet.php?id='. $row['idbilet'] .'"  class="btn btn-danger"><span class="fa fa-trash"></span>Supprimer</a>';
                        ?>
                    </p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>