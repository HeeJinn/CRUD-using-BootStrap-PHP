<?php require "../config/config.php"; ?>
<?php
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
}
?>
