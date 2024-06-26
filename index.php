<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Define the character encoding for the HTML document -->
    <meta charset="UTF-8">

    <!-- Set the viewport to control the layout on different devices (width and initial scale) -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="indexstyle.css" .css>

    <!-- Set the title of the webpage -->
    <title>DSI Tutoring | Home Page</title>


</head>

<style>
    .hero-wrapper {

        display: flex;
        justify-content: space-between;
        padding: auto;
      
    }

    .content {
        flex-direction: column;
        justify-content: flex-end;
        align-items: flex-start;
        max-width: 46%;
        display: flex;
        justify-content: left;
        float: left;
        padding-right: 100px;
        padding-top: 65px;
        font-size: 16px;
        
    }

    .picture-content img {
        height: 200px;
        display: flex;
        justify-content: right;
        margin-right: 200px;
        float: right;
        margin-top: 40px;
        padding-left: 160px;
        height: 40vh;
        padding-bottom: 40px;
    }


    .btn-primary {
      padding: 10px;
            background-color: #4b1290;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            /* Make the button fill the container horizontally */
            width: 100%;
            max-width: 200px;

            /* Center the button vertically in the container */
            align-self: left;
    }

    .btn-primary:hover {
        background-color: #360f6f;
    }
    
        br {
        /* Display the <br> element as a white line */
        display: block;
        height: 2px;
        background-color: #fff;
        margin: 10px 0;
    }
    h1{
        text-align: center;
    }

.banner {
    
    width: 100%;
    height: 90vh;
    background-image: linear-gradient(rgba(2, 1, 3, 0.69),rgba(19, 7, 36, 0.94)), url(home.page.pic/Header.jpeg);
    background-size: cover;
    background-position: center;
}
#myBtn {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  font-size: 18px;
  border: NONE;
  outline: none;
  background-color:transparent;
  color: white;
  cursor: pointer;
  padding: 15px;
  border-radius: 900PX;
}
#myBtn:hover{
    color: #fff;
}

</style>

<body>
    
<button onclick="topFunction()" id="myBtn" title="Go to top"><i class='fas fa-arrow-alt-circle-up' style='font-size:48px;color:#4b1290'></i></button>
<script>
// Get the button
let mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>
    <!-- Display the header with the logo, navigation menu, and search bar -->
    <header>
        <div class="logo">
            <img src="home.page.pic\logo.png" alt="Logo">
        </div>

        <nav>
            <a href="index.php" target="_self">HOME</a>
            <div class="dropdown">
                <a href="#">SUBJECTS</a>
                <div class="dropdown-content">
                    <a href="register.php" target="_self">DEVELOPMENT SOFTWARE 1</a>
                    <a href="register.php" target="_self">DEVELOPMENT SOFTWARE 2</a>
                    <a href="register.php" target="_self">TECHNICAL PROGRAMMING 1</a>
                </div>
            </div>
            <a href="contact.php" target="_self">CONTACT</a>
            <a href="login.php" target="_self">LOGIN</a>
        </nav>
        <button onclick="window.location.href='register.php'">GET A TUTOR</button>
    </header>

<div class="banner">
    <main>
        <h1>Welcome to DSI Tutoring Homepage </h1>
        <p style="text-align: center;">Here you will find information about our services, and contact details.</p>
        <br>

    </main>
    </div>
        <br>
        <div class="hero-wrapper" id="about">

        <div class="content">
            <h1>About my tutorials!</h1>
            <p>The classes are conducted in a dynamic and interactive manner,<br>
             providing personalized attention and support to each student. <br>
             The sessions include live lectures, group discussions, <br>
             hands-on activities, and coding exercises to ensure a comprehensive <br>
              understanding of the topics</p>
            <a href="contact.php" class="btn-primary">ENQUIRE NOW</a>
        </div>
        <div class="picture-content">
            <img src="home.page.pic/kgaugelo.png"  alt="">
        </div>
    </div>

    <br>
    <br>
    <div class="hero-wrapper">
        <div class="picture-content">
            <img src="vendors/images/banner-img.png"  alt="">
        </div>
        <div class="content">
            <h1>About my tutorials!</h1>
            <p>TThe classes aim to make learning engaging and  accessible, catering to students of all levels. Kgaugelo Mmakola is committed to guiding students through their learning journey, helping them develop critical thinking skills and succeed in their academic endeavors.</p>
            <a href="contact.php" class="btn-primary" >ENQUIRE NOW</a>
        </div>
        
    </div>

      
    <footer>
        <hr>
        <div class="CopyContainer">
            <div class="copyright">
                <ul class="social-media">
                    <li><a class="sos-media" href="#facebook"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a class="sos-media" href="#twitter"><i class="fab fa-twitter"></i></a></li>
                    <li><a class="sos-media" href="#linkedin"><i class="fab fa-linkedin-in"></i></a></li>
                    <li><a class="sos-media" href="#instagram"><i class="fab fa-instagram"></i></a></li>
                </ul>
                <a href="">&#169 Digital Service Invetion 2024</a>
            </div>
        </div>
    </footer>


</body>

</html>