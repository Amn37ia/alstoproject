<?php 
//Defining vari Page 
define('page_title','Item Material');
define('page_name','item');

//get header
include('header.php'); 

// Function Create Button
if(isset($_POST['submit_id'])) {

    $name 			= $_POST['name'];
    $type 			= $_POST['type'];
    $description 	= $_POST['description'];
    $rating 		= $_POST['rating'];
    $maps 			= $_POST['maps'];
    $conditional 	= $_POST['conditional'];
    $category 		= $_POST['category'];

 	$aux = '';
	foreach($maps as $mapid => $mapname) {
		// Do whatever you please with the data.
 		$aux .= "$mapname,"; // For instance.
	}
	$maparray = rtrim($aux, ",");

    $query = "INSERT INTO material(type,name,description,rating,maps,conditional,category) 
    		  VALUES('$type','$name','$description','$rating','$maparray','$conditional','$category')";

    if ($con->query($query) === TRUE) {
        header('location:index.php');
    } else {
        alert("Error: " . $query . "<br>" . $con->error); 
    }

}

//Function Update Button
if(isset($_POST['update_id'])) {
	$id = intval ($_POST ['update_id']);
	$name 			= $_POST['name'];
    $type 			= $_POST['type'];
    $description 	= $_POST['description'];
    $rating 		= $_POST['rating'];
    $maps 			= $_POST['maps'];
    $conditional 	= $_POST['conditional'];
    $category 		= $_POST['category'];

    $aux = '';
	foreach($maps as $mapid => $mapname) {
		// Do whatever you please with the data.
 		$aux .= "$mapname,"; // For instance.
	}
	$maparray = rtrim($aux, ",");

	$query = "UPDATE material SET
            name = '$name',
            type = '$type',
            description = '$description',
            rating = '$rating',
            maps = '$maparray',
            conditional = '$conditional',
            category = '$category'
          	WHERE id = '$id'";

 	$result = mysqli_query($con, $query);
}


// Function Delete Button
if (isset($_GET['delete_id'])) {
	// get value of id that sent from address bar 
	$delete_id = (int) $_GET['delete_id'];

	// Delete data in mysql from row that has this id 
	$query="DELETE FROM material WHERE id='$delete_id'";
	$result=$con->query($query);

	// if successfully deleted
	if ($con->query($query) === TRUE){
	    header('location:index.php');
	} else {
	    alert("Error: " . $query . "<br>" . $con->error); 
	}
}

// Function Read
$sql 		= 'SELECT * FROM material ORDER BY id DESC';
$fetchquery = mysqli_query($con, $sql);
$base_url	= "http://".$_SERVER['SERVER_NAME'].dirname($_SERVER["REQUEST_URI"].'?').'/';

?>

<body>
	
