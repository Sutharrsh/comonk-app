  <!-- Navbar Start -->
   <script>
        function showComingSoonAlert() {
            alert("Coming soon");
        }
        function business(){
            alert("Mail TO : Business@comonk.com /n page is under developement")
        }
        function quote(){
            alert("Future Belogs TO Us")
        }
    </script>
  
  <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-lg-5">
            <a href="index.html" class="navbar-brand ml-lg-3">
                <h1 class="m-0 display-5 text-uppercase text-primary">comonk</h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-lg-3" id="navbarCollapse">
                <div class="navbar-nav m-auto py-0">
                    <a href="./index.php" class="nav-item nav-link">Home</a>
                    <a href="../pages/about.php?page=<?php echo $i=1?>" class="nav-item nav-link">Blog</a>
                    <a href="../pages/articale.php" class="nav-item nav-link" disable>articles</a>
                    <a href="#" class="nav-item nav-link" onclick="showComingSoonAlert();">Price</script></a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="#" class="dropdown-item" onclick="business();">contact us</a>
                            <a href="#" class="dropdown-item" onclick="showComingSoonAlert();">Blog Detail</a>
                        </div>
                    </div>
                    <a href="./about.php" class="nav-item nav-link">Contact</a>
                </div>
                <a href="#" class="btn btn-primary py-2 px-4 d-none d-lg-block" onclick="quote();">Get A Quote</a>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->
