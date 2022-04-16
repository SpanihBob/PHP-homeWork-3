<div class="container">
    <header class="d-flex justify-content-center py-3">
        <ul class="nav nav-pills">
            <?php 
                if(isset($_SESSION["name"]) && isset($_SESSION["pass"]))
                {
            ?>
            <li class="nav-item" role="presentation" class="active">
                <a class="nav-link active" href="index.php?page=1">Home</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" href="index.php?page=2">Upload</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" href="index.php?page=3">Gallery</a>
            </li>
            <?php
                }
            ?>
            <li class="nav-item" role="presentation">
                <a class="nav-link" href="index.php?page=4">Registration</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" href="index.php?page=5">Input</a>
            </li>
        </ul>
    </header>   
</div>