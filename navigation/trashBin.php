<?php
require "../config/config.php";
$active_page = "trash";

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trash Bin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</head>

<body>
    <?php include("../utils/header.php") ?>

    <main>
        <section class="container px-5 pt-5 px-sm-1 px-md-2 px-xl-3 px-xxl-4">
            <div class="container">
                <h1><i class="bi bi-trash"></i> Trash Bin</h1>
                <p>When you delete a book we keep it at ur trashbin so you can restore it. <i class="bi bi-info-circle"></i></p>
            </div>
        </section>

        <section class="container">
            <p class="fs-4 px-xxl-5 text-secondary">recent</p>
        </section>

        <section class="container px-3 ">
            <div class="card mb-3 mx-auto shadow-sm" style="max-width: 1200px; height: 150px;">
                <div class="d-flex h-100 flex-row w-100">
                    <div style="flex: 0 0 200px;">
                        <img src="https://i.redd.it/ayut0tsees0d1.jpeg"
                            alt="Book Image"
                            class="h-100 w-100 rounded-start object-fit-cover"
                            style="object-fit: cover;">
                    </div>
                    <div class="flex-grow-1 d-flex align-items-center px-3">
                        <div>
                            <h5 class="card-title mb-1">Book name: Nano Machine</h5>
                            <p class="card-text mb-0">
                                <small class="text-body-secondary">Deleted at 22-09-2025</small>
                            </p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pe-3">
                        <a href="#" class="btn btn-sm btn-primary">Restore</a>
                    </div>

                </div>
            </div>
        </section>




    </main>


</body>

</html>