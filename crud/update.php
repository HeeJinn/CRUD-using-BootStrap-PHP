<?php require "../config/config.php"; ?>
<?php
$book = null;

if (isset($_GET["upd_id"])) {
    $bookId = $_GET["upd_id"];

    try {
        $fetchBook = $conn->prepare("SELECT * FROM book_table WHERE _id = :bookId");
        $fetchBook->execute([":bookId" => $bookId]);
        $book = $fetchBook->fetch();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>

<?php
if (isset($_POST['update'])) {
    $updateBook = $conn->prepare('UPDATE book_table SET');

    $bookId = $_POST['book_id'] ?? null;
    $bookName = htmlspecialchars(trim($_POST['book_name'] ?? ''));
    $bookAuthor = htmlspecialchars(trim($_POST['book_author'] ?? ''));
    $bookImage = htmlspecialchars(trim($_POST['book_image'] ?? ''));
    $bookDatePublished = htmlspecialchars(trim($_POST['book_date_published'] ?? ''));
    $bookPublisher = htmlspecialchars(trim($_POST['book_publisher'] ?? ''));
    $bookGenre = htmlspecialchars(trim($_POST['book_genre'] ?? ''));
    $bookPrice = filter_var($_POST['book_price'] ?? '', FILTER_VALIDATE_FLOAT);


    if (empty($bookId) || empty($bookName) || empty($bookAuthor) || empty($bookImage) || empty($bookDatePublished) || empty($bookPublisher) || empty($bookGenre) || $bookPrice === false) {
        echo "<p class='alert alert-danger'>Error: All required fields must be filled and valid.</p>";
        exit();
    }

    try {

        $updateBook = $conn->prepare("UPDATE book_table SET
            name = :book_name,
            author = :book_author,
            image = :book_image,
            date_published = :book_date_published,
            publisher = :book_publisher,
            genre = :book_genre,
            price = :book_price
            WHERE _id = :book_id");


        $params = [
            ':book_name' => $bookName,
            ':book_author' => $bookAuthor,
            ':book_image' => $bookImage,
            ':book_date_published' => $bookDatePublished,
            ':book_publisher' => $bookPublisher,
            ':book_genre' => $bookGenre,
            ':book_price' => $bookPrice,
            ':book_id' => $bookId
        ];


        $updateBook->execute($params);
        header('location: /Bootstrap practice/navigation/bookManagement.php');
        exit();
    } catch (PDOException $e) {
        echo "<p class='alert alert-danger'>Database Error: " . $e->getMessage() . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>

</head>

<body>
    <div class="position-relative " style="height: 300px;">
        <img src="<?php echo htmlspecialchars($book['image']); ?>"
            class="img-fluid w-100 h-100"
            alt="Book Cover Background"
            style="object-fit: cover; filter: brightness(0.4);">

        <img src="<?php echo htmlspecialchars($book['image']); ?>"
            class="position-absolute top-100 start-50 translate-middle rounded shadow-lg"
            alt="Book Cover Preview"
            style="width: 300px; height: auto; z-index: 10;">

    </div>
    <main>
        <div class="container" style="margin-top: 250px;">
            <div class="card my-5 w-80 mx-auto mx-xm-5">
                <form action="update.php?upd_id=<?php echo $bookId ?>" method="post" class="mx-3 my-3 ">
                    <input type="hidden" name="book_id" value="<?php echo $book['_id']; ?>">

                    <div class="row">
                        <div class="col-xl-6 col-md-12 col-sm-12 mb-3">
                            <label for="bookName" class="form-label">Book Name</label>
                            <input type="text" class="form-control" id="bookName" name="book_name" placeholder="Enter Book Name" value="<?php echo htmlspecialchars($book['name']); ?>" required>
                        </div>
                        <div class="col-xl-6 col-md-12 col-sm-12 mb-3">
                            <label for="bookAuthor" class="form-label">Author</label>
                            <input type="text" class="form-control" id="bookAuthor" name="book_author" placeholder="Enter Book Author" value="<?php echo htmlspecialchars($book['author']); ?>" required>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="img" class="form-label">Image URL</label>
                            <input type="text" class="form-control" id="img" name="book_image" placeholder="Enter URL" value="<?php echo htmlspecialchars($book['image']); ?>" required>
                        </div>
                        <div class="col-xl-6 col-md-12 col-sm-12 mb-3">
                            <label for="datePublished">Date Published</label>
                            <input type="date" class="form-control" id="datePublished" name="book_date_published" value="<?php echo htmlspecialchars($book['date_published']); ?>" required>
                        </div>
                        <div class="col-xl-6 col-md-12 col-sm-12 mb-3">
                            <label for="publisher" class="form-label">Publisher</label>
                            <input type="text" class="form-control" id="publisher" name="book_publisher" placeholder="Enter Publisher" value="<?php echo htmlspecialchars($book['publisher']); ?>" required>
                        </div>
                        <div class="col-xl-6 col-md-12 col-sm-12 mb-3">
                            <label for="genreSelection" class="form-label">Genre</label>
                            <select class="form-select mb-3" name="book_genre" id="genreSelection" aria-label="Book Genre" required>
                                <option selected value="<?php echo htmlspecialchars($book['genre']); ?>"><?php echo htmlspecialchars($book['genre']); ?></option>
                                <option value="Fiction">Fiction</option>
                                <option value="Non-Fiction">Non-Fiction</option>
                                <option value="Fantasy">Fantasy</option>
                                <option value="Horror">Horror</option>
                                <option value="Romance">Romance</option>
                                <option value="Science Fiction">Science Fiction</option>
                                <option value="Mystery">Mystery</option>
                                <option value="Thriller">Thriller</option>
                                <option value="Action & Adventure">Action & Adventure</option>
                                <option value="Young Adult">Young Adult</option>
                                <option value="Children's">Children's</option>
                                <option value="Biography/Memoir">Biography/Memoir</option>
                                <option value="History">History</option>
                                <option value="Self-Help">Self-Help</option>
                                <option value="Cookbooks">Cookbooks</option>
                                <option value="True Crime">True Crime</option>
                            </select>
                        </div>
                        <div class="col-xl-6 col-md-12 col-sm-12 mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" class="form-control" id="price" name="book_price" placeholder="Enter Price" value="<?php echo htmlspecialchars($book['price']); ?>" required>
                        </div>
                    </div>

                    <input type="submit" name="update" id="update" class="btn btn-primary btn-xl px-4" value="Update">
                </form>

            </div>
        </div>
    </main>

</body>

</html>