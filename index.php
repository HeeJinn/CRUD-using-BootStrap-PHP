<?php require "config/config.php"     ?>
<?php

$books = $conn->query("SELECT * FROM book_table WHERE is_deleted = FALSE ORDER BY _id ASC LIMIT 10");
$books->execute();

$allBooks = $books->fetchAll(PDO::FETCH_OBJ);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kenley Bootstrap</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    include("utils/header.php");
    ?>

    <main>
        <section class="modal fade" id="bookForm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Add New Book</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="crud/insert.php" method="post">
                            <div class="row g-2">
                                <div class="col-sm">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="bookName" name="bookName" placeholder="Enter Book Name" required>
                                        <label for="bookName" class="form-label">Book Name</label>

                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="authorName" id="authorName" class="form-control" placeholder="Enter Author" required>
                                        <label for="authorNName">Enter Author</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col-sm">
                                    <div class="form-floating mb-3">
                                        <input type="date" name="datePublished" id="datePublished" class="form-control" placeholder="Select Date Published" required>
                                        <label for="datePublished">Date Published</label>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="publisherName" id="publisher" class="form-control" placeholder="Enter Publisher" required>
                                        <label for="publisher">Publisher</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col-sm">
                                    <select class="form-select mb-3" name="genre" id="genreSelection" aria-label="Book Genre" required>
                                        <option selected disabled value="">Select Genre</option>
                                        <option value="Fiction">Fiction</option>
                                        <option value="Non-Fiction">Non-Fiction</option>
                                        <option value="Fantasy">Fantasy</option>
                                        <option value="Horror">Horror</option>
                                        <option value="Romance">Romance</option>
                                        <option value="Science Fiction">Science Fiction</option>
                                        <option value="Mystery">Mystery</option>
                                        <option value="Thriller">Thriller</option>
                                        <option value="Action & Adventure">Action and Adventure</option>
                                        <option value="Young Adult">Young Adult</option>
                                        <option value="Children's">Children</option>
                                        <option value="Biography/Memoir">Biography</option>
                                        <option value="History">History</option>
                                        <option value="Self-Help">Self-Help</option>
                                        <option value="Cookbooks">Cookbooks</option>
                                        <option value="True Crime">True Crime</option>
                                    </select>
                                </div>
                                <div class="col-sm">
                                    <div class="form-floating mb-3">
                                        <input type="number" name="price" id="price" class="form-control" placeholder="Enter Price" required>
                                        <label for="price">Enter price</label>
                                    </div>
                                </div>
                                <div class="row g-2">
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" name="imageUrl" class="form-control" id="image_url" name="image_url" placeholder="Enter Image URL">
                                            <label for="image_url">Image URL</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-2">
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" name="wikiUrl" class="form-control" id="wiki_url" placeholder="Enter Wik URL">
                                            <label for="image_url">Wiki URL</label>
                                        </div>
                                    </div>
                                </div>
                            </div>



                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Book</button>
                    </div>
                    </form>
                </div>
            </div>
        </section>
        <section id="booksCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#booksCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#booksCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#booksCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active c-item">
                    <img src="https://images.pexels.com/photos/694740/pexels-photo-694740.jpeg" class="d-block w-100 c-img" alt="...">
                    <div class="carousel-caption top-0 mt-4">
                        <p class="fs-3 mt-5 text-uppercase">cheapest books you can find</p>
                        <h1 class="display-1 fw-bolder text-capitalize">jilbert bookstore</h1>
                        <button type="button" class="btn btn-primary px-4 py-2 fs-5 mt-4" data-bs-toggle="modal" data-bs-target="#bookForm">Add Book</button>
                    </div>
                </div>
                <div class="carousel-item c-item">
                    <img src="https://images.pexels.com/photos/990432/pexels-photo-990432.jpeg" class="d-block w-100 c-img" alt="...">
                    <div class="carousel-caption top-0 mt-4">
                        <p class="fs-3 mt-5 text-uppercase">hand picked recommendations</p>
                        <h1 class="display-1 fw-bolder text-capitalize">Novel's no problem</h1>
                    </div>
                </div>
                <div class="carousel-item c-item">
                    <img src="https://images.pexels.com/photos/1370295/pexels-photo-1370295.jpeg" class="d-block w-100 c-img" alt="...">
                    <div class="carousel-caption top-0 mt-4">
                        <p class="fs-3 mt-5 text-uppercase">you pick we deliver</p>
                        <h1 class="display-1 fw-bolder text-capitalize">3 days delivery locally</h1>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#booksCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#booksCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </section>

        <section class="container-fluid bg-secondary c-overview d-flex align-items-center">
            <div class="row w-100 text-center fs-4">
                <div class="col-sm text-white">
                    <i class="bi bi-journals me-2"></i>
                    Top notch books
                </div>
                <div class="col-sm text-white">
                    <i class="bi bi-star me-2"></i>
                    High quality
                </div>
                <div class="col-sm text-white">
                    <i class="bi bi-cash-coin me-2"></i>
                    Cheaper Books
                </div>
            </div>
        </section>

        <section id="management">
            <div class="container text-center my-5">
                <h1>Top 10 selling books</h1>
            </div>
            <div class="container">
                <div class="row">
                    <?php if (empty($allBooks)) : ?>
                        <div class="col">
                            <img src="https://media.tenor.com/x-VKBImv-PwAAAAi/alone-sad.gif" class="rounded mx-auto mt-5 d-block" alt="Empty Data" style="height: 300px; width: 300px;">
                            <h1 class="text-center text-secondary mb-5">Empty Books</h1>
                        </div>

                    <?php else : ?>
                        <?php foreach ($allBooks as $book):   ?>
                            <div class="col-md-4 col-xl-3 col-sm-6 mb-5 px-5 px-sm-1 px-md-2 px-xl-3 px-xxl-4">
                                <div class="card c-carditem h-100">
                                    <a href="<?php echo $book->wiki; ?>"><img src="<?php echo $book->image;  ?>" height="300px" class="card-img-top" alt="Book Image"></a>
                                    <div class="card-body ">
                                        <h2 class="card-title "><?php echo $book->name  ?></h2>
                                        <p class="mb-0">Genre: <?php echo $book->genre  ?></p>
                                        <p class="card-text mb-0">Author: <?php echo $book->author  ?></p>
                                        <p class="mb-0">Publisher: <?php echo $book->publisher ?></p>
                                        <p class="mb-0">Published: <?php echo $book->date_published ?></p>
                                        <hr>
                                        <h4>Price: ₱ <?php echo $book->price ?> </h4>

                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif ?>
                </div>
            </div>

        </section>

        <section id="faqs">
            <h1 class="text-center mb-5">FAQ's</h1>
            <div class="container">
                <div class="accordion w-75 mx-auto mb-5" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Frequently Asked Questions 1
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <strong>Do you sell e-books or audiobooks?</strong> Currently, we primarily focus on physical books. However, we are exploring options to expand our digital offerings in the future. Stay tuned for updates!
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Frequently Asked Questions 2
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <strong>What is your return policy?</strong> You can return books within 30 days of purchase, provided they are in their original condition. Please refer to our "Returns Policy" page for full details and instructions.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Frequently Asked Questions 3
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <strong>What are your shipping options and delivery times?</strong> We offer standard and express shipping. Standard delivery usually takes 5-7 business days, while express takes 2-3 business days. Shipping costs are calculated at checkout based on your location and order total. We currently ship within the Philippines.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
    <?php
    include("utils/footer.html");

    ?>


</body>

</html>