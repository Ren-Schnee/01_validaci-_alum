<?php
include('../includes/header.php');
include('../includes/navbar.php');
?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center mb-4">Registre</h2>

            <form
                action="../controllers/register_controller.php"
                method="POST"
                class="border p-4 bg-light"
                enctype="multipart/form-data">
                <!-- basic per enviar fitxers al servidor -->

                <div class="mb-3">
                    <label for="name" class="form-label">Nom i cognoms</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="username" class="form-label">Nom d'usuari</label>
                    <input
                        type="text"
                        name="username"
                        class="form-control"
                        placeholder="Només números i lletres minúscules"
                        required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Contrasenya</label>
                    <input
                        type="password"
                        name="pass1"
                        class="form-control"
                        placeholder="Introdueix la contrasenya"
                        required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Repeteix contrasenya</label>
                    <input
                        type="password"
                        name="pass2"
                        class="form-control"
                        placeholder="Introdueix la contrasenya"
                        required>
                </div>

                <div class="mb-3">
                    <label for="mail" class="form-label">Correu electrònic</label>
                    <input type="text" name="mail" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Imatge de perfil</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Envia</button>
                </div>

                <!-- control error -->
                <div class="mt-3 text-center">
                    <p class="form-label mb-3 text-danger fw-bold fs-6">
                        mostra errors
                    </p>

                    <p class="form-label mb-3 text-success fw-bold fs-6">
                       mosrta exits
                    </p>
                </div>

            </form>
        </div>
    </div>
</div>

<?php
include('../includes/footer.php');
?>