<div class="item col-md-12 col-sm-12">

										<div class="row">
										<div class="delete btn-delete"><a href="?delete_id=<?php echo $row['id']; ?>"><i class="fa fa-times-circle" aria-hidden="true"></i></a></div>
										
										<div class="edit col-md-1 col-sm-2 text-xl-center"><button class="btn btn-default btn-edit" href="#"><i class="fa fa-pencil-square" aria-hidden="true"></i></a></div>

										<div class="icon-categ col-md-1 col-sm-2 ">
											<a href="#" class="pull-left"><img src="img/item-<?php echo $row['type']; ?>.png"></a>
										</div>
										
										
										<?php 
										if ($row['conditional'] == "fishing"){
											echo "<div class='icon col-md-1 col-sm-1'>";
											echo "<img src='img/fishing-icon.png' /></div>";
											echo "<div class='name col-md-6 col-sm-4'><h4 style='padding-left:10px;'>";
											echo $row['name'];
											echo "</h4></div>";
										}else if($row['conditional'] == "mining") {
											echo "<div class='icon col-md-1 col-sm-1'>";
											echo "<img src='img/mining-icon.png' /></div>";
											echo "<div class='name col-md-6 col-sm-4'><h4 style='padding-left:10px;'>";
											echo $row['name'];
											echo "</h4></div>";
										}else{
											echo "<div class='name col-md-7 col-sm-4'><h4 style='padding-left:10px;'>";
											echo $row['name'];
											echo "</h4></div>";
										}
										?>

										<div class="rating col-md-3 col-sm-4 text-right">
										<?php for ($i = 1; $i <= $row['rating']; $i++) {
											echo "<i class='fa fa-star' aria-hidden='true'></i>";
										}?>
										</div>
									
										<div class="description col-md-12 col-sm-12">
											<p><?php echo $row['description']; ?></p>
										</div>

										<div class="maps col-md-12 col-sm-12">
										<?php 
											$str = $row['maps'];
											$map_array = array_filter(explode(",", $str));

											foreach ($map_array as $item) {
    											echo "<button class='btn btn-maps'><i class='fa fa-map-marker' aria-hidden='true'></i>
												$item</button>";
											}	
										?>
		
										</div>
										</div>
									</div>


















.table td, .table th {border-top:none !impoertant;}
thead.table-head {
    background: url(../img/table-head.png) no-repeat left;
    text-align: center;
    line-height: 68px;
    background-size: 100% 120px;
}

tbody.table {
    background: url(../img/table-body.png) repeat-y 0 0;
    background-size: 100%;
    height: 1000px;
    overflow-x: hidden;
    display: block;
    overflow-y: scroll;
    margin-bottom: -2px;
}