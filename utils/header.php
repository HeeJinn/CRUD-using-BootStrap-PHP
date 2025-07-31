<?php
    if(!isset($active_page)){
        $active_page = '';
    }
?>
<header>
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand text-uppercase" href="/Bootstrap practice/index.php">BookStore</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($active_page == 'book') ? 'active' : null; ?> " href="/Bootstrap practice/navigation/bookManagement.php">Book</a>
                        
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($active_page == 'trash') ? 'active' : null; ?> " href="/Bootstrap practice/navigation/trashBin.php">Trash-Bin</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    </header>