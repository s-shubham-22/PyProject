
<nav class="navbar navbar-expand-xl navbar-dark bg-dark fixed-top" aria-label="Eighth navbar example">
    <div class="container">
        <a class="navbar-brand" href="./index.php">
            <h1>PyProjects</h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample07">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?php if ($pgname == 'home') {
                                            echo 'active';
                                        } ?>" aria-current="page" href="./index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($pgname == 'project') {
                                            echo 'active';
                                        } ?>" href="./projectList.php">Projects</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown07" data-bs-toggle="dropdown" aria-expanded="false">Category</a>
                    <ul class="dropdown-menu" aria-labelledby="dropdown07">
                        <li><a class="dropdown-item" href="./projectList.php?Category='Basic'">Basic</a></li>
                        <li><a class="dropdown-item" href="./projectList.php?Category='Intermediate'">Intermediate</a></li>
                        <li><a class="dropdown-item" href="./projectList.php?Category='Advanced'">Advanced</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="./projectList.php?Category=V'">OpenCV</a></li>
                        <li><a class="dropdown-item" href="./projectList.php?Category='Tkinter'">Tkinter</a></li>
                        <li><a class="dropdown-item" href="./projectList.php?Category='GUI'">GUI</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($pgname == 'faq') {
                                            echo 'active';
                                        } ?>" href="./FAQs.php">FAQs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($pgname == 'about') {
                                            echo 'active';
                                        } ?>" href="./aboutUs.php">About Us</a>
                </li>
                <?php

                @session_start();
               if (!isset($_SESSION['email'])) {
                ?>

                    <li class="nav-item">
                        <a class="nav-link <?php if ($pgname == 'join') {
                                                echo 'active';
                                            } ?>" href="./joinUs.php">Join Us</a>
                    </li>

                <?php
                } else {
                ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown07" data-bs-toggle="dropdown" aria-expanded="false"><img src="./images/logo_cropped_resized.png" alt="User"></a>
                        <ul class="dropdown-menu" aria-labelledby="dropdown07">
                            <li><a class="dropdown-item" href="./bookmark.php">Bookmark</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li><a href="logout.php" class="dropdown-item" href="#">Sign Out</a></li>
                        </ul>
                    </li>
                <?php 
                }
                @session_start();
                if (isset($_SESSION['email'])) {
                ?>
                    <li class="nav-item">
                        <span class="username">Hello <?php echo $_SESSION['fname']; ?></span>
                    </li>
                <?php } ?>
            </ul>

        </div>
    </div>
</nav>