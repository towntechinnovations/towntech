       
                <?php $query=mysqli_query($con,"select * from tblsite");
while($row=mysqli_fetch_array($query)){
$logo=$row['siteLogo']; 
$wtitle=$row['siteTitle'];
}  ?>
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #faedcd;">
            <div class="container px-5">
                <a class="navbar-brand" href="index.php">   <?php echo $wtitle;?></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php
                            ">Emergency Report</a></li>
      
                        <li class="nav-item"><a class="nav-link" href="search.php">View Status</a></li>
                        <li class="nav-item"><a class="nav-link" href="admin/">Admin</a></li>
                    </ul>
                </div>
            </div>
        </nav>