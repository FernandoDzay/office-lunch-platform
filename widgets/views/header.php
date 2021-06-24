<?php

  use App\core\Application;

  $data = Application::$app->HeaderFunctions->getHeaderData();

?>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">Home</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="/login">login</a>
        <a class="nav-link active" aria-current="page" href="/register">register</a>
        <a class="nav-link active" aria-current="page" href="/insert-food-of-the-day">Insertar comidas del día</a>
        <a class="nav-link active" aria-current="page" href="/insert-extras">Insertar Extras</a>
        <a class="nav-link active" aria-current="page" href="/groups">Groups</a>
        <!-- <a class="nav-link" href="#">Pricing</a> -->
        <!-- <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a> -->
      </div>
    </div>
  </div>
  <span>Hola <?= $data['username'] ?>!</span>
</nav>