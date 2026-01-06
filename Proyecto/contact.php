<?php 
    require_once __DIR__ . '/config.php';
    include PROJECT_ROOT . '/includes/head.php';
?>
<body data-shorcut-listen="true">
    <?php include PROJECT_ROOT . '/includes/navbar.php';?>
    <div class="divider"></div>
    <!-- Contacto -->
    <div class="container d-flex justify-content-center align-items-center"> 
        <div class="shadow-sm p-4">
            <h3 class="text-center mb-3">Contáctanos</h3>
            <br>
            <form action="contact.php" method="post">
                <div class="mb-3">
                    <label for="full-name" class="form-label mb-2">Nombre completo:</label>
                    <input type="text" class="form-control" name="full-name" placeholder="Nombre completo" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label mb-2">Email:</label>
                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                </div>
                <div class="mb-3">
                    <label for="matter" class="form-label mb-2">Asunto:</label>
                    <input type="text" class="form-control" name="matter" placeholder="Asunto" rows="5" maxlength="500" required>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label mb-2">Mensaje:</label>
                    <textarea type="text" class="form-control" name="message" placeholder="Por favor, díganos el motivo por el cual se comunica con nosotros." rows="5" maxlength="500" required></textarea>
                </div>
                <button class="btn btn-primary w-100 my-2 py-2" type="submit">
                    <a href="../register/register.php" type="submit" style="text-decoration: none; color: white;">
                    Enviar mensaje
                    </a>
                </button>
            </form>
        </div>
    </div>
    <!-- Footer -->
    <?php include PROJECT_ROOT . '/includes/footer.php';?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>