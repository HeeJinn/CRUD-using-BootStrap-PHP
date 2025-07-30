<?php

$host = "localhost";
$user = "root";
$pass = "";       

try {
    $pdo = new PDO("mysql:host=$host;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $pdo->exec("CREATE DATABASE IF NOT EXISTS bookstore_db");
    $pdo->exec("USE bookstore_db");
    
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS book_table (
            _id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(50) NOT NULL,
            author VARCHAR(50) NOT NULL,
            image VARCHAR(255) NOT NULL,
            date_published VARCHAR(20) NOT NULL,
            publisher VARCHAR(100) NOT NULL,
            genre VARCHAR(50) NOT NULL,
            price INT(11) NOT NULL
        )
    ");

    $books = [
        ['Beyond The Boundary', 'Nagomu Torii', 'https://m.media-amazon.com/images/M/MV5BZjFiNWMzMTQtOWE5NC00NWI3LWFhZGUtNTJjMzBhOTM2MzIxXkEyXkFqcGc@._V1_.jpg', '2012-06-09', 'Kyoto Animation', 'Fantasy', 899],
        ['Wuthering Waves', 'Kenley Russel Benitez', 'https://static0.thegamerimages.com/wordpress/wp-content/uploads/sharedimages/2024/12/mixcollage-25-dec-2024-03-54-am-8390.jpg', '2024-05-23', 'Kuro Games', 'Adventure', 1199],
        ['Lord of the niga', 'Christian', 'https://m.media-amazon.com/images/M/MV5BNzIxMDQ2YTctNDY4MC00ZTRhLTk4ODQtMTVlOWY4NTdiYmMwXkEyXkFqcGc@._V1_FMjpg_UX1000_.jpg', '2025-07-28', 'Soberano Inst.', 'History', 1200],
        ['Demon Slayer', 'Jeano Genuino', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTYKYAkuOMTaDKhMy0kmL91-6W-nSbAUkyrTw&s', '2017-02-07', 'Soberano Inst.', 'Action &#38; Adventure', 1200],
        ['Nano Machine', 'Jilbert Alos', 'https://static.tvtropes.org/pmwiki/pub/images/n_7.jpg', '2015-10-27', 'MarLoafer Inc.', 'Action &#38; Adventure', 1600],
        ['Rebirth of Heavenly Demon', 'Jeano Genuino', 'https://manhuaus.com/wp-content/uploads/2024/03/Reborn-As-The-Heavenly-Demon-1-175x238.webp', '2021-01-12', 'Kyoto Animation', 'History', 1399],
        ['Myst Might Mayhem', 'Jilbert Alos', 'https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1726111518i/218728008.jpg', '2021-06-23', 'MarLoafer Inc.', 'Horror', 1800],
        ['Secret Class Vol. 4', 'Jeano Genuino', 'https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1628862939i/58761106.jpg', '2021-08-20', 'Soberano Inst.', 'Romance', 2000]
    ];

    foreach ($books as $book) {
        $stmt = $pdo->prepare("INSERT IGNORE INTO book_table (name, author, image, date_published, publisher, genre, price) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute($book);
    }
    
    echo '<script language="javascript">';
    echo 'alert("Database and table created successfully, and sample data inserted.")';
    echo '</script>';

} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}