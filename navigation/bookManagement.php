<?php
require "../config/config.php";
$active_page = "book";

?>

<?php

$allBooks = null;
if (isset($_GET["query"])) {
    $query = trim($_GET["query"]);

    try {
        $search = $conn->prepare("SELECT * FROM book_table WHERE name LIKE :query;");
        $queryWildcard = $query ."%";
        $search->execute([":query" => $queryWildcard]); 
        
        $allBooks = $search->fetchAll(PDO::FETCH_OBJ);
    } 
    catch (Exception $e) {
        echo "Failed to load data: ". $e->getMessage();
    }
}else {
    $book = $conn->prepare("SELECT * FROM book_table WHERE is_deleted = FALSE;");
    $book->execute(); 

    $allBooks = $book->fetchAll(PDO::FETCH_OBJ);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>

</head>

<body>
    <?php include("../utils/header.php") ?>

    <main>
        <section class="container my-5">
            <div class="row mb-3">
                <div class="col-sm-6 col-md-8 col-xl-9">
                    <h1>List of Books</h1>
                </div>
                <div class="col-sm-6 col-md-4 col-xl-3">
                    <form action="bookManagement.php" method="GET">
                        <div class="input-group">
                            <div class="form-floating flex-grow-1"> <input type="text" name="query" id="searchbar" class="form-control" placeholder="Search Book" value="<?php echo htmlspecialchars($_GET['query'] ?? ''); ?>">
                                <label for="searchbar">Search Books</label>
                            </div>
                            <button class="btn btn-primary" type="submit">
                                Search <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card table-responsive shadow">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Book Name</th>
                            <th scope="col">Author</th>
                            <th scope="col">Publisher</th>
                            <th scope="col">Date Published</th>
                            <th scope="col">Genre</th>
                            <th scope="col">Price</th>
                            <th scope="col">Image URL</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($allBooks as $book): ?>
                            <tr>
                                <th scope="row"><?php echo $book->_id ?></th>
                                <td><?php echo $book->name ?></td>
                                <td><?php echo $book->author ?></td>
                                <td><?php echo $book->publisher ?></td>
                                <td><?php echo $book->date_published ?></td>
                                <td><?php echo $book->genre ?></td>
                                <td><?php echo $book->price ?></td>
                                <td class="text-center fs-5"><i class="bi bi-card-image"></i></td>
                                <td>
                                    <a href="../crud/update.php?upd_id=<?php echo $book->_id; ?>" class="btn btn-primary btn-sm px-4"><i class="bi bi-pen"></i></a>
                                    <a href="../crud/delete.php?del_id=<?php echo $book->_id; ?>" class="btn btn-danger btn-sm px-4"><i class="bi bi-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>


</body>

</html>