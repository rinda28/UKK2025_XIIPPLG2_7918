<?php
session_start();
require_once 'config/koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List App</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="assets/css/style.css" rel="stylesheet">
 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <?php if(!isset($_SESSION['user_id'])): ?>
        <?php include 'views/login.php'; ?>
    <?php else: ?>
        <?php include 'views/header.php'; ?>
        <div class="container mt-4">
            <?php if(isset($_GET['msg'])): ?>
                <?php
                $messages = [
                    'task_added' => ['success', 'Task added successfully!'],
                    'task_completed' => ['success', 'Task marked as completed!'],
                    'task_deleted' => ['success', 'Task deleted successfully!'],
                    'category_added' => ['success', 'Category added successfully!'],
                    'category_deleted' => ['success', 'Category deleted successfully!'],
                    'registered' => ['success', 'Registration successful! Please login.'],
                ];
                if(isset($messages[$_GET['msg']])): ?>
                    <div class="alert alert-<?php echo $messages[$_GET['msg']][0]; ?> alert-dismissible fade show">
                        <?php echo $messages[$_GET['msg']][1]; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
            <div class="row">
                <div class="col-md-4">
                    <?php include 'views/category_form.php'; ?>
                </div>
                <div class="col-md-8">
                    <?php include 'views/task_list.php'; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script src="assets/js/script.js"></script>
</body>
</html>