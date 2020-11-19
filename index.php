<?php

include "includes/withyouDB.php";

?>
<?php

include "includes/header.php";

?>





    <!--Navigation Bar Starts-->
    <?php

        include "includes/nav.php";

    ?>
    <!--Navigation Bar Ends-->

    <!--Slider Section Starts-->
    <section class="slider text-center" id="slider">
        <div class="slider-overlay">
            <div class="slider-content">
                <div class="icons">
                    <i class="fa fa-facebook"></i>
                    <i class="fa fa-instagram"></i>
                    <i class="fa fa-twitter"></i>
                </div>
                <div class="text"></div>
                <div class="cta-div">
                    <a href="" class="btn1">Our Community</a>
                    <a href="" class="btn2">Our Advisors</a>
                </div>
            </div>
    </section>
    <!--Slider Section Ends-->

    <!--Workshop Section starts-->
    <br>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="workshop-title text-center">
                    <?php
                        $query = "SELECT * FROM workshop";
                        $select_workshop = mysqli_query($con,$query);
                        while($row = mysqli_fetch_assoc($select_workshop)){
                            $workshop_title = $row['workshop_title'];
                            $workshop_content = $row['workshop_content'];
                        ?>
                        
                        <h2><b><?php echo $workshop_title ?></b></h2>
                        <p>
                            <?php echo $workshop_content ?>
                        </p>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
            
                
                    <div class="post-section">
                    <?php
                                    $query = "SELECT * FROM posts";
                                    $select_all_posts_query = mysqli_query($con, $query); 
                                    while($row = mysqli_fetch_assoc($select_all_posts_query)){
                                        $post_title = $row['post_title'];
                                        $post_image = $row['post_image'];
                                        $post_content = $row['post_content'];
                                        
                            ?>
                        <div class="sub-section">
                           
                            
                                    <img class="workshop-wrap1" src="img/<?php echo $post_image ?>" alt="">

                                    <div class="workshop-content">
                                    <h3>
                                            <a href="">
                                                <?php echo $post_title ?>
                                            </a>
                                    </h3>
                                            <p><?php echo $post_content ?></p>
                                            <br>
                                            <a href="" class="readmore">Read More</a>
                                    </div>
                            
                            <br>
                        </div>
                        <?php } ?> 
                    </div> 
                       
        </div>                                  
    </div>
    <br>
    <!--Workshop section ends-->

    <!--footer section Starts-->
    <?php

        include "includes/footer.php";

    ?>
    <!--footer section ends-->


    <script src="js/main.js" type="text/javascript"></script>
    <script src="js/typed.min.js" type="text/javascript"></script>
</body>

</html>