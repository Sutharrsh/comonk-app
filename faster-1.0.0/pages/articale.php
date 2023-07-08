<!DOCTYPE html>
<html lang="en">
<?php
// Assuming you have established the database connection
require '../database/config.php';
// Check if a blog post ID is provided in the query parameter
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $url = $_GET['id'];
    $decodedUrl = urldecode($url);
    $decryptedId = base64_decode($decodedUrl);

    // Prepare the query to retrieve the specific blog post
    $query = "SELECT * FROM `master_posts` WHERE `id` = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("i", $decryptedId);
    $stmt->execute();

    // Fetch the result
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Display the blog post in a card
        while ($row = $result->fetch_assoc()) {
           ?>
<head>
    <meta charset="utf-8">
    <title>comonk : media production</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta property="og:title" content="<?php echo $row['title']?>">
<meta property="og:description" content="<?php echo $row['content']?>">
<meta property="og:image" content="<?php echo $row['image_url']?>">
<meta property="og:url" content="https://www.comonk.com/pages/articale.php?id=<?php echo$_GET['id']?>">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/card-blog.css" rel="stylesheet">
</head>

<body>

    <?php require '../components/header.php'; ?>
<link rel="stylesheet" type="text/css" href="blog.css">

           <div class="card">
  <h2><?php echo $row['title']?></h2>
  <p><?php echo $row['content']?></p>
  <center>
    <img src="<?php echo $row['image_url']?>">
  </center>
  <p><?php echo $row['sub_content']?></p>
  <p><?php echo $row['last_content']?></p>
  <div class="author-info">
    <p><?php echo $row['author']?></p>
    <p><?php echo $row['publish_date']?></p>
  </div>
</div><?php
            // echo '<div class="card-a">';
            // echo '<h2>' . $row['title'] . '</h2>';
            // echo '<p>' . $row['content'] . '</p>';
            // echo '<center><img src='.$row['image_url'].'></center>';
            // echo '<p>' . $row['sub_content'] . '</p>';
            // echo '<p>' . $row['last_content'] . '</p>';
            // echo '<div><p>' . $row['author'] . '</p>';
            // echo '<p>' . $row['publish_date'] . '</p></div>';
            // // Display other blog post details
            // echo '</div>';
        }
    } else {
        echo 'No blog post found with the specified ID.';
    }

    // Close the statement and result set
    $stmt->close();
    $result->close();
} else {
    $postsPerPage = 1; // Number of posts per page
    $page = isset($_GET['page']) ? $_GET['page'] : 1;  // Current page number
    
    // Calculate the offset for the query
    $offset = ($page - 1) * $postsPerPage;
    $query = "SELECT * FROM `master_posts` LIMIT ?, ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("ii", $offset, $postsPerPage);
    $stmt->execute();
    

    // Fetch the result
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Display the blog post in a card
        while ($row = $result->fetch_assoc()) {
           ?>
<head>
    <meta charset="utf-8">
    <title>comonk : media production</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta property="og:title" content="<?php echo $row['title']?>">
<meta property="og:description" content="<?php echo $row['content']?>">
<meta property="og:image" content="<?php echo $row['image_url']?>">
<meta property="og:url" content="https://www.comonk.com/pages/articale.php?id=<?php echo$_GET['id']?>">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/card-blog.css" rel="stylesheet">
</head>

<body>

    <?php require '../components/header.php'; ?>
<link rel="stylesheet" type="text/css" href="blog.css">

           <div class="card">
  <h2><?php echo $row['title']?></h2>
  <p><?php echo $row['content']?></p>
  <center>
    <img src="<?php echo $row['image_url']?>">
  </center>
  <p><?php echo $row['sub_content']?></p>
  <p><?php echo $row['last_content']?></p>
  <div class="author-info">
    <p><?php echo $row['author']?></p>
    <p><?php echo $row['publish_date']?></p>
  </div>
</div>
<br>
<br>
<?php
// Count the total number of blog posts
$countSql = "SELECT COUNT(*) AS count FROM `master_posts`";
$countResult = $mysqli->query($countSql);
$rowCount = $countResult->fetch_assoc()['count'];

// Calculate the total number of pages
$totalPages = ceil($rowCount / $postsPerPage);

// Display navigation buttons
echo "<div class='pagination' style='display: flex;
justify-content: center;
letter-spacing: .5px;'>";
for ($i = $page; $i <= $totalPages; $i++) {
    echo "<a href='?page=$i' style='background: orangered;
    color: aliceblue;
    padding: 0.2rem 0.6rem;
    margin: 0rem 1rem;
    text-decoration:none;
    '>$i</a>";
}
echo "</div>";
?>

<?php
            // echo '<div class="card-a">';
            // echo '<h2>' . $row['title'] . '</h2>';
            // echo '<p>' . $row['content'] . '</p>';
            // echo '<center><img src='.$row['image_url'].'></center>';
            // echo '<p>' . $row['sub_content'] . '</p>';
            // echo '<p>' . $row['last_content'] . '</p>';
            // echo '<div><p>' . $row['author'] . '</p>';
            // echo '<p>' . $row['publish_date'] . '</p></div>';
            // // Display other blog post details
            // echo '</div>';
        }
    }
}
?>
<link rel="stylesheet" type="text/css" href="blog.css">

<?php require '../components/footer.php'; ?>

<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/waypoints/waypoints.min.js"></script>
<script src="lib/counterup/counterup.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>

<!-- Contact Javascript File -->
<script src="../mail/jqBootstrapValidation.min.js"></script>
<script src="../mail/contact.js"></script>

<!-- Template Javascript -->
<script src="../js/main.js"></script>
</body>

</html>
