<?php
include('../includes/header.php');
include('../includes/navbar.php');

?>
<div class="container-fluid mt-5">

    <h1> Estic a dins l'app</h1>
    <h2> que cal fer per mostrar el nom d'usauri???</h2>
    <p> Usuari: <?= $_SESSION['user_logged']['username'] ?></p>

    <div class="row g-4 mt-2">

        <div class="col-md-6">
            <div class="card" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Hallowed Be Thy Name</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">An item</li>
                    <li class="list-group-item">A second item</li>
                    <li class="list-group-item">A third item</li>
                </ul>
                <div class="card-body">
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">The Trooper</h5>
                    <p class="card-text">Descripcio 2</p>
                    <p class="fw-bold">29.99 €</p>
                </div>
            </div>
        </div>

    </div>
</div>