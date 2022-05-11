<?php include('partials-front/menu.php'); ?>

<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search text-center">
    <div class="container">

        <form action="<?php echo SITEURL; ?>food-search.php" method="POST">
            <input type="search" name="search" placeholder="Search for Food.." required>
            <input type="submit" name="submit" value="Search" class="btn btn-primary">
        </form>

    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->

<!-- CAtegories Section Starts Here -->
<section class="categories">
    <div class="container">
        <h2 class="text-center">Mon ngon</h2>

        <a href="category-foods.html">
            <div class="box-3 float-container">
                <img src="https://i.pinimg.com/564x/05/58/14/0558149ae0df467339948f61f9449548.jpg" alt="Pizza" class="img-responsive img-curve">

                <h3 class="float-text text-white">Pho</h3>
            </div>
        </a>

        <a href="#">
            <div class="box-3 float-container">
                <img src="https://i.pinimg.com/564x/75/bb/8b/75bb8b06df6aae2175f3e9befb294328.jpg" alt="Burger" class="img-responsive img-curve">

                <h3 class="float-text text-white">Bun bo</h3>
            </div>
        </a>

        <a href="#">
            <div class="box-3 float-container">
                <img src="https://i.pinimg.com/564x/71/e8/0f/71e80ff7c6448584ca8d28c07f97de35.jpg" alt="Momo" class="img-responsive img-curve">

                <h3 class="float-text text-white">Banh xeo</h3>
            </div>
        </a>

        <div class="clearfix"></div>
    </div>
</section>
<!-- Categories Section Ends Here -->

<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Menu</h2>

        <?php
        //Getting Foods from Database that are active and featured
        $sql2 = "SELECT * FROM tbl_food where active='Yes' AND featured='Yes' LIMIT 6";
        //excute the Query
        $res2 = mysqli_query($conn, $sql2);
        //Count Rows
        $count2 = mysqli_num_rows($res2);
        //Check whether food available or not
        if ($count2 > 0) {
            //Food Avallable
            while ($row = mysqli_fetch_assoc($res2)) 
            {
                //Get all the values
                $id = $row['id'];
                $title = $row['title'];
                $price = $row['price'];
                $description = $row['description'];
                $image_name = $row['image_name'];

        ?>

                <div class="food-menu-box">
                    <div class="food-menu-img">
                        <?php 
                            //check whether image available or not
                            if($image_name=="")
                            {
                                //image not available
                                echo "<div class='error'>Image not available.</div>";
                            }
                            else
                            {
                                //image available
                                ?>
                                    <img src="<?php echo SITEURL;?>images/food/<?php echo $image_name; ?>" class="img-responsive img-curve">
                                <?php
                            }
                        ?>
            
                    </div>
                    <div class="food-menu-desc">
                        <h4><?php echo $title; ?></h4>
                        <p class="food-price"><?php echo $price; ?>VND</p>
                        <p class="food-detail">
                            <?php echo $description; ?>
                        </p>
                        <br>

                        <a href="order.html" class="btn btn-primary">Đặt món</a>
                    </div>
                </div>

        <?php
            }
        } else {
            //food Not Available
            echo "<div class='error'>Food not available</div>";
        }
        ?>


        <div class="clearfix"></div>



    </div>


    <p class="text-center">
        <a href="#">See All Foods</a>
    </p>
</section>
<!-- fOOD Menu Section Ends Here -->

<?php include('partials-front/footer.php'); ?>