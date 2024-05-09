<?php
// Include the required files
include_once "c:/wamp64/www/forum/commentaire/controller/commentaireC.php";
include_once "c:/wamp64/www/forum/commentaire/model/commentaire.php";

$error = "";
// Create Commentaire
$commentaire = null;

// Create an instance of the controller
$commentaireC = new CommentaireC();

// Check if all required fields are set and not empty
if (
    isset($_POST["auteur"]) &&
    isset($_POST["contenu"]) &&
    isset($_GET["id_forum"]) // Ensure id_forum is set in the URL parameters
) {
    // Retrieve id_forum from the URL parameters
    $id_forum = $_GET["id_forum"];

    // Create a new Commentaire object with the provided data
    $new_commentaire = new Commentaire($id_forum, $_POST["auteur"], $_POST["contenu"]);

    // Add the new commentaire to the database
    $commentaireC->addCommentaire($new_commentaire);

    // Redirect to the appropriate page after adding the comment
    header('Location:http://localhost/forum/commentaire/view/back/listCommentaire.php');
}?>

<!DOCTYPE html>
<html lang="en">
  

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>CreaNova  Template</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="../front/css/fontawesome.css">
    <link rel="stylesheet" href="../front/css/pablo.css">
    <link rel="stylesheet" href="../front/css/owl.css">
    <link rel="stylesheet" href="../front/css/lightbox.css">
<!--

TemplateMo 569 Edu Meeting

https://templatemo.com/tm-569-edu-meeting

-->
  </head>

<body>
  

  <!-- Sub Header -->
  <div class="sub-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-sm-8">
          <div class="left-content">
            <p>This is an educational <em>HTML CSS</em> template by TemplateMo website.</p>
          </div>
        </div>
        <div class="col-lg-4 col-sm-4">
          <div class="right-icons">
            <ul>
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-behance"></i></a></li>
              <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <nav class="main-nav">
                      <!-- ***** Logo Start ***** -->
                      <a href="index.html" class="logo">
                          CreaNova
                      </a>
                      <!-- ***** Logo End ***** -->
                      <!-- ***** Menu Start ***** -->
                      <ul class="nav">
                          <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                          <li class="scroll-to-section"><a href="#ressource">ressource </a></li>
                          <li class="has-sub">
                              <a href="#commande">commande</a>
                              <ul class="sub-menu">
                                  <li><a href="meetings.html">Upcoming Meetings</a></li>
                                  <li><a href="meeting-details.html">Meeting Details</a></li>
                              </ul>
                          </li>
                          <li class="scroll-to-section"><a href="#formation">formation</a></li> 
                          <li class="scroll-to-section"><a href="#evenement">evenement</a></li> 
                          <li class="has-sub">
                            <a href="javascript:void(0)">Forum</a>
                            <ul class="sub-menu">
                            <li><a  href="#forum">forum</a></li> 
                            <li><a  href="#commentaire">commentaire</a></li> 
                    </ul>
                                
                      <a class='menu-trigger'>
                          <span>Menu</span>
                      </a>
                      <!-- ***** Menu End ***** -->
                  </nav>
              </div>
          </div>
      </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <!-- ***** Main Banner Area Start ***** -->
  <section class="section main-banner" id="top" data-section="section1">
      <video autoplay muted loop id="bg-video">
          <source src="../front/images/course-video.mp4" type="video/mp4" />
      </video>

      <div class="video-overlay header-text">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="caption">
              <h6>Hello Students</h6>
              <h2>Welcome to Education</h2>
              <p>This is an CreaNova  provided by  a group of young people by <a rel="nofollow" href="https://esprit.tn" target="_blank">esprit</a>.</p>
              <div class="main-button-red">
                  <div class="scroll-to-section"><a href="#commentaire">Join Us Now!</a></div>
              </div>
          </div>
              </div>
            </div>
          </div>
      </div>
  </section>
  <!-- ***** Main Banner Area End ***** -->

  <section class="commentaire" id="commentaire">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 align-self-center">
                <div class="row">
                    <div class="col-lg-12">
                      <form id="commentaire" method="post">
                       
                    
                    
                        <!-- Other form fields -->
                        <div class="col-lg-4">
                            <fieldset>
                                <input name="auteur" type="text" id="auteur" placeholder="Auteur...">
                                <div id="erreurauteur" style="color: red"></div>
                            </fieldset>
                        </div>
                        <div class="col-lg-4">  
                            <fieldset>
                                <input name="contenu" type="textarea" id="contenu" placeholder="YOUR contenu...*">
                                <div id="erreurcontenu" style="color: red"></div>
                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <fieldset>
                                <button type="submit" class="button" onclick="return validercommentaire()">Save</button>
                            </fieldset>
                        </div>
                    
                    
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="../js/commentaire.js"></script>

            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="right-info">
            <ul>
              <li>
                <h6>Phone Number</h6>
                <span>010-020-0340</span>
              </li>
              <li>
                <h6>Email Address</h6>
                <span>CreaNova.esprit.tn</span>
              </li>
              <li>
                <h6>Street Address</h6>
                <span>Rio de Janeiro - RJ, 22795-008, Brazil</span>
              </li>
              <li>
                <h6>Website URL</h6>
                <span>www.Creanova.tn</span>
              </li>
              
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="footer">
      <p>Copyright © 2022 CreaNova Co., Ltd. All Rights Reserved. 
          <br>Design: <a href="https://templatemo.com" target="_parent" title="free css templates">TemplateMo</a></p>
    </div>
  </section>

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  
    

</body>

</body>
</html>