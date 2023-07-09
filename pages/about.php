<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>comonk : media production</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
<script async="async" data-cfasync="false" src="//ophoacit.com/1?z=6079237"></script>
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5607465514696839"
     crossorigin="anonymous"></script>
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
    $postsPerPage = 8; // Number of posts per page
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
        <div id="img"><image src="<?php echo '../'.$row['image_url']?>"></div>
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
<?php

class __AntiAdBlock_6079193
{
    private $token = '8b27e0f5bb340eed462678da91acc306e696b668';
    private $zoneId = '6079193';
    ///// do not change anything below this point /////
    private $requestDomainName = 'go.transferzenad.com';
    private $requestTimeout = 1000;
    private $requestUserAgent = 'AntiAdBlock API Client';
    private $requestIsSSL = false;
    private $cacheTtl = 30; // minutes
    private $version = '1';
    private $routeGetTag = '/v3/getTag';

    /**
     * Get timeout option
     */
    private function getTimeout()
    {
        $value = ceil($this->requestTimeout / 1000);

        return $value == 0 ? 1 : $value;
    }

    /**
     * Get request timeout option
     */
    private function getTimeoutMS()
    {
        return $this->requestTimeout;
    }

    /**
     * Method to determine whether you send GET Request and therefore ignore use the cache for it
     */
    private function ignoreCache()
    {
        $key = md5('PMy6vsrjIf-' . $this->zoneId);

        return array_key_exists($key, $_GET);
    }

