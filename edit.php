<?php
    require "database.php";


    if($_POST){
        $title = $_POST['title'];
        $desc = $_POST['description'];
        $id = $_POST['id'];


        $pdoStatement = $pdo->prepare("UPDATE todo SET title ='$title',description ='$desc' WHERE id = '$id'");
        $result =  $pdoStatement->execute();
        if($result){
            echo "<script>alert('New Todo is Updated');window.location.href='index.php';</script>";
        }


    }else{
        $pdoStatement = $pdo->prepare("SELECT * FROM todo WHERE id=".$_GET['id']);
        $pdoStatement->execute();
        $result = $pdoStatement->fetchAll();
    }

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
    <div class="card">
        <div class="card-body">
            <h2>Edit Todo</h2>
            <form action="" method="POST">
                <input type="hidden" name="id" value="<?php echo $result[0]['id'] ?>">
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" class="form-control" name="title" value="<?php echo $result[0]['title'] ?>" >
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea type="text" class="form-control" name="description" rows="8" cols="80" required><?php echo $result[0]['description'] ?></textarea>
                </div>
                <div class="form-group mt-4">
                    <input type="submit" class="btn btn-primary" name="" value="Update">
                    <a href="index.php" class="btn btn-warning" name="">Back</a>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>