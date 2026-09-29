<?php
session_start();
include("../functions/user_functions.php");

// userLogged();

$text = [];

include("../includes/header.php");
include("../includes/navbar_app.php");

$cart = $_SESSION['cart'] ?? [];

$total = 0;

?>

<div class="container mt-5">

    <pre>
    <?php print_r($_SESSION['cart']); ?>
    </pre>

    <h2 class="mb-4"><?= $text['shpoingCart'] ?></h2>

    <table class="table table-striped align-middle">

        <thead class="table-dark">
            <tr>
                <th><?= $text['product'] ?></th>
                <th><?= $text['price'] ?></th>
                <th class="text-center"><?= $text['quantity'] ?></th>
                <th><?= $text['cartSubtotal'] ?></th>
            </tr>
        </thead>

        <tbody>



            <tr>

                <td>
                    <div class="d-flex align-items-center">

                        <img
                            src="#"
                            alt="Nom de la imatge"
                            class="rounded me-3"
                            style="width: 70px; height: 70px; object-fit: cover;">

                        <div>
                            <strong>
                                Nom del producte
                            </strong>

                            <p class="text-muted small mb-0">
                                Descripcio del producte
                            </p>
                        </div>

                    </div>
                </td>

                <td>
                    50 €
                </td>

                <td class="text-center">

                    <a
                        href="#"
                        class="btn btn-outline-danger btn-sm">
                        -
                    </a>

                    <span class="mx-3">
                        2
                    </span>

                    <a
                        href="#"
                        class="btn btn-outline-success btn-sm">
                        +
                    </a>

                </td>

                <td>
                    100 €
                </td>

            </tr>



        </tbody>

        <tfoot>
            <tr class="table-light">
                <th colspan="3" class="text-end">
                    Total del carret
                </th>

                <th>
                    100 €
                </th>
            </tr>
        </tfoot>

    </table>

    <div class="d-flex justify-content-end mt-4">

        <a
            href="#"
            class="btn btn-success btn-lg">

            Confirmar compra

        </a>

    </div>

</div>


<?php
include("../includes/footer.php");
?>