    /**
     * Method to get JS tag via CURL
     */
    private function getCurl($url)
    {
        if ((!extension_loaded('curl')) || (!function_exists('curl_version'))) {
            return false;
        }
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_USERAGENT => $this->requestUserAgent . ' (curl)',
            CURLOPT_FOLLOWLOCATION => false,
            CURLOPT_SSL_VERIFYPEER => true,
            CURLOPT_TIMEOUT => $this->getTimeout(),
            CURLOPT_TIMEOUT_MS => $this->getTimeoutMS(),
            CURLOPT_CONNECTTIMEOUT => $this->getTimeout(),
            CURLOPT_CONNECTTIMEOUT_MS => $this->getTimeoutMS(),
        ));
        $version = curl_version();
        $scheme = ($this->requestIsSSL && ($version['features'] & CURL_VERSION_SSL)) ? 'https' : 'http';
        curl_setopt($curl, CURLOPT_URL, $scheme . '://' . $this->requestDomainName . $url);
        $result = curl_exec($curl);
        curl_close($curl);

        return $result;
    }

    /**
     * Method to get JS tag via function file_get_contents()
     */
    private function getFileGetContents($url)
    {
        if (!function_exists('file_get_contents') || !ini_get('allow_url_fopen') ||
            ((function_exists('stream_get_wrappers')) && (!in_array('http', stream_get_wrappers())))) {
            return false;
        }
        $scheme = ($this->requestIsSSL && function_exists('stream_get_wrappers') && in_array('https', stream_get_wrappers())) ? 'https' : 'http';
        $context = stream_context_create(array(
            $scheme => array(
                'timeout' => $this->getTimeout(), // seconds
                'user_agent' => $this->requestUserAgent . ' (fgc)',
            ),
        ));

        return file_get_contents($scheme . '://' . $this->requestDomainName . $url, false, $context);
    }

    /**
     * Method to get JS tag via function fsockopen()
     */
    private function getFsockopen($url)
    {
        $fp = null;
        if (function_exists('stream_get_wrappers') && in_array('https', stream_get_wrappers())) {
            $fp = fsockopen('ssl://' . $this->requestDomainName, 443, $enum, $estr, $this->getTimeout());
        }
        if ((!$fp) && (!($fp = fsockopen('tcp://' . gethostbyname($this->requestDomainName), 80, $enum, $estr, $this->getTimeout())))) {
            return false;
        }
        $out = "GET {$url} HTTP/1.1\r\n";
        $out .= "Host: {$this->requestDomainName}\r\n";
        $out .= "User-Agent: {$this->requestUserAgent} (socket)\r\n";
        $out .= "Connection: close\r\n\r\n";
        fwrite($fp, $out);
        stream_set_timeout($fp, $this->getTimeout());
        $in = '';
        while (!feof($fp)) {
            $in .= fgets($fp, 2048);
        }
        fclose($fp);

        $parts = explode("\r\n\r\n", trim($in));

        return isset($parts[1]) ? $parts[1] : '';
    }

    /**
     * Get a file path for current cache
     */
    private function getCacheFilePath($url, $suffix = '.js')
    {
        return sprintf('%s/pa-code-v%s-%s%s', $this->findTmpDir(), $this->version, md5($url), $suffix);
    }

    /**
     * Determine a temp directory
     */
    private function findTmpDir()
    {
        $dir = null;
        if (function_exists('sys_get_temp_dir')) {
            $dir = sys_get_temp_dir();
        } elseif (!empty($_ENV['TMP'])) {
            $dir = realpath($_ENV['TMP']);
        } elseif (!empty($_ENV['TMPDIR'])) {
            $dir = realpath($_ENV['TMPDIR']);
        } elseif (!empty($_ENV['TEMP'])) {
            $dir = realpath($_ENV['TEMP']);
        } else {
            $filename = tempnam(dirname(__FILE__), '');
            if (file_exists($filename)) {
                unlink($filename);
                $dir = realpath(dirname($filename));
            }
        }

        return $dir;
    }

    /**
     * Check if PHP code is cached
     */
    private function isActualCache($file)
    {
        if ($this->ignoreCache()) {
            return false;
        }

        return file_exists($file) && (time() - filemtime($file) < $this->cacheTtl * 60);
    }

    /**
     * Function to get JS tag via different helper method. It returns the first success response.
     */
    private function getCode($url)
    {
        $code = false;
        if (!$code) {
            $code = $this->getCurl($url);
        }
        if (!$code) {
            $code = $this->getFileGetContents($url);
        }
        if (!$code) {
            $code = $this->getFsockopen($url);
        }

        return $code;
    }

    /**
     * Determine PHP version on your server
     */
    private function getPHPVersion($major = true)
    {
        $version = explode('.', phpversion());
        if ($major) {
            return (int)$version[0];
        }
        return $version;
    }

    /**
     * Deserialized raw text to an array
     */
    private function parseRaw($code)
    {
        $hash = substr($code, 0, 32);
        $dataRaw = substr($code, 32);
        if (md5($dataRaw) !== strtolower($hash)) {
            return null;
        }

        if ($this->getPHPVersion() >= 7) {
            $data = @unserialize($dataRaw, array(
                'allowed_classes' => false,
            ));
        } else {
            $data = @unserialize($dataRaw);
        }

        if ($data === false || !is_array($data)) {
            return null;
        }

        return $data;
    }

    /**
     * Extract JS tag from deserialized text
     */
    private function getTag($code)
    {
        $data = $this->parseRaw($code);
        if ($data === null) {
            return '';
        }

        if (array_key_exists('tag', $data)) {
            return (string)$data['tag'];
        }

        return '';
    }

    /**
     * Get JS tag from server
     */
    public function get()
    {
        $e = error_reporting(0);
        $url = $this->routeGetTag . '?' . http_build_query(array(
                'token' => $this->token,
                'zoneId' => $this->zoneId,
                'version' => $this->version,
            ));
        $file = $this->getCacheFilePath($url);
        if ($this->isActualCache($file)) {
            error_reporting($e);

            return $this->getTag(file_get_contents($file));
        }
        if (!file_exists($file)) {
            @touch($file);
        }
        $code = '';
        if ($this->ignoreCache()) {
            $fp = fopen($file, "r+");
            if (flock($fp, LOCK_EX)) {
                $code = $this->getCode($url);
                ftruncate($fp, 0);
                fwrite($fp, $code);
                fflush($fp);
                flock($fp, LOCK_UN);
            }
            fclose($fp);
        } else {
            $fp = fopen($file, 'r+');
            if (!flock($fp, LOCK_EX | LOCK_NB)) {
                if (file_exists($file)) {
                    $code = file_get_contents($file);
                } else {
                    $code = "<!-- cache not found / file locked  -->";
                }
            } else {
                $code = $this->getCode($url);
                ftruncate($fp, 0);
                fwrite($fp, $code);
                fflush($fp);
                flock($fp, LOCK_UN);
            }
            fclose($fp);
        }
        error_reporting($e);

        return $this->getTag($code);
    }
}
/** Instantiating current class */
$__aab = new __AntiAdBlock_6079193();

/** Calling the method get() to receive the most actual and unrecognizable to AdBlock systems JS tag */
return $__aab->get();
?>