<?php require "../config/config.php"; ?>
<?php
if (isset($_GET["restore_id"])) {
    $bookId = $_GET["restore_id"];
    $resBook = $conn->prepare("UPDATE book_table SET is_deleted = FALSE, deleted_at = NULL WHERE _id = :bookId;");

    try{
        $resBook->execute([":bookId"=> $bookId]);
        header("location: /Bootstrap practice/navigation/trashBin.php");
        exit;

    }catch(PDOException $e){
        echo $e->getMessage();
    }
}
?>