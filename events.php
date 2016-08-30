<?php

include("config.php");
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME) or die ("connection failed");
$event = $_GET['id'];

try {
    $query = mysqli_query($mysqli, "Select * from events where id='$event'");

    while($row = mysqli_fetch_array($query)) {
        echo '<!-- Blog Posts -->
	<div class="blog-single-post">
	<!-- post image -->
	<div class="post-header-image">
		<img src="img/events/'.$row['event_image'].'" alt="">
	</div>										
	<!-- /post-image -->	

	<!-- post title -->
	<h2 class="blog-single-title">'.$row['event_name'].'</h2>
	<!-- /post title -->
										
	<!-- post content -->
	<div class="blog-single-content">
		<p>'.$row['details'].'</p>
		
	</div>
	<!-- /post content -->

	<!--=== Blog Comments -->
	<div class="blog-comments">
		<h2 class="blog-single-title blog-comments-title">Rules</h2>

        <hr>
        <!-- /Comments Form -->

        <!-- Posted Comments -->

        <!-- Comment -->
        <div class="media">
            <div class="media-body">
                <h4 class="media-heading">1 . Rule 1
                    <small>Must be obeyed</small>
                </h4>
               
            </div>
        </div>
		<!-- /Comment -->

        <!-- Comment -->
        
		<!-- /Comment -->
	</div>
    <!-- === /Blog Comments -->
</div>			
<!-- /Blog Posts -->';
    }
    	} catch(PDOException $e) {
            echo $e->getMessage();
    }

?>
	