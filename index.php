<?php
    require 'core/init.php';
    include 'includes/head.php';
    include 'includes/nav.php';

    $sql = "SELECT * FROM products WHERE featured = 1";
    $featured = $db -> query($sql);
?>
<!--navigator-->


<!--header-->
<div id="headwrapper">
    <h1 style="font-family: 'Parisienne', cursive; font-size:80px;"><b>Bienvenido</b></h1>
</div>

<!--featured items-->
<div class="container">
    <h1 id="featureditems" style="font-family: 'Parisienne', cursive;">featured items</h1>
</div>

<!--pics of three products-->
<div class="row justify-content-center">
    <!--first product on the left-->
    <?php while($product = mysqli_fetch_assoc($featured)): ?>
    <div class="col justify-content-center">

        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="<?php echo $product['image'];?>" alt="Card image cap">
            <div class="card-body">
                <h4 class="card-title"><?php echo $product['title']; ?></h4>
                <h5 class="card-title text-danger"><s>List Price:<?php echo $product['list_price']; ?></s></h5>
                <h5 class="card-title">Our Price:<?php echo $product['price']; ?></h5>
                <p class="card-text"><?php echo $product['description'];?></p>
                <div><button href="#" class="btn btn-primary float-right" onclick="detailmodal(<?php echo $product['id']; ?>)">Add to Cart</button></div>
            </div>
        </div>

    </div>
    <?php endwhile ?>





</div>





<script src="JS/InputSpinner.js"></script>
<script src="JS/bgui.js"></script>
</body>
</html>