<?php
require_once('db_connect.php');

$stmt = $pdo->query('SELECT * FROM todo');
//$result = $stmt->fetch();
//print_r($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>TodoApp</title>
    <meta charset="UTF-8">
    <meta name="description" content="Todoアプリ">
    <link rel="stylesheet" href="/css/todo.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Red+Hat+Display&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1>TO DO LISTS</h1>
        <form action="create.php" method="POST" class="task_form">

    <!-- Task Name -->
            <div class="form-group">
                <label for="task" class="task_lavel">Task</label>
                    <div class="col">
                        <input type="text" name="data" id="task_name" class="form_control">
                    </div>
            </div>

        <!-- Add Task Button -->
                <div class="form_group">
                    <div class="btn">
                        <button type="submit" class="button">Add Task</button>
                    </div>
                </div>
        </form>

<!-- Current Tasks -->
        <h2>Current Tasks</h2>
        <table class="task_table">
            <thead>
                <tr>
                    <th>Task</th>
                    <th>Time</th>
                </tr>  
            </thead>
            
            <tbody>
                <tr>
        <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                    <td><?php echo $row['body']."<br>"; ?></td>
                    <td><?php echo $row['created_at']."<br>" ?></td>
                    <form action="delete.php" method="POST" name="delete" class="task_form_delete">
                    <td><button type="submit" name="btn_delete" value="<?php echo $row['id']; ?>" class="button">Delete</button></td>
                    </form>
                </tr>
        <?php } ?>
            </tbody>
        </table>
        </div>

</body>
</html>
