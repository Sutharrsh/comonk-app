<!DOCTYPE html>
<html>
<head>
    <title>File Upload Form</title>
<!-- Google Web Fonts -->
<link href="img/favicon.ico" rel="icon">

<!-- Google Web Fonts -->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

<!-- Libraries Stylesheet -->
<link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

<!-- Customized Bootstrap Stylesheet -->
<link href="../css/style.css" rel="stylesheet">
   <style>
    *{        
  font-family: "Poppins", sans-serif;
    }
/* CSS for larger screens */
form {
 
    max-width: 600px;
  margin: 0 auto;
  background: aliceblue;
    padding: 1rem;
    display: grid;
    border-radius: 0.8rem;
}

input[type="text"],
textarea,
input[type='file']::-webkit-file-upload-button, 
input[type='date'],
select{
  width: 100%;
  padding: 10px;
  
  border: 1px solid orangered;
    border-radius: 0.8rem;
    color: orangered;
  box-sizing: border-box;
}

input[type="submit"] {
  display: block;
  width: 100%;
  padding: 10px;
  background-color:orangered;
  color: white;
  
  border-radius: 0.8rem;
  border: none;
  cursor: pointer;
}

/* CSS for smaller screens */
@media screen and (max-width: 600px) {
  form {
    padding: 20px;
  }

  input[type="text"],
  textarea {
    margin-bottom: 10px;
  }

  input[type="submit"] {
    width: auto;
  }
}
.admin-navbar {
  background-color: #333;
  color: #fff;
  padding: 10px;
}

.admin-nav {
  list-style: none;
  margin: 0;
  padding: 0;
  display: flex;
}

.admin-nav li {
  margin-right: 10px;
}

.admin-nav li a {
  color: #fff;
  text-decoration: none;
  padding: 5px 10px;
}

.admin-nav li a:hover {
  background-color: #555;
}

/* Responsive Styles */
@media screen and (max-width: 768px) {
  .admin-nav {
    flex-wrap: wrap;
    justify-content: center;
  }

  .admin-nav li {
    margin-right: 0;
    margin-bottom: 5px;
  }
}


   </style>
</head>
<body>
    <?php
try {
  session_start();
if(!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
    header("Location:admin.php");
    exit;
}
    require '../database/config.php';
    $category_query = "SELECT category_id, category_name FROM categories";
    $category_result = $mysqli->query($category_query);
    $categories = [];
    while ($row = $category_result->fetch_assoc()) {
        $categories[$row['category_id']] = $row['category_name'];
    }

    // Check if the form is submitted
    if (isset($_POST['submit'])) {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $sub_content = $_POST['sub_content'];
        $last_content = $_POST['last_content'];
        $author = $_POST['author'];
        $publish_date = $_POST['publish_date'];
        $category_id = $_POST['category'];
        // Get file details
        $file_name = $_FILES['file']['name'];
        $file_size = $_FILES['file']['size'];
        $file_tmp = $_FILES['file']['tmp_name'];
        $file_type = $_FILES['file']['type'];

        // Specify the upload directory
        $upload_dir = 'uploads/';

        // Move the uploaded file to the desired location
        if (move_uploaded_file($file_tmp, $upload_dir . $file_name)) {
            // Insert form data and file details into the database
            $sql = "INSERT INTO master_posts (title, content, sub_content, last_content, author, publish_date, category, image_url) 
                    VALUES ('$title', '$content', '$sub_content', '$last_content', '$author', '$publish_date', '$category_id', '$upload_dir$file_name')";

            if ($mysqli->query($sql) === TRUE) {
                echo "Post uploaded and saved in the database.";
            } else {
                throw new Exception("Error: " . $sql . "<br>" . $mysqli->error);
            }
        } else {
            throw new Exception("Error uploading the file.");
        }
    }
    // Close the database connection
    $mysqli->close();

  } catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

?>
<nav class="admin-navbar">
  <ul class="admin-nav">
    <li><a href="#">Dashboard</a></li>
    <li><a href="#">Posts</a></li>
    <li><a href="#">Users</a></li>
    <li><a href="#">Settings</a></li>
    <li><a href="./logout.php">Logout</a></li>
  </ul>
</nav>

<div class="form-grid">
 <form action="" method="POST" enctype="multipart/form-data">
        <input type="text" name="title" placeholder="Enter Title" required><br><br>
        <textarea name="content" placeholder="Enter Description" required></textarea><br><br>
       
        <textarea name="sub_content" placeholder="Enter Content" required></textarea><br><br>
        <textarea name="last_content" placeholder="Enter Conclusion" required></textarea><br><br>
        <input type="text" name="author" placeholder="comonk" required><br><br>
       
        <input type="date" name="publish_date" min="2023-06-18" required><br><br>
        <select name="category" required>
            <option value="">Select Category</option>
            <?php
            foreach ($categories as $category_id => $category_name) {
                echo "<option value='$category_id'>$category_name</option>";
            }
            ?>
        </select><br><br>
        <input type="file" name="file" required><br><br>
        <input type="submit" name="submit" value="Upload">
    </form>
</div>
</body>
</html>
