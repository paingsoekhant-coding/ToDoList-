<?php

require "database.php";


$query = "SELECT * FROM todo ORDER BY id ";
$pdoStatement = $pdo->query($query);
$result = $pdoStatement->fetchAll();
// die(var_dump($result));

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="">
        <div class="card ">

            <div class="card-body">
                <h3 class="">Todo Home Page</h3>
                <table class="table caption-top table-striped">
                    <caption class="fs-2"><a href="create.php" class="btn btn-success">Create</a></caption>
                    
                    <tbody>
                    <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Created</th>
                                <th>Action </th>
                            </tr>
                        </thead>
                        <?php if(!empty($result)): ?>
                            <?php foreach($result as $r): ?>
                                
                        <tr>
                            <th scope="row"><?php echo $r['id'] ?></th>
                            <td><?php echo $r['title'] ?></td>
                            <td><?php echo $r['description'] ?></td>
                            <td><?php echo $r['created_at']  ?></td>
                            <td>
                                <a href="edit.php?id=<?php echo $r['id']; ?>" class="btn btn-warning">Edit</a>
                                <a href="delete.php?id=<?php echo $r['id'] ;?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php else: ?>
                            <h3 class="text-center text-danger">There Is No Todo List Here. </h3>
                        <?php endif; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>