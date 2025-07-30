<?php require "../config/config.php"; ?>
<?php

// if (isset($_GET['del_id'])) {
//     $bookId = $_GET['del_id'];
//     try {
//         $book = $conn->prepare('DELETE FROM book_table WHERE _id = :bookId');
//         $book->execute([':bookId' => $bookId]);
//         header('location: /Bootstrap practice/navigation/bookManagement.php');
//         exit();
//     } catch (PDOException $e) {
//         echo $e->getMessage();
//     }
// }

if (isset($_GET['del_id'])) {
    $bookId = $_GET['del_id'];
    try {
        $book = $conn->prepare('UPDATE book_table SET is_deleted = TRUE, deleted_at = NOW() WHERE _id = :bookId');
        $book->execute([':bookId' => $bookId]);
        header('location: /Bootstrap practice/navigation/bookManagement.php');
        exit();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}


?>