<style>
.post-image img{
    width:199px;
}
.latest-feed-panel {
  background-color: #f2f2f2;
  padding: 20px;
  border-radius: 5px;
  
}

.latest-feed-panel h2 {
  text-align: center;
  margin-bottom: 20px;
}

.latest-feed-panel .post {
  margin-bottom: 20px;
  padding-bottom: 20px;
  border-bottom: 1px solid #ccc;
}

.latest-feed-panel .post:last-child {
  border-bottom: none;
}

.latest-feed-panel h3 {
  margin: 0;
}

.latest-feed-panel p {
  margin: 10px 0;
}

.latest-feed-panel a {
  display: block;
  text-align: center;
  font-weight: bold;
}

/* Responsive styles */

@media (max-width: 768px) {
  .latest-feed-panel {
    padding: 10px;
  }

  .latest-feed-panel .post {
    padding-bottom: 10px;
  }
}
.post{
    
    justify-content: space-evenly;
    display: flex;

}

</style>
<?php

require './database/config.php';
// Check if a blog post ID is provided in the query parameter
// if (isset($_GET['id']) && !empty($_GET['id'])) {
//     $url = $_GET['id'];
//     $decodedUrl = urldecode($url);
//     $decryptedId = base64_decode($decodedUrl);

//     // Prepare the query to retrieve the specific blog post
    $query = "SELECT * FROM `news` ORDER BY published_date DESC";
    $stmt = $mysqli->prepare($query);
    // $stmt->bind_param("i", $decryptedId);
    $stmt->execute();

    // Fetch the result
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Display the blog post in a card
        while ($row = $result->fetch_assoc()) {
           ?>
<div class="latest-feed-panel">
  <div class="post">
    <div class="post-image">
      <img src="<?php echo $row['image_path']?>" alt="Post Image">
    </div>
    <div class="post-content">
      <h3><?php echo $row['title']?></h3>
      <p>Post description or excerpt goes here.</p>
      <a href="#">Read More</a>
    </div>
  </div>
  <div class="post">
    <!-- Add image and content for the second post -->
  </div>
  <!-- Add more posts as needed -->
</div>
<?php 
        }
    }
?>

