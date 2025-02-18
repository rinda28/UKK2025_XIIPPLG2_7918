<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Tambah Kategori</h5>
    </div>
    <div class="card-body">
        <form action="controllers/category.php" method="POST">
            <div class="mb-3">
                <label for="category" class="form-label">Nama kategori</label>
                <input type="text" class="form-control" id="category" name="kategori" required>
            </div>
            <button type="submit" name="add_category" class="btn btn-primary">Tambah Kategori</button>
        </form>
    </div>
</div>

<div class="card mt-4">
    <div class="card-header">
        <h5 class="mb-0">Kategori</h5>
    </div>
    <div class="card-body">
        <ul class="list-group">
            <?php
            $stmt = $pdo->prepare("SELECT * FROM kategori WHERE user_id = ?");
            $stmt->execute([$_SESSION['user_id']]);
            while($category = $stmt->fetch()) {
                echo "<li class='list-group-item d-flex justify-content-between align-items-center'>";
                echo $category['kategori'];
                echo "<form action='controllers/category.php' method='POST' class='d-inline'>";
                echo "<input type='hidden' name='category_id' value='".$category['id']."'>";
                echo "<button type='submit' name='delete_category' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure you want to delete this category? All tasks in this category will also be deleted.\")'>";
                echo "<i class='fas fa-trash'></i>";
                echo "</button>";
                echo "</form>";
                echo "</li>";
            }
            ?>
        </ul>
    </div>
</div>