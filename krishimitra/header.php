<?php
if(!isset($_SESSION)) { session_start(); }
error_reporting(E_ALL & ~E_NOTICE  &  ~E_STRICT  &  ~E_WARNING);
$dt = date("Y-m-d");
$rupeesymbol= "₹";
include("dbconnection.php");
?> 
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Krishi Mitra</title>
  <meta content="" name="Krishi Mitra Web Portal helps farmers by providing all kinds agriculture related information in the website.">
  <meta content="Agriculture Management System, Krishi Mitra" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  
  <link href="assets/css/jquery.dataTables.min.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container">
      <div class="header-container d-flex align-items-center">
        <div class="logo mr-auto">
          <h1 class="text-light"><a href="index.php"><span>KRISHI MITRA</span></a></h1>
          <!-- Uncomment below if you prefer to use an image logo -->
          <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>

        <nav class="nav-menu d-none d-lg-block">
          <ul>
		  
            <li class="<?php
                            if(basename($_SERVER['PHP_SELF']) == "index.php" )
                            {
                              echo ' active ';
                            }
                            ?>"><a href="index.php">Home</a></li>

			<li class="drop-down <?php
                            if(basename($_SERVER['PHP_SELF']) == "displaysales.php" )
                            {
                              echo ' active ';
                            }
                            ?>"><a href="displaysales.php" onclick='window.location=`displaysales.php`'>Farmer's Market</a>
              <ul>
<?php
$sqlcategoryfm = "SELECT * FROM category where status='Active' AND category_type='Produce'";
$qsqlcategoryfm =mysqli_query($con,$sqlcategoryfm);
echo mysqli_error($con);
while($rscategoryfm = mysqli_fetch_array($qsqlcategoryfm))
{
echo "<li><a href='displaysales.php?category_id=$rscategoryfm[category_id]&category=$rscategoryfm[category]'  onclick='window.location=`displaysales.php?category_id=$rscategoryfm[category_id]&category=$rscategoryfm[category]`'>$rscategoryfm[category]</a></li>";
}
?>
              </ul>
            </li>
			
			
	
	<li class="drop-down"><a href="#">News & Articles</a>
	  <ul>
			<li><a href="displaynews.php?articletype=News">News</a></li>
			<li><a href="displayarticles.php?articletype=Blog">Articles</a></li>
	  </ul>
	</li>
	

