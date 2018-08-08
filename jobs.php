<?php 
//Defining vari Page 
define('page_title','Jobs Information');
define('page_name','jobs');

//get header
include('header.php'); 
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
						<td colspan="4">
							<div class="thead-content">
								<h5 style="color:#fff"><?php echo page_title?></h5>

								<nav class="button-area d-lg-block d-none" style="margin-top: 28px;">
									<button type="button" class="btn btn-filter" data-target="rank1"><i class="fa fa-circle-o" aria-hidden="true"></i> Rank 1</button>
									<button type="button" class="btn btn-filter" data-target="rank2"><i class="fa fa-circle-o" aria-hidden="true"></i>Rank 2</button>
									<button type="button" class="btn btn-filter" data-target="rank3"><i class="fa fa-circle-o" aria-hidden="true"></i>Rank 3</button>
									<button type="button" class="btn btn-filter" data-target="all"><i class="fa fa-refresh" aria-hidden="true"></i>All Rank</button>
								</nav>
							</div>
						</td>
					</tr>
				</thead>
				<tbody class="table table-filter" id="myTable">
				<tr data-status="rank1">
					<td>
						<div class="item col-md-12 col-sm-12">
							<article class="post-item row">
								<div class="col-md-3 pull-left">
									<img class="icon-jobs" src="img/jobs-Explorerhex.png"/>
									<button type="button" class="btn btn-detail" data-target="all">Detail</button>
								</div>
								<div class="col-md-9">
									<div class="row" style="margin-right:15px;">
										<div class="col-md-7">
											<h4 class="jobs-name">Explorer</h4>
										</div>
										<div class="col-md-3 rating text-right">
											<i class='fa fa-star' aria-hidden='true'></i>
											<i class='fa fa-star' aria-hidden='true'></i>
											<i class='fa fa-star' aria-hidden='true'></i>
										</div>
										<div class="col-md-2">
											<div class="delete btn-delete" style="right:-30px;top:-20px"><a href="?delete_id=<?php echo $row['id']; ?>"><i class="fa fa-times-circle" aria-hidden="true"></i></a></div>
											<button rel="21" class="btn btn-default btn-edit edit-button"><i class="fa fa-pencil-square" aria-hidden="true"></i></button>
										</div>
									
										<div class="jobs-desc col-md-12">
											<p>A traveler who goes around solving people's problem, though they're unskilled.</p>
										</div>
									</div>
								</div>
							</article>
						</div>
					</td>
				</tr>
				</tbody>
				<tfoot class="table-foot">
				
				</tfoot>
			</table>
		</article>

		<aside id="side-post" class="col-md-4 col-sm-12">
			<div class="form-input container-fluid">
				<p class="title_img"><img src="img/title_news.png"></p>
				
				<table class="jobs-submit-table">
					<tbody>
						<div class="col-md-12">
							<form name="submit_form" method="post">
							<input type="hidden" name="submit_id" value="submit" />
								<h5>Job Info</h5>
								<?php echo file_get_contents("partial/submit_jobs_info.html"); ?>
								<h5>Job Skill</h5>
							</form>
						</div>
					</tbody>
				</table>
			</div>
		</aside>

	</div>
	</div>

</div>
</body>

<script>
	//Menu Navbar Function
	$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("active");
    $("#to-top").toggleClass("to-slide");
	});
</script>

<?php include('footer.php'); ?>