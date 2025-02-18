<?php

require_once __DIR__ . '/../config/koneksi.php';

if(!isset($_SESSION['user_id'])) {
    header("Location: ../index.php");
    exit();
}
?>
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Add Task</h5>
    </div>
    <div class="card-body">
        <form action="<?php echo dirname($_SERVER['PHP_SELF']); ?>/controllers/task.php" method="POST">
            <div class="mb-3">
                <label for="task" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="task" name="task" required rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-select" id="category" name="kategori_id" required>
                    <?php
                    try {
                        $stmt = $pdo->prepare("SELECT * FROM kategori WHERE user_id = ?");
                        $stmt->execute([$_SESSION['user_id']]);
                        while($category = $stmt->fetch()) {
                            echo "<option value='".$category['id']."'>".htmlspecialchars($category['kategori'])."</option>";
                        }
                    } catch(PDOException $e) {
                        echo "<option value=''>Error loading categories</option>";
                        error_log("Error loading categories: " . $e->getMessage());
                    }
                    ?>
                </select>
            </div>
            <button type="submit" name="add_task" class="btn btn-primary">Tambah</button>
        </form>
    </div>
</div>

<div class="card mt-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Tasks</h5>
        <div class="d-flex gap-2">
            <select class="form-select form-select-sm" style="width: auto;" onchange="filterTasks(this.value)">
                <option value="all">semua</option>
                <option value="active">berjalan</option>
                <option value="completed">Selesai</option>
            </select>
            <input type="text" class="form-control form-control-sm" style="width: 200px;" 
                   placeholder="Search tasks..." onkeyup="searchTasks(this.value)">
        </div>
    </div>
    <div class="card-body">
        <?php
        try {
            $stmt = $pdo->prepare("
                SELECT t.*, k.kategori 
                FROM tasks t 
                JOIN kategori k ON t.kategori_id = k.id 
                WHERE t.user_id = ? 
                ORDER BY t.status ASC, t.id DESC
            ");
            $stmt->execute([$_SESSION['user_id']]);
            $tasks = $stmt->fetchAll();

            if (empty($tasks)) {
                echo "<p class='text-muted text-center my-4'>No tasks found</p>";
            } else {
                foreach($tasks as $task) {
                    echo "<div class='task-item card mb-2 ".($task['status'] ? 'bg-light' : '')."' 
                               data-status='".($task['status'] ? 'completed' : 'active')."'>";
                    echo "<div class='card-body d-flex justify-content-between align-items-center'>";
                    echo "<div>";
                    echo "<h6 class='mb-0 ".($task['status'] ? 'completed' : '')."'>".htmlspecialchars($task['task'])."</h6>";
                    echo "<small class='text-muted'><span class='badge bg-secondary category-badge'>".htmlspecialchars($task['kategori'])."</span></small>";
                    echo "</div>";
                    echo "<div class='task-actions'>";
                    echo "<form action='" . dirname($_SERVER['PHP_SELF']) . "/controllers/task.php' method='POST' class='d-inline'>";
                    echo "<input type='hidden' name='task_id' value='".$task['id']."'>";
                    if(!$task['status']) {
                        echo "<button type='submit' name='complete_task' class='btn btn-success btn-sm me-1' title='Mark as completed'>";
                        echo "<i class='fas fa-check'></i>";
                        echo "</button>";
                    }
                    echo "<button type='submit' name='delete_task' class='btn btn-danger btn-sm' 
                                  onclick='return confirm(\"Are you sure you want to delete this task?\")' title='Delete task'>";
                    echo "<i class='fas fa-trash'></i>";
                    echo "</button>";
                    echo "</form>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                }
            }
        } catch(PDOException $e) {
            echo "<div class='alert alert-danger'>Error loading tasks. Please try again later.</div>";
            error_log("Error loading tasks: " . $e->getMessage());
        }
        ?>
    </div>
</div>

<script>
function filterTasks(status) {
    document.querySelectorAll('.task-item').forEach(function(task) {
        if(status === 'all' || task.dataset.status === status) {
            task.style.display = '';
        } else {
            task.style.display = 'none';
        }
    });
}

function searchTasks(query) {
    query = query.toLowerCase();
    document.querySelectorAll('.task-item').forEach(function(task) {
        var taskText = task.querySelector('h6').textContent.toLowerCase();
        var categoryText = task.querySelector('.category-badge').textContent.toLowerCase();
        if(taskText.includes(query) || categoryText.includes(query)) {
            task.style.display = '';
        } else {
            task.style.display = 'none';
        }
    });
}
</script>