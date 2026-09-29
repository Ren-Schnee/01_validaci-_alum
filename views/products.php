<?php
include("../functions/user_functions.php");
$text = [];

include("../includes/header.php");
include("../includes/navbar_app.php");

/*if ($_SESSION['filterProducts']){
    $products = $_SESSION['filterProducts'];
} else {
    $products = $_SESSION['products'];
}*/

$products = $_SESSION['filterProducts'] ?? $_SESSION['products'];

?>

<div class="text-center vh-50 d-flex flex-column justify-content-center m-5">
    <h1 class="display-3 mb-4"><?= $text['product_list'] ?></h1>
</div>


<div class="container mx-auto mt-3 my-6">
    <div class="bg-light p-4 rounded mb-4 border">
        <!-- Comença el form del filtre de productes -->
        <form action="../controllers/filter_controller.php" method="POST" class="row g-3">
            <div class="col-md-4">
                <!-- Filtre per nom -->
                <label class="form-label">Nom del producte </label>
                <input
                    type="text"
                    name="name"
                    class="form-control"
                    placeholder="Buscar producte">
            </div>


            <div class="col-md-4">
                <!-- Filtre per categoria -->
                <label class="form-label">Categoria</label>

                <select name="category" class="form-select">
                    <option value="">Tores les categories</option>
                    <option value="categoria1">
                        categoria1
                    </option>
                    <option value="categoria2">
                        categoria2
                    </option>
                    <option value="categoria3">
                        categoria3
                    </option>

                </select>

            </div>

            <div class="col-md-4">
                <!-- Filtre per preu maxim -->
                <label class="form-label">Preu</label>

                <input
                    type="number"
                    name="price"
                    class="form-control"
                    step="0.01"
                    placeholder="Preu maxim">
            </div>

            <div class="col-12 d-flex justify-content-center gap-2">
                <button type="submit" class="btn btn-primary">
                    Filtrar
                </button>
                <a href="../controllers/filter_controller.php?delete=1" class="btn btn-secondary">
                    Netejar Filtres
                </a>
            </div>

        </form>
    </div>

    <!-- Comença la llista de productes -->
    <div class="row g-4 mb-4">
        <!-- card de producte -->
        <?php foreach ($products as $product):
        ?>
            <div class="col-md-3 col-sm-6">
                <div class="card bg-light w-100">
                    <div class="card-body">
                        <!-- Nom del producte -->
                        <h5 class="card-title fw-bold">
                            <?= $product['name'] ?>
                        </h5>
                        <!-- imatge -->
                        <img
                            src="../public/images/products/<?= $product['image'] ?>"
                            class="card-img-top"
                            style="height: 200px; object-fit: cover;"
                            alt="<?= $product['name'] ?>">
                        <!-- Descripcio -->
                        <p class="card-text overflow-hidden" style="height:5rem;">
                            <?= $product['description'] ?>
                        </p>
                        <!-- preu -->
                        <p class="fw-bold text-center">
                            <?= $product['price'] ?>
                        </p>
                        <!-- Boto per afegir amb el mètode GET -->
                        <div class="d-flex justify-content-center">
                            <form action="../controllers/add_cart_controller.php" method="POST">
                                <input type="hidden" name="id" value="<?= $product['id'] ?>">

                                <button class="btn btn-primary" type="submit">
                                    <i class="bi bi-cart-plus"></i>
                                    <?= $text['add_to_cart'] ?>
                                </button>
                            </form>

                        </div>>

                    </div>
                </div>
            </div>
        <?php endforeach; ?>



    </div>
</div>

<?php
include("../includes/footer.php");
?>