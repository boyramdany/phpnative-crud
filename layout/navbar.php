<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">CRUD - PHP</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto">
                <li <?php if ($page == "Home") echo "class='active'"; ?>>
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li <?php if ($page == "About") echo "class='active'"; ?>>
                    <a class="nav-link" href="about.php">About</a>
                </li>
                <li <?php if ($page == "Contact") echo "class='active'"; ?>>
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>
            </ul>

            <form class="form-inline my-2 my-lg-0">
                <?php
                if (isset($_SESSION["login"])) {
                    echo '<a name="logout" id="logout" class="btn btn-outline-light my-2 my-sm-0" href="logout.php" role="button">Logout </a>';
                } else {
                    echo '<a name="login" id="login" class="btn btn-outline-light my-2 my-sm-0" href="login.php" role="button">Login </a>';
                }
                ?>
            </form>
        </div>
    </div>
</nav>