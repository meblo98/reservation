
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acueil</title>
    <script src="script.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    
<div class="main-container">
        <div class="header">
            <a href="#" id="logo"><img src="images/2.png" alt=""></a>
            <nav class="navbar">
                <a href="#">home</a>
                <a href="#">reservation</a>
                <a href="#">gallery</a>
                <a href="#">about</a>
                <a href="#">blog</a>
                <a href="#">contact</a>
            </nav>

            <div class="icons">
                <a href="#" id="login-form" class="fas fa-user"></a>
                <a href="#" id="menu-bars" class="fas fa-bars"></a>
            </div>


            <div class="myform">
                <h2>Login here</h2>
                <input type="text" placeholder="user name">
                <input type="password" placeholder="enter pass">
            </div>
        </div>
        <div class="background-text">

            <div class="main"></div>
        </div>
    </div>
    <div class="container">
        <form class="form">
            
            <p class="title">Ajouter un billet </p>
            <p class="message">Reserve maintenant pour profiter du meilleur des voyages </p>
            <div class="flex">
            <label>
            <input class="input" type="text" placeholder="" required="">
            <span><i class="fa-solid fa-location-dot"></i> Lieu de dapart</span>
            </label>

            <label>
            <input class="input" type="text" placeholder="" required="">
            <span><i class="fa-solid fa-location-dot"></i> Destination</span>
            </label>
            </div>  
            
            <label>
                <input class="input" type="date" placeholder="" required="">
                <span><i class="fa-solid fa-calendar"></i> Date Reservation</span>
            </label> 
        
            <label>
                <input class="input" type="password" placeholder="" required="">
                <span>Password</span>
            </label>
            <label>
                <input class="input" type="password" placeholder="" required="">
                <span>Confirm password</span>
            </label>
            <button class="submit">Reserver</button>
            <p class="signin"><a href="index.php">Annuler</a> </p>
        </form>

        <div class="photo">
            <img src="images/1.png" alt="image" >
        </div>
    </div>



</body>
</html>