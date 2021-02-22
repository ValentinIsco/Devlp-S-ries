<?php
/*
Si la valeur search de la méthode GET existe alors affiche la page show.php
*/
if (isset($_GET["search"])) {
  require "views/show.php";
}
/*
Sinon affiche la page home.php
*/
else {
  require "views/home.php";
}
