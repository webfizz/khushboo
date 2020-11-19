<nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <!--Responsive Menu-->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navi">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a href="" class="navbar-brand"><img src="img/WithYou.png"></a>
            </div>
            <div class="collapse navbar-collapse" id="navi">
                <!--Navigation Menu Starts-->
                <ul class="nav navbar-nav mr-auto navbar-right">

                    <?php 
                            $query = "SELECT * FROM categories";
                            $select_all_categories_query = mysqli_query($con, $query);

                            while($row = mysqli_fetch_assoc ($select_all_categories_query)){
                                $cat_title = $row['cat_title'];
                                echo "<li><a href='#'>{$cat_title}</a></li>";
                            }
                            echo "<li><a href='registration.php'>Registration</a></li>";
                    ?>
                </ul>
                <!--Navigation Menu Ends-->
            </div>
        </div>
    </nav>