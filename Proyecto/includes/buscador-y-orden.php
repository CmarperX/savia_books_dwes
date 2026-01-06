<!-- Buscador -->
<div class="container-fluid px-4 mb-4">
        <form action="catalog.php" method="GET" class="row g-3 justify-content-center">
            <!-- Mantenemos la categoría si ya la habiamos seleccionado -->
            <?php if($categoriaFilter): ?>
                <input type="hidden" name="categoria" value="<?= htmlspecialchars($categoriaFilter) ?>">
            <?php endif; ?>

            <div class="col-12 col-md-6">
                <div class="input-group">
                    <input type="text" name="buscar" class="form-control" 
                           placeholder="Buscar por título..." value="<?= htmlspecialchars($busqueda) ?>">
                    <button class="btn btn-primary" type="submit">Buscar</button>
                </div>
            </div>

            <!-- Botones de orden de dirección -->
            <div class="col-12 col-md-auto">
                <div class="btn-group">
                    <button type="submit" name="orden" value="ASC" 
                            class="btn <?= $orderDir == 'ASC' ? 'btn-primary' : 'btn-outline-dark' ?>">A-Z ↓</button>
                    <button type="submit" name="orden" value="DESC" 
                            class="btn <?= $orderDir == 'DESC' ? 'btn-primary' : 'btn-outline-dark' ?>">Z-A ↑</button>
                </div>
            </div>
            
            <!-- Limpiamos los filtros o búsquedads-->
            <div class="col-12 col-md-auto">
                <a href="catalog.php" class="btn btn-link text-secondary">Limpiar filtros</a>
            </div>
        </form>
    </div>