<?php
    $sql = "SELECT * FROM categories WHERE parent = 0";
    $parentquery = $db -> query($sql);
    ?>

<!--$db has method "query()", passing "$sql" -->

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand mb-0 h1" href="#">NavbarTitle</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <?php while($parent = mysqli_fetch_assoc($parentquery)): ?>  <!--get query results-->

                <?php
                    $parent_id = $parent['id'];
                    $sql2 = "SELECT * FROM categories WHERE parent = '$parent_id'";
                    $childquery = $db -> query($sql2);
                ?>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo $parent['category']; ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                    <?php while($child = mysqli_fetch_assoc($childquery)) : ?>

                    <a class="dropdown-item" href="#"><?php echo $child['category']; ?></a>  <!--when see database, click "categories", click "browse", there is a table with id, category, parent-->

                    <?php endwhile; ?>

                </div>
            </li><?php endwhile; ?>
        </ul>

        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>


</nav>