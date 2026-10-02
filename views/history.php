<?php

// userLogged();

$text = [];

include("../includes/header.php");
include("../includes/navbar_app.php");

$userHistory = $_SESSION['user_history'] ?? [];

?>

<div class="container mt-5">

    <h2 class="text-center mb-4">
        Order History
    </h2>

    <?php if (empty($userHistory)) : ?>

        <div class="alert alert-warning text-center">
            You don't have any orders yet.
        </div>

    <?php else : ?>

        <?php foreach ($userHistory as $orderId => $order) : ?>

            <?php $orderTotal=0; ?>

            <div class="mb-5">

                <h5>
                    Purchase date: <?= $order['date'] ?>
                </h5>
                <h5>
                    User id: <?= $order['user_id'] ?> | User login: <?= $_SESSION['user']['name'] ?>
                </h5>

                <table class="table table-striped align-middle">

                    <thead class="table-dark">
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th class="text-center">Quantity</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php foreach ($order['cart'] as $product) : ?>

                            <?php
                            $subtotal = $product['price'] * $product['qty'];
                            $orderTotal = $orderTotal + $subtotal;
                            ?>

                            <tr>

                                <td>
                                    <?= $product['name'] ?>
                                </td>

                                <td>
                                    <?= number_format($product['price'], 2) ?> €
                                </td>

                                <td class="text-center">
                                    <?= $product['qty'] ?>
                                </td>

                                <td>
                                    <?= number_format($subtotal, 2) ?> €
                                </td>

                            </tr>

                        <?php endforeach; ?>

                    </tbody>

                    <tfoot>
                        <tr class="table-secondary">
                            <th colspan="3" class="text-end">
                                Total:
                            </th>

                            <th>
                                <?= number_format($orderTotal, 2) ?> €
                            </th>
                        </tr>
                    </tfoot>

                </table>

                <div class="col-12 d-flex justify-content-center">
                        <form action="../controllers/PDF_controller.php" method="POST">
                            <input type="hidden" name="order" value="<?= $orderId ?>">
                            <input class="btn btn-success" type="submit" value="Generar Factura PDF">
                        </form>
                </div>

            </div>

        <?php

        echo "<pre>";
        print_r($userHistory);
        echo "</pre>";

    endforeach; ?>

    <?php endif; ?>

</div>

<?php

include("../includes/footer.php");

?>