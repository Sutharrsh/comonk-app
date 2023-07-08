<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>comonk : media production</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

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
    <?php
    require '../database/config.php';
    $postsPerPage = 6; // Number of posts per page
    $page = isset($_GET['page']) ? $_GET['page'] : 1; // Current page number
    
    // Calculate the offset for the query
    $offset = ($page - 1) * $postsPerPage;
    // Retrieve the selected category (assuming it's passed as a query parameter)
    $category = isset($_GET['category']) ? $_GET['category'] : '';

    // Build the SQL query based on the selected category
    $sql = "SELECT mp.id,mp.title, c.category_name, LEFT(mp.content, 100) AS preview,mp.image_url
        FROM master_posts mp
        JOIN categories c ON mp.category = c.category_id  LIMIT $offset, $postsPerPage";

    if ($category) {
        $sql .= " WHERE c.category_name = '$category'";
    }

    // Execute the SQL query
    $result = $mysqli->query($sql);
if (!$result) {
    echo "Error executing the query: " . $mysqli->error;
    exit; // Terminate the script to prevent further execution
}
    ?><div id="blog-grid"><?php
    if ($result->num_rows > 0) {

        // Loop through the rows and fetch the data
        while ($row = $result->fetch_assoc()) {
           
        $postID = $row['id'];
        $categoryName = $row['category_name'];
        $title = $row['title'];
        $preview = $row['preview'];
        
    $descriptionLines = explode(" ", $preview);
    $limitedDescription = implode(" ", array_slice($descriptionLines, 0, 10));
    
    $titleLines = explode(" ", $title);
    $titlelimit = implode(" ", array_slice($titleLines, 0, 6));
?>
        <div id="card-blog">
        <div id="img"><image src="<?php echo $row['image_url']?>"></div>
        <h5><?php echo $titlelimit?></h5>
        <p><strong>Category:</strong><?php echo  $categoryName?> </p>
        <p style="font-size:0.7rem"><?php echo $limitedDescription."..." ?> </p>
        <a href="articale.php?id='<?php $encryptedId = base64_encode($postID); // Encrypt the ID

$url = urlencode($encryptedId); 
echo $url?>'">Read More</a>
        </div>
        
        <?php
    }

    echo "</div>";
}
?>
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
letter-spacing: 2px;'>";
for ($i = 1; $i <= $totalPages; $i++) {
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
// Retrieve the form data
// $title = $_POST['title'];
// $content = $_POST['content'];

// // Process the uploaded image
// $imageName = $_FILES['image']['name'];
// $imageTmpName = $_FILES['image']['tmp_name'];
// $imagePath = "../img/" . $imageName;

// // Move the uploaded image to the "img" folder
// if (move_uploaded_file($imageTmpName, $imagePath)) {
//     // Save the blog post to the database
//     $sql = "INSERT INTO blog_posts (title, content, image_path) VALUES ('$title', '$content', '$imagePath')";

//     if (mysqli_query($conn, $sql)) {
//         echo "Blog post created successfully.";
//     } else {
//         echo "Error: " . mysqli_error($conn);
//     }
// } else {
//     echo "Error uploading the image.";
// }


    // Close the database connection
    $mysqli->close();
    ?>
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