<?php
if(isset($_SESSION['customerid']))
{
?>
<li class="drop-down <?php
                            if(basename($_SERVER['PHP_SELF']) == "customerpanel.php" || basename($_SERVER['PHP_SELF']) == "customerUpdate.php" || basename($_SERVER['PHP_SELF']) == "Customerchngpassword.php"  || basename($_SERVER['PHP_SELF']) == "viewcstpurchasereport.php"  || basename($_SERVER['PHP_SELF']) == "viewpurchaserequest.php"  || basename($_SERVER['PHP_SELF']) == "viewcstpurchaseorder.php"  || basename($_SERVER['PHP_SELF']) == "viewpurchasereport.php"  )
                            {
                              echo ' active ';
                            }
                            ?>" ><a href="">My Account</a>
  <ul>
	<li><a href="customerpanel.php">Customer Panel</a></li>					
    <li><a href="viewpurchaserequest.php">View Farm Produce Purchase request</a></li>
    <li><a href="viewcstpurchaseorder.php">View Farm Produce Purchase Order</a></li>
    <li><a href="viewpurchasereport.php">View Billing Report</a></li>
	<li><a href="customerUpdate.php">Update Profile</a></li>
	<li><a href="Customerchngpassword.php">Change Password</a></li>
	<li><a href="logout.php">Logout</a></li>
  </ul>
</li>
<?php
}
else if(isset($_SESSION['sellerid']))
{
?>
<li class="drop-down <?php
                            if(basename($_SERVER['PHP_SELF']) == "viewworkerrequest.php" || basename($_SERVER['PHP_SELF']) == "viewcstpurchasereport.php" || basename($_SERVER['PHP_SELF']) == "viewpurchasereport.php" || basename($_SERVER['PHP_SELF']) == "viewpurchaseorder.php" || basename($_SERVER['PHP_SELF']) == "sellerpanelchart.php" || basename($_SERVER['PHP_SELF']) == "Product.php" || basename($_SERVER['PHP_SELF']) == "viewProduct.php" || basename($_SERVER['PHP_SELF']) == "sellerprofile.php" || basename($_SERVER['PHP_SELF']) == "Sellerchngpassword.php" || basename($_SERVER['PHP_SELF']) == "sellerpanel.php")
                            {
                              echo ' active ';
                            }
                            ?>" ><a href="">My Account</a>
  <ul>
	<li><a href="sellerpanel.php">Farmer Panel</a></li>
		
	<li class="drop-down"><a href="#">My Profile</a>
	  <ul>
			<li><a href="sellerprofile.php">Update Profile</a></li>
			<li><a href="Sellerchngpassword.php">Change Password</a></li>
	  </ul>
	</li>
	
	<li class="drop-down"><a href="#">Produce</a>
	  <ul>
			<li><a href="Product.php">Put Your Produce On Sale</a></li>
			<li><a href="viewProduct.php">View Your Produce On Sale</a></li>
	  </ul>
	</li>
			
	<li class="drop-down"><a href="#">Farm Sales Report</a>
	  <ul>
			<li><a href="sellerpanelchart.php">Progress Chart</a></li>
          	<li><a href="viewsellerpurchaserequest.php">View Purchase Request</a></li>
         	<li><a href="viewpurchaseorder.php">View Purchase Order</a></li>
          	<li><a href="viewpurchasereport.php">Purchase Billing Report</a></li>
	  </ul>
	</li>
	
	<li><a href="logout.php">Logout</a></li>
  </ul>
</li>
<?php
}
else if(isset($_SESSION['workerid']))
{
?>
<li class="drop-down <?php if(basename($_SERVER['PHP_SELF']) == "workerpanel.php" || basename($_SERVER['PHP_SELF']) == "workerprofile.php" || basename($_SERVER['PHP_SELF']) == "Workerchngpassword.php"  )
                            {
                              echo ' active ';
                            }
                            ?>" ><a href="">My Account</a>
  <ul>
	<li><a href="workerpanel.php">Worker Panel</a></li>
	<li><a href="workerprofile.php">My Profile</a></li>
	<li><a href="Workerchngpassword.php">Change Password</a></li>
	<li><a href="viewworkerrequest.php">View Your Jobs</a></li>
    <li><a href="workerpanel.php?workschedule=set">Work Schedule</a></li>
	<li><a href="logout.php">Logout</a></li>
  </ul>
</li>
<?php
}
else if(isset($_SESSION['adminid']))
{
?>
<li class="drop-down <?php
                            if(basename($_SERVER['PHP_SELF']) == "adminpanel.php" || basename($_SERVER['PHP_SELF']) == "customerUpdate.php" || basename($_SERVER['PHP_SELF']) == "Customerchngpassword.php" || basename($_SERVER['PHP_SELF']) == "adminpanel.php" || basename($_SERVER['PHP_SELF']) == "customerUpdate.php" || basename($_SERVER['PHP_SELF']) == "Customerchngpassword.php" || basename($_SERVER['PHP_SELF']) == "viewcustomerReg.php" || basename($_SERVER['PHP_SELF']) == "viewadminpurchasereport.php" || basename($_SERVER['PHP_SELF']) == "viewadminpurchaserequest.php" || basename($_SERVER['PHP_SELF']) == "viewpurchasereport.php" || basename($_SERVER['PHP_SELF']) == "admin.php" || basename($_SERVER['PHP_SELF']) == "viewadmin.php" || basename($_SERVER['PHP_SELF']) == "chngadminpassword.php" || basename($_SERVER['PHP_SELF']) == "city.php" || basename($_SERVER['PHP_SELF']) == "viewcity.php" || basename($_SERVER['PHP_SELF']) == "state.php" || basename($_SERVER['PHP_SELF']) == "viewstate.php" || basename($_SERVER['PHP_SELF']) == "country.php" || basename($_SERVER['PHP_SELF']) == "viewcountry.php" || basename($_SERVER['PHP_SELF']) == "category.php" || basename($_SERVER['PHP_SELF']) == "viewcategory.php" || basename($_SERVER['PHP_SELF']) == "Produce.php" || basename($_SERVER['PHP_SELF']) == "viewProduce.php" || basename($_SERVER['PHP_SELF']) == "variety.php" || basename($_SERVER['PHP_SELF']) == "viewvariety.php" || basename($_SERVER['PHP_SELF']) == "sellingproduce.php" || basename($_SERVER['PHP_SELF']) == "viewSellingProduce.php" || basename($_SERVER['PHP_SELF']) == "viewseller.php" || basename($_SERVER['PHP_SELF']) == "viewworker.php" || basename($_SERVER['PHP_SELF']) == "viewworkerrequest.php" || basename($_SERVER['PHP_SELF']) == "sellingproduct.php" || basename($_SERVER['PHP_SELF']) == "viewsellingproduct.php" || basename($_SERVER['PHP_SELF']) == "article.php" || basename($_SERVER['PHP_SELF']) == "viewarticle.php" )
                            {
                              echo ' active ';
                            }
                            ?>" ><a href="">My Account</a>
  <ul>
	<li><a href="adminpanel.php">Admin Panel</a></li>
		
	<li class="drop-down"><a href="#">Report</a>
	  <ul>
		<li><a href="viewcustomerReg.php">Customer Report</a></li>      
		<li><a href="viewseller.php">Farmers Report</a></li>
		<li><a href="viewSellingProduce.php">Farmers Produce Report</a></li>
		<li><a href="viewadminpurchaserequest.php">Produce Purchase Request</a></li>
		<li><a href="viewpurchasereport.php">Produce  Billing Report</a></li>
	  </ul>
	</li>

	
		
	<li class="drop-down"><a href="#">Farmer Settings</a>
	  <ul>
<li><a href="category.php?cattype=Produce">Add Produce category</a></li>
<li><a href="viewcategory.php?cattype=Produce">View Produce category</a></li>   
<li><a href="Produce.php">Add Produce types</a></li>
<li><a href="viewProduce.php">View Produce types</a></li>
	  </ul>
	</li>
			
	<li class="drop-down"><a href="#">Article</a>
	  <ul>
<li><a href="article.php">Publish News & Articles</a></li>
<li><a href="viewarticle.php">View News & Articles</a></li>
	  </ul>
	</li>

	<li class="drop-down"><a href="#">Settings</a>
	  <ul>    
		<li><a href="city.php">Add City</a></li>
		<li><a href="viewcity.php">View City</a></li>
		<li><a href="state.php">Add State</a></li>
		<li><a href="viewstate.php">View State</a></li>
		<li><a href="chngadminpassword.php">Change My Password</a></li>
	  </ul>
	</li>
	
	<li><a href="logout.php">Logout</a></li>
  </ul>
</li>
<?php
}
else
{
?>
<li class="drop-down"><a href="">My Account</a>
  <ul>
	<li><a href="customerreglogin.php">Customer Account</a></li>
	<li><a href="farmerreglogin.php">Farmer Account</a></li>
  </ul>
</li>
<?php
}
?>	
			<li><a href="contact.php">Contact</a></li>
          </ul>
        </nav><!-- .nav-menu -->
      </div><!-- End Header Container -->
    </div>
  </header><!-- End Header -->