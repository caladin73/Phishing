<?php

require "autoload.php";

$sandbox = true;
$token = "S=s1:U=94895:E=16a0ddb3a1f:C=162b62a0d40:P=1cd:A=en-devtoken:V=2:H=e59a3207e1254f08803c6721ccfba652";
$guid = "46521e13-f231-4dac-b28e-bc643a2a26d9";

$client = new \Evernote\Client($token, $sandbox, null, null, false);
$noteObject = $client->getNote($guid);
$enml_note = $noteObject->content->toEnml();
$note = htmlspecialchars_decode($enml_note);

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">

    <title>Hello, world!</title>
  </head>
  <body id="top">

    <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i class="fas fa-angle-left"></i></a>

  <?php
    //foreach ($variable as $key => $value) {
      # code...
    //}
  ?>
  <a href="opt1"><i class="fas fa-angle-down"></i> Option nr. 1</a>
  <a href="opt2"><i class="fas fa-angle-down"></i> Option nr. 2</a>
  <a href="opt3"><i class="fas fa-angle-down"></i> Option nr. 3</a>
  <a href="#top"><i class="fas fa-angle-up"></i> To Top</a>
  
</div>

<div class="sidebar">
  <!-- Use any element to open the sidenav -->
  <a href="javascript:void(0)" class="openbtn" onclick="openNav()"><i class="fas fa-bars"></i></a>
</div>

<!-- Add all page content inside this div if you want the side nav to push page content to the right (not used if you only want the sidenav to sit on top of the page -->

<section class="page_content" id="main">
    <div class="hello">
        <h1>Hello, world!</h1>
        <a href="opt2"><h3>Option 1</h3></a>
    </div>
</section>

<div id="main">
  <?php echo $note; ?>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="js/sideNav.js"></script>
  </body>
  
  <footer class="footer">Created by research group, to fool you, for you.</footer>
</html>