<div id="wrapper" class="active">  

    <?php include("partial/page_menu.php"); ?>

    <div id="page-container" class="container-fluid">
	<div class="row">

	<article id ="main-post" class="col-md-6 col-sm-12">
		<header class="logo col-md-12 col-sm-12 d-lg-none d-sm-block"><a href="<?php echo $base_url?>" alt="<?php echo web_title?>"><img style="top:0;" src="img/logos.png" class="img-logo-m"/></a></header>

		<?php include("partial/page_menu_m.php"); ?>

		<table class="table-item" id= "table-id">
			<thead class="table-head">
			<tr>
				<td colspan="4"><h5 style="color:#fff"><?php echo page_title?></h5>

				  <div class="input-group button-float-right d-lg-block d-none">
				  	<div class="dropdown">
					  <button class="btn btn-sorted dropdown-toggle" type="button" id="dropdown-sorter" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					    <i class="fa fa-sort-amount-asc" aria-hidden="true"></i> Sort By
					  </button>

					  <nav class="dropdown-menu" aria-labelledby="dropdown-sorter">
					    <button class="dropdown-item btn-sortner" data-target="name" type="button"><i class="fa fa-list" aria-hidden="true"></i>Name</button>
					    <button class="dropdown-item btn-sortner" data-target="type" type="button"><i class="fa fa-cog" aria-hidden="true"></i>Type</button>
					    <button class="dropdown-item btn-sortner" data-target="rating" type="button"><i class="fa fa-star" aria-hidden="true"></i>Rating</button>
					    <button class="dropdown-item btn-sortner" data-target="conditional" type="button"><i class="fa fa-random" aria-hidden="true"></i>Condition</button>
					  </nav>
					</div>
				  
				  </div>
				</td>
			</tr>
			<tr><td colspan="4">
				<nav class="button-area d-lg-block d-none">
					<button type="button" class="btn btn-filter" data-target="expend"><i class="fa fa-leaf" aria-hidden="true"></i> Expend</button>
					<button type="button" class="btn btn-filter" data-target="housing"><i class="fa fa-cutlery" aria-hidden="true"></i>Housing</button>
					<button type="button" class="btn btn-filter" data-target="tool"><i class="fa fa-gavel" aria-hidden="true"></i>Tool</button>
					<button type="button" class="btn btn-filter" data-target="gear"><i class="fa fa-cog" aria-hidden="true"></i>Gear</button>
					<button type="button" class="btn btn-filter" data-target="all"><i class="fa fa-refresh" aria-hidden="true"></i>All Item</button>
				</nav>

				<div class="btn-group button-area dropdown d-lg-none d-sm-block">
				 
				  <button type="button" class="btn btn-sorted dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Filter By
				  </button>

				  <nav class="dropdown-menu">
				    <button class="dropdown-item btn-filter btn-filter-flat" data-target="expend" type="button"><i class="fa fa-leaf" aria-hidden="true"></i> Expend</button>
					<button class="dropdown-item btn-filter btn-filter-flat" data-target="housing" type="button"><i class="fa fa-cutlery" aria-hidden="true"></i>Housing</button>
					<button class="dropdown-item btn-filter btn-filter-flat" data-target="tool" type="button"><i class="fa fa-gavel" aria-hidden="true"></i>Tool</button>
					<button class="dropdown-item btn-filter btn-filter-flat" data-target="gear" type="button"><i class="fa fa-cog" aria-hidden="true"></i>Gear</button>
					<button class="dropdown-item btn-filter btn-filter-flat" data-target="all" type="button"><i class="fa fa-refresh" aria-hidden="true"></i>All Item</button>
				  </nav>
				</div>

				  <div class="btn-group button-area dropdown d-lg-none d-sm-block">
					  <button class="btn btn-sorted dropdown-toggle" type="button" id="dropdown-sorter" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					    Sort By
					  </button>

					  <div class="dropdown-menu" aria-labelledby="dropdown-sorter">
					    <button class="dropdown-item btn-sortner" data-target="name" type="button"><i class="fa fa-list" aria-hidden="true"></i>Name</button>
					    <button class="dropdown-item btn-sortner" data-target="type" type="button"><i class="fa fa-cog" aria-hidden="true"></i>Type</button>
					    <button class="dropdown-item btn-sortner" data-target="rating" type="button"><i class="fa fa-star" aria-hidden="true"></i>Rating</button>
					    <button class="dropdown-item btn-sortner" data-target="conditional" type="button"><i class="fa fa-random" aria-hidden="true"></i>Condition</button>
					</div>
				</div>

			</td></tr>
			</thead>
			<tbody class="table table-filter" id="myTable">

			<?php while ($row = mysqli_fetch_array($fetchquery)){ ?>
				
				<tr data-status="<?php echo $row['category']; ?>" data-type="<?php echo $row['type']; ?>" 
				data-rating="<?php echo $row['rating']; ?>" data-condition="<?php echo $row['conditional']; ?>" class="filter">
					<td>
						<div class="item col-md-12 col-sm-12">

						<!-- UPDATE TABLE AREA -->
						<table id="update-table" class="item-each-table table-update-list<?php echo $row['id']; ?> hide">
							<tr>
								<td align="center" class="edit col-md-1 tableButton" style="padding: 5px 1px !important;">
									<button rel="<?php echo $row['id'];?>"" class="btn btn-default btn-edit cancel-button"> <i class="fa fa-times-rectangle" style="font-size: 22px;" aria-hidden="true"></i></a>
									</button>
								</td>

								<td class="title-update name col-md-11 col-sm-4">
									<h4>Edit Data</h4>
								</td>
							</tr>

							<tr>
								<td colspan="2" class="col-md-12">
									<form name="update_form" method="post">
										<input type="hidden" name="update_id" value="<?php echo $row['id']; ?>" />

										<div class="form-row update-row">
											 <div class="form-group col-md-6">
											 	<div class="input-group input-group mb-3">
								  			<div class="input-group-prepend">
								   			 <span class="input-group-text" id="inputGroup-sizing-sm"><i class="fa fa-leaf" aria-hidden="true"></i></span>
								  			</div>
								 			 <input type="text" name="name" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="name" value="<?php echo $row['name']; ?>">
											</div>
											 </div>
											 
											 <div class="form-group col-md-6">
											 	<div class="input-group input-group mb-3">
											  <div class="input-group-prepend">
											    <label class="input-group-text" for="inputGroupSelect01"><i class="fa fa-cog" aria-hidden="true"></i></label>
											  </div>
											  <select class="custom-select" id="inputGroupSelect01" name="type" required>
											    <option selected>Type...</option>
											    <option value="consumable" <?php if($row['type'] == 'consumable'): ?> selected="selected"<?php endif; ?>>Consumable</option>
											    <option value="style" <?php if($row['type'] == 'style'): ?> selected="selected"<?php endif; ?>>Style</option>
											    <option value="normal" <?php if($row['type'] == 'normal'): ?> selected="selected"<?php endif; ?>>Normal Item</option>
											    <option value="special" <?php if($row['type'] == 'special'): ?> selected="selected"<?php endif; ?>>Special Item</option>
											    <option value="housing" <?php if($row['type'] == 'housing'): ?> selected="selected"<?php endif; ?>>Housing</option>
											    <option value="bones" <?php if($row['type'] == 'bones'): ?> selected="selected"<?php endif; ?>>Bones</option>
											    <option value="fluid" <?php if($row['type'] == 'fluid'): ?> selected="selected"<?php endif; ?>>Fluid</option>
											    <option value="branch" <?php if($row['type'] == 'branch'): ?> selected="selected"<?php endif; ?>>Branch</option>
											    <option value="herbs" <?php if($row['type'] == 'herbs'): ?> selected="selected"<?php endif; ?>>Herbs</option>
											    <option value="mineral" <?php if($row['type'] == 'mineral'): ?> selected="selected"<?php endif; ?>>Mineral</option>
											    <option value="gems" <?php if($row['type'] == 'gems'): ?> selected="selected"<?php endif; ?>>Gems</option>
											    <option value="alchemy" <?php if($row['type'] == 'alchemy'): ?> selected="selected"<?php endif; ?>>Alchemy</option>
											    <option value="fishing" <?php if($row['type'] == 'fishing'): ?> selected="selected"<?php endif; ?>>Fishing</option>
											    <option value="enchantment" <?php if($row['type'] == 'enchantment'): ?> selected="selected"<?php endif; ?>>Enchantment</option>
											    <option value="ticket" <?php if($row['type'] == 'ticket'): ?> selected="selected"<?php endif; ?>>Ticket</option>									
											    <option value="core" <?php if($row['type'] == 'core'): ?> selected="selected"<?php endif; ?>>Core</option>

											  </select>
											</div>
											 </div>

											 <div class="form-group col-md-12">
											 	<div class="input-group input-group mb-3">
											  <div class="input-group-prepend">
											    <span class="input-group-text"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span>
											  </div>
											  <textarea class="form-control" aria-label="With textarea" placeholder="" name="description" ><?php echo $row['description']; ?></textarea>
											</div>
											 </div>

											 <div class="form-group col-md-6">
											 	<div class="input-group mb-3">
											  <div class="input-group-prepend">
											    <label class="input-group-text" for="inputGroupSelect01"><i class="fa fa-star" aria-hidden="true"></i></label>
											  </div>
											  <select class="custom-select" id="inputGroupSelect01" name="rating" required>
											    <option selected>Rating...</option>
											    <option value="1" <?php if($row['rating'] == '1'): ?> selected="selected"<?php endif; ?>>1</option>
											    <option value="2" <?php if($row['rating'] == '2'): ?> selected="selected"<?php endif; ?>>2</option>
											    <option value="3" <?php if($row['rating'] == '3'): ?> selected="selected"<?php endif; ?>>3</option>
											    <option value="4" <?php if($row['rating'] == '4'): ?> selected="selected"<?php endif; ?>>4</option>
											    <option value="5" <?php if($row['rating'] == '5'): ?> selected="selected"<?php endif; ?>>5</option>
											  </select>
											</div>
											 </div>

											 <div class="form-group col-md-6">
											 	<div class="input-group mb-3">
											  <div class="input-group-prepend">
											    <label class="input-group-text" for="inputGroupSelect01"><i class="fa fa-random" aria-hidden="true"></i></label>
											  </div>
											  <select class="custom-select" id="inputGroupSelect01" name="conditional" required>
											    <option selected>Condition...</option>
											    <option value="fishing" <?php if($row['conditional'] == 'fishing'): ?> selected="selected"<?php endif; ?>>Fishing</option>
											    <option value="mining" <?php if($row['conditional'] == 'mining'): ?> selected="selected"<?php endif; ?>>Mining</option>
											  </select>
											</div>
											 </div>

											
											 <?php 
											$str = $row['maps'];
											$map_array = array_filter(explode(",", $str)); 
											echo "<div class='form-group col-md-12'>";
												echo "<div class='form-group form-group-options'>";
											foreach ($map_array as $item) {
												echo "<div class='input-group input-group-option mb-3'>
													  <div class='input-group-prepend'>
													  <label class='input-group-text' for='inputGroupSelect01'>
										   			  <i class='fa fa-map' aria-hidden='true'></i></label>
										  			  </div>";
	    										echo "<input type='text' name='maps[]' value='$item' 
	    											 class='form-control' >";
	    										echo "<span class='input-group-text input-group-addon 
	    											  input-group-addon-remove'>
							    					  <i class='fa fa-times' aria-hidden='true'></i>
								    				  </span></div>";
											}
												echo "</div></div>";
										?>		

									 	<div class="form-group col-md-12">
									 		<div class="input-group mb-3">
											  <div class="input-group-prepend">
											    <label class="input-group-text" for="inputGroupSelect01"><i class="fa fa-sitemap" aria-hidden="true"></i></label>
											  </div>
											 <select class="custom-select" id="inputGroupSelect01" name="category" required>
											    <option selected>Category...</option>
											    <option value="expend" <?php if($row['category'] == 'expend'): ?> selected="selected"<?php endif; ?>>Expend</option>
											    <option value="housing" <?php if($row['category'] == 'housing'): ?> selected="selected"<?php endif; ?>>Housing</option>
											    <option value="tool" <?php if($row['category'] == 'tool'): ?> selected="selected"<?php endif; ?>>Tool</option>
											    <option value="gear" <?php if($row['category'] == 'gear'): ?> selected="selected"<?php endif; ?>>Gear</option>
											  </select>
											</div>
									 	</div>	

									 	<div class="bottom-container col-md-12 text-center">		
									 		<button name="submit" id="submit" class="btn btn-maps btn-submit"><i class="fa fa-sign-in" aria-hidden="true"></i>Update</button>
											</div>

									</form>											
								</td>
							</tr>
						</table>
						
						<!-- READ TABLE AREA -->
						<table id="editable-table" class="item-each-table table-edit-list<?php echo $row['id']; ?>"><tbody>
							<tr>
								<td align="center" class="edit tableButton">
									<div class="delete btn-delete"><a href="?delete_id=<?php echo $row['id']; ?>"><i class="fa fa-times-circle" aria-hidden="true"></i></a></div>

									<button rel="<?php echo $row['id'];?>" class="btn btn-default btn-edit edit-button"><i class="fa fa-pencil-square" aria-hidden="true"></i></a></button>
								</td>
								<td class="icon-categ col-md-1 col-sm-2 ">
									<a href="#" class="pull-left"><img src="img/item-<?php echo $row['type']; ?>.png"></a>
								</td>
								<td class="name col-md-7 col-sm-4">
									<h4><?php echo $row['name'];?></h4>
								</td>
								<td class="rating col-md-3 col-sm-4 text-right">
									<?php for ($i = 1; $i <= $row['rating']; $i++) {
										echo "<i class='fa fa-star' aria-hidden='true'></i>";
									}?>
								</td>
							</tr>

							<tr>
							<td colspan="4" class="description col-md-12 col-sm-12">
								<p class="desc"><?php echo $row['description']; ?></p>
							</td>	
							</tr>

							<tr>

							<?php 
							if ($row['conditional'] == "fishing"){
							?>

							<td colspan="1" class="icon edit">
								<img src="img/fishing-icon.png" /></div>
							</td>

							<td colspan="3" class="maps col-md-12 col-sm-12">
								<?php 
								$str = $row['maps'];
								$map_array = array_filter(explode(",", $str));

								foreach ($map_array as $item) {
									echo "<button class='btn btn-maps'><i class='fa fa-map-marker' aria-hidden='true'></i>
									$item</button>";
								} ?>
							</td>

							<?php } else if($row['conditional'] == "mining"){ ?>

							<td colspan="1" class="icon edit">
								<img src="img/mining-icon.png" /></div>
							</td>

							<td colspan="3" class="maps col-md-12 col-sm-12">
								<?php 
								$str = $row['maps'];
								$map_array = array_filter(explode(",", $str));

								foreach ($map_array as $item) {
									echo "<button class='btn btn-maps'><i class='fa fa-map-marker' aria-hidden='true'></i>
									$item</button>";
								}
								?>
							</td>
							<?php } else { ?>
							<td colspan="4" class="maps col-md-12 col-sm-12">
							<?php 
								$str = $row['maps'];
								$map_array = array_filter(explode(",", $str));

								foreach ($map_array as $item) {
									echo "<button class='btn btn-maps'><i class='fa fa-map-marker' aria-hidden='true'></i>
									$item</button>";
								}
							}
							?>
							</td>	
							</tr>
						</tbody></table>
					</div>
					</td>
				</tr>

			<?php } if(mysqli_num_rows($fetchquery) == 0){?>
				<tr><td align="center">
					<div class="item col-md-12">
						<div class="row">
							<article class="col-md-3 col-sm-12 text-center">
								<img src="img/gerumi.png" class="img-no-data" height="86px" width="86px"/>
							</article>
							<article class="col-md-9 col-sm-12 text-center">
								<h4 style="margin:20px 0">Sorry No Data Found!</h4>
							</article>
						</div>
					</div>
				</td></tr>
			<?php } ?>
			<a href="#" id="to-top" ><img src="img/pagetop.png" /></a>
			</tbody>
			<tfoot class="table-foot">
				
			</tfoot>
		</table>
	</article>

	<aside class="col-md-3 col-sm-6">
		<div class="logo col-md-12 col-sm-12 d-lg-block d-none"><a href="<?php echo $base_url?>" alt="Roxenwald"><img src="img/logos.png" class="img-logo"/></a></div>

		<div class="form-input container-flid"><p class="title_img"><img src="img/title_news.png"></p>
	
			<div class="col-md-12 col-sm-12">
				<form name="submit_form" method="post">
				<input type="hidden" name="submit_id" value="submit" />

				<div class="input-group input-group mb-3">
  				<div class="input-group-prepend">
   				 <span class="input-group-text" id="inputGroup-sizing-sm"><i class="fa fa-leaf" aria-hidden="true"></i></span>
  				</div>
 				 <input type="text" name="name" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="name" required>
				</div>

				<div class="input-group input-group mb-3">
				  <div class="input-group-prepend">
				    <label class="input-group-text" for="inputGroupSelect01"><i class="fa fa-cog" aria-hidden="true"></i></label>
				  </div>
				  <select class="custom-select" id="inputGroupSelect01" name="type" required>
				    <option disabled selected>Type...</option>
				    <option value="consumable">Consumable</option>
				    <option value="style">Style</option>
				    <option value="normal">Normal Item</option>
				    <option value="special">Special Item</option>
				    <option value="housing">Housing</option>
				    <option value="bones">Bones</option>
				    <option value="fluid">Fluid</option>
				    <option value="branch">Branch</option>
				    <option value="herbs">Herbs</option>
				    <option value="mineral">Mineral</option>
				    <option value="gems">Gems</option>
				    <option value="alchemy">Alchemy</option>
				    <option value="fishing">Fishing</option>
				    <option value="enchantment">Enchantment</option>
				    <option value="ticket">Ticket</option>
				    <option value="core">Core</option>
				  </select>
				</div>

				<div class="input-group input-group mb-3">
				  <div class="input-group-prepend">
				    <span class="input-group-text"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span>
				  </div>
				  <textarea class="form-control" aria-label="With textarea" placeholder="description" name="description" required></textarea>
				</div>
			
				<div class="input-group mb-3">
				  <div class="input-group-prepend">
				    <label class="input-group-text" for="inputGroupSelect01"><i class="fa fa-star" aria-hidden="true"></i></label>
				  </div>
				  <select class="custom-select" id="inputGroupSelect01" name="rating" required>
				    <option disabled selected>Rating...</option>
				    <option value="1">1</option>
				    <option value="2">2</option>
				    <option value="3">3</option>
				    <option value="4">4</option>
				    <option value="5">5</option>
				  </select>
				</div>

				<div class="form-group form-group-options">
		    		<div class="input-group input-group-option mb-3">
		    			<div class="input-group-prepend">
				   		 <label class="input-group-text" for="inputGroupSelect01"><i class="fa fa-map" aria-hidden="true"></i></label>
				  		</div>
		    			<input type="text" name="maps[]" value="" class="form-control" placeholder="map name">

			    			<span class="input-group-text input-group-addon input-group-addon-remove">
	    						<i class="fa fa-times" aria-hidden="true"></i>
	    					</span>

		    		</div>
		    	</div>

				<div class="input-group mb-3">
				  <div class="input-group-prepend">
				    <label class="input-group-text" for="inputGroupSelect01"><i class="fa fa-random" aria-hidden="true"></i></label>
				  </div>
				  <select class="custom-select" id="inputGroupSelect01" name="conditional">
				    <option selected>Condition...</option>
				    <option value="fishing">Fishing</option>
				    <option value="mining">Mining</option>
				  </select>
				</div>

				<div class="input-group mb-3">
				  <div class="input-group-prepend">
				    <label class="input-group-text" for="inputGroupSelect01"><i class="fa fa-sitemap" aria-hidden="true"></i></label>
				  </div>
				  <select class="custom-select" id="inputGroupSelect01" name="category" required>
				    <option selected>Category...</option>
				    <option value="expend">expend</option>
				    <option value="housing">housing</option>
				    <option value="tool">tool</option>
				    <option value="gear">gear</option>
				  </select>
				</div>
					
					<div class="bottom-container text-center">
						<button type="reset" name="reset" class="btn btn-maps btn-submit"><i class="fa fa-refresh" aria-hidden="true"></i>Clear</button>
						<button name="submit" id="submit" class="btn btn-maps btn-submit"><i class="fa fa-sign-in" aria-hidden="true"></i>Submit</button>
					</div>
				</form>
			</div>
	
		</div>
	</aside>

	</div>
	</div>
