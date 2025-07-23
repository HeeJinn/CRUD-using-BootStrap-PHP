<?php
    require "../config/config.php"; ?>

    <?php

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $bookName = trim(filter_input(INPUT_POST, "bookName", FILTER_SANITIZE_SPECIAL_CHARS));
        $authorName = trim(filter_input(INPUT_POST, "authorName", FILTER_SANITIZE_SPECIAL_CHARS));
        $imageUrl = trim(filter_input(INPUT_POST, "imageUrl", FILTER_SANITIZE_URL)); 
        $datePublished = trim(filter_input(INPUT_POST, "datePublished", FILTER_SANITIZE_SPECIAL_CHARS)); 
        $publisherName = trim(filter_input(INPUT_POST, "publisherName", FILTER_SANITIZE_SPECIAL_CHARS));
        $genre = trim(filter_input(INPUT_POST, "genre", FILTER_SANITIZE_SPECIAL_CHARS));
        $price = filter_input(INPUT_POST, "price", FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        

        $insertQuery = $conn->prepare("INSERT INTO book_table (name, author, image, date_published, publisher, genre, price)
        VALUES (:bookName, :authorName, :imageUrl, :datePublished, :publisherName, :genre, :price)");

        $params = [
            ':bookName' => $bookName,
            ':authorName'=> $authorName,
            ':imageUrl'=> $imageUrl,
            ':datePublished'=> $datePublished,
            ':publisherName'=> $publisherName,
            ':genre'=> $genre,
            ':price'=> $price
        ];

        try{
            $insertQuery->execute($params);
            header('location: ../index.php');
            exit;
        }catch(PDOException $e){
            echo 'Failed to insert Data'. $e->getMessage();
        }

    }
?>