</div>

<script>
	//Menu Navbar Function
	$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("active");
    $("#to-top").toggleClass("to-slide");
	});

	//Table Filtration Function
	$(document).ready(function () {

	  	$('.btn-filter').on('click', function () {
    		var $target = $(this).data('target');

    		if ($target != 'all') {
	    	    $('.table tr.filter').css('display', 'none');
	    	    $('.table tr.filter[data-status="' + $target + '"]').fadeIn('slow');
    	  	} else {
   		    	$('.table tr.filter').css('display', 'none').fadeIn('slow');
    	  	}
   		 });

	    $('.btn-sortner').on('click', function () {
	    	var target = $(this).data('target');
	    	var rows = $('table.table-item').find('tr.filter').get();

	    	rows.sort(function(a, b) {
	    		if (target == 'name'){
	    			return $(b).text().toUpperCase().localeCompare($(a).text().toUpperCase());
	    		} else if (target == 'type'){
					var keyA = $(a).data('type');
					var keyB = $(b).data('type');
				} else if(target == 'rating') {
					var keyA = $(a).data('rating');
					var keyB = $(b).data('rating');
				} else if(target == 'conditional') {
					var keyA = $(a).data('condition');
					var keyB = $(b).data('condition');
				}
				if (keyA < keyB) return 1;
				if (keyA > keyB) return -1;
				return 0;
			});

			$.each(rows, function(index, row) {
				$('table.table-item').children('tbody').append(row);
			});
	      	
	      	$(this).unbind('click');
		});

		});

	//Add Or Remove Multiple Input
		$(document).ready(function () {
	$(document).on('focus', 'div.form-group-options div.input-group-option:last-child input', function(){
		var sInputGroupHtml = $(this).parent().html();
		var sInputGroupClasses = $(this).parent().attr('class');
		var value=$.trim($("div.input-group-option > .form-control").val());
		
		$(this).parent().parent().find('div.input-group-option:first-child input').prop('required',true);
		$(this).parent().parent().append('<div class="'+sInputGroupClasses+'">'+sInputGroupHtml+'</div>');
		$(this).parent().parent().find('input[type=text].form-control').attr('placeholder', 'map name');
		$(this).parent().parent().find('div.input-group-option:last-child input').val('').end();

		});

	$(document).on('click', 'div.form-group-options .input-group-addon-remove', function(){
		$(this).parent().remove();
		});
	});

		//Go to top function
	$('#to-top').each(function(){
	   $(this).click(function(){ 
 	   $('html,body').animate({ scrollTop: 0 }, 'slow');
 	   $('#myTable').animate({ scrollTop: 0 }, 'slow');
 	   return false; 
		 });
	});

	//Update Table Function
	$(document).ready(function () {
	  $(".edit-button").click(function() {
	   var id=$(this).attr('rel');
	  $(".table-edit-list"+id).hide();
	  $(".table-update-list"+id).show();

	  $(".form-input").fadeOut("normal", function() {
    	$(this).hide();
		  });

	  return false;
	  });

	  $(".cancel-button").click(function() {
	  var id=$(this).attr('rel');
	  $(".table-edit-list"+id).show();
	  $(".table-update-list"+id).hide();

	  $(".form-input").fadeIn("normal", function() {
      	$(this).show();
		  });

	  return false;
	  });

	});

	//Button Click state Function
	$('button.btn-filter').on('click', function(){
	    $('button.btn-filter').removeClass('selected');
	    $(this).addClass('selected');
	});
</script>

<?php include('footer.php'); ?>