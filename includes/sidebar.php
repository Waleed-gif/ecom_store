<?php

if(!isset($include_page)){
	
echo "<script> window.open('index.php','_self'); </script>";	
	
}

if($include_page == "vendor_store"){
	
$store_back_url = "../";

}elseif($include_page == "shop"){

$store_back_url = "";
	
}

$aMan  = array();

$aPCat = array();

$aCat  = array();

/// Manufacturers Code Starts ///

if(isset($_REQUEST['man'])&&is_array($_REQUEST['man'])){

foreach($_REQUEST['man'] as $sKey=>$sVal){

if((int)$sVal!=0){

$aMan[(int)$sVal] = (int)$sVal;

}

}

}

/// Manufacturers Code Ends ///

/// Products Categories Code Starts ///

if(isset($_REQUEST['p_cat'])&&is_array($_REQUEST['p_cat'])){

foreach($_REQUEST['p_cat'] as $sKey=>$sVal){

if((int)$sVal!=0){

$aPCat[(int)$sVal] = (int)$sVal;

}

}

}

/// Products Categories Code Ends ///

/// Categories Code Starts ///

if(isset($_REQUEST['cat'])&&is_array($_REQUEST['cat'])){

foreach($_REQUEST['cat'] as $sKey=>$sVal){

if((int)$sVal!=0){

$aCat[(int)$sVal] = (int)$sVal;

}

}

}

/// Categories Code Ends ///

$store_text = "";

if($include_page == "vendor_store"){

function return_column_ids($column_name){
	
global $con;

global $vendor_id;

$column_ids = array();

$select_products = "select distinct $column_name from products where vendor_id='$vendor_id'";

$run_products = mysqli_query($con,$select_products);

while($row_products = mysqli_fetch_array($run_products)){
	
$column_id = $row_products["$column_name"];

array_push($column_ids, $column_id);
	
}

return $column_ids = implode(",", $column_ids);

}

$store_text .= "Store";

}

?>

<div >
	

	<div class="panel panel-default sidebar-menu" style="background-color: #fbfbfb;border-radius: 5px;border: none;"><!--- panel panel-default sidebar-menu Starts -->

		<div style="padding-left: 20px;padding-right: 20px;padding-top: 20px;margin-bottom: 20px"><!-- panel-heading Starts -->

		

			<div class="pull-right"><!-- pull-right Starts -->

				<a href="#" style="color:black;">

					<p style="color:black;font-weight: bold;" class="panel-title"><!-- panel-title Starts -->

					<?php echo $store_text; ?> Categories

					<span style="font-size: 12px;margin-left: 80px" class="text-muted nav-toggle hide-show">

					Hide

					</span>
				</p>

				</a>

			</div><!-- pull-right Ends -->

		
		</div><!-- panel-heading Ends -->

		<div class="panel-collapse collapse-data"><!-- panel-collapse collapse-data Starts -->

			<div class="panel-body"><!-- panel-body Starts -->

			<div class="input-group"><!-- input-group Starts -->

			<input style="border: none;" type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-cats" placeholder="Filter Categories">

			<a class="input-group-addon" style="background-color: red; border: none;color: white"> <i class="fa fa-search"> </i> </a>

			</div><!-- input-group Ends -->

			</div><!-- panel-body Ends -->

			<div class="panel-body "><!-- panel-body scroll-menu Starts -->

			<ul class="nav nav-pills nav-stacked category-menu" id="dev-cats"><!-- nav nav-pills nav-stacked category-menu Starts -->

			<?php

			$categories_where = "";

			if($include_page == "vendor_store"){

			$cat_ids = return_column_ids("cat_id");

			if(!empty($cat_ids)){

			$categories_where = "cat_id in ($cat_ids) and";

			}

			}

			$get_cat = "select * from categories where $categories_where cat_top='yes'";

			$run_cat = mysqli_query($con,$get_cat);

			while($row_cat = mysqli_fetch_array($run_cat)){

			$cat_id = $row_cat['cat_id'];

			$cat_title = $row_cat['cat_title'];

			$cat_image = $row_cat['cat_image'];

			if($cat_image == ""){

			}
			else{

			$cat_image = "<img src='$store_back_url" . "admin_area/other_images/$cat_image' width='20'>&nbsp;";

			}

			echo "

			<li class='checkbox checkbox-primary'>

			<a>

			<label>

				<input ";

				if(isset($aCat[$cat_id])){ echo "checked='checked'"; }

				echo " type='checkbox' value='$cat_id' name='cat' class='get_cat' id='cat'> 

			<span>
			<p class = 'text-muted' style  = 'text-align : justify'>
				$cat_title
			</p>
			</span>

			</label>

			</a>

			</li>

			";

			}


			$get_cat = "select * from categories where $categories_where cat_top='no'";

			$run_cat = mysqli_query($con,$get_cat);

			while($row_cat = mysqli_fetch_array($run_cat)){

			$cat_id = $row_cat['cat_id'];

			$cat_title = $row_cat['cat_title'];

			$cat_image = $row_cat['cat_image'];

			if($cat_image == ""){

			}
			else{

			$cat_image = "<img src='$store_back_url" . "admin_area/other_images/$cat_image' width='20'>&nbsp;";

			}

			echo "

			<li class='checkbox checkbox-primary'>

			<a>

			<label>

			<input ";

			if(isset($aCat[$cat_id])){ echo "checked='checked'"; }

			echo " type='checkbox' value='$cat_id' name='cat' class='get_cat' id='cat'> 

			
			<span>
			<p class = 'text-muted' style  = 'text-align : justify'>
				$cat_title
			</p>
			</span>

			</label>

			</a>

			</li>

			";

			}


			?>

			</ul><!-- nav nav-pills nav-stacked category-menu Ends -->

			</div><!-- panel-body scroll-menu Ends -->

		</div><!-- panel-collapse collapse-data Ends -->

	</div><!--- panel panel-default sidebar-menu Ends -->
	<div class="panel panel-default sidebar-menu" style="background-color: #fbfbfb;border-radius: 5px;border: none;"><!-- panel panel-default sidebar-menu Starts -->

		
		<div class="pull-right" style="padding-left: 20px;padding-right: 20px;padding-top: 20px;margin-bottom: 20px"><!-- pull-right Starts -->

			<a href="#" style="color:black;">

				<p style="color:black;font-weight: bold;" class="panel-title"><!-- panel-title Starts -->

				<?php echo $store_text; ?> Manufacturers

				<span style="font-size: 12px;margin-left: 56px" class="text-muted nav-toggle hide-show">

				Hide

				</span>
				</p>

			</a>

		</div><!-- pull-right Ends -->

		<div class="panel-collapse collapse-data"><!-- panel-collapse collapse-data starts -->

		<div class="panel-body"><!-- panel-body Starts -->

		<div class="input-group"><!-- input-group Starts -->

		<input  style="border: none;" type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-manufacturer" placeholder="Filter Manufacturers">


		<a class="input-group-addon" style="background-color: red;border: none;color: white"> <i class="fa fa-search"></i> </a>

		</div><!-- input-group Ends -->

		</div><!-- panel-body Ends -->

		<div class="panel-body "><!-- panel-body scroll-menu Starts -->

		<ul class="nav nav-pills nav-stacked category-menu" id="dev-manufacturer"><!-- nav nav-pills nav-stacked category-menu Starts -->

		<?php

		$manufacturer_where = "";

		if($include_page == "vendor_store"){

		$manufacturer_ids = return_column_ids("manufacturer_id");

		if(!empty($manufacturer_ids)){

		$manufacturer_where = "manufacturer_id in ($manufacturer_ids) and";

		}

		}

		$get_manfacturer = "select * from manufacturers where $manufacturer_where manufacturer_top='yes'";

		$run_manfacturer = mysqli_query($con,$get_manfacturer);

		while($row_manfacturer = mysqli_fetch_array($run_manfacturer)){

		$manufacturer_id = $row_manfacturer['manufacturer_id'];

		$manufacturer_title = $row_manfacturer['manufacturer_title'];

		$manufacturer_image = $row_manfacturer['manufacturer_image'];

		if($manufacturer_image == ""){

		}
		else{

		$manufacturer_image = "

		<img src='$store_back_url" . "admin_area/other_images/$manufacturer_image' width='20px' >&nbsp;

		";

		}

		// $manufacturer_image
		
		echo "

		<li  class='checkbox checkbox-primary'>

		<a>

		<label>

		<input ";

		if(isset($aMan[$manufacturer_id])){ echo "checked='checked'"; }

		echo " type='checkbox' value='$manufacturer_id' name='manufacturer' class='get_manufacturer'>

		<span>
			<p class = 'text-muted' style  = 'text-align : justify'>
				$manufacturer_title
			</p>
		</span>

		</label>

		</a>

		</li>

		";


		}


		$get_manfacturer = "select * from manufacturers where $manufacturer_where manufacturer_top='no'";

		$run_manfacturer = mysqli_query($con,$get_manfacturer);

		while($row_manfacturer = mysqli_fetch_array($run_manfacturer)){

		$manufacturer_id = $row_manfacturer['manufacturer_id'];

		$manufacturer_title = $row_manfacturer['manufacturer_title'];

		$manufacturer_image = $row_manfacturer['manufacturer_image'];

		if($manufacturer_image == ""){


		}else{

		$manufacturer_image = "

		<img src='$store_back_url" . "admin_area/other_images/$manufacturer_image' width='20px'> &nbsp;

		";

		}

		echo "

		<li class='checkbox checkbox-primary'>

		<a>

		<label>

		<input ";

		if(isset($aMan[$manufacturer_id])){ echo "checked='checked'"; }

		echo " type='checkbox' value='$manufacturer_id' name='manufacturer' class='get_manufacturer'>

		<span>
			<p class = 'text-muted' style  = 'text-align : justify'>
				$manufacturer_title
			</p>
		</span>

		</label>

		</a>

		</li>

		";

		}

		?>

		</ul><!-- nav nav-pills nav-stacked category-menu Ends -->

		</div><!-- panel-body scroll-menu Ends -->

		</div><!-- panel-collapse collapse-data Ends -->
	</div><!-- panel panel-default sidebar-menu Ends -->


	<div class="panel panel-default sidebar-menu" style="background-color: #fbfbfb;border-radius: 5px;border: none;"><!--- panel panel-default sidebar-menu Starts -->

		<div class="pull-right" style="padding-left: 20px;padding-right: 20px;padding-top: 20px;margin-bottom: 20px"><!-- pull-right Starts -->

			<a href="#" style="color:black;">

				<p style="color:black;font-weight: bold;" class="panel-title"><!-- panel-title Starts -->

				<?php echo $store_text; ?>  Brands

				<span style="font-size: 12px;margin-left: 111px" class="text-muted nav-toggle hide-show">

				Hide

				</span>
				</p>

			</a>

		</div><!-- pull-right Ends -->
		

		<div class="panel-collapse collapse-data"><!-- panel-collapse collapse-data Starts -->

			<div class="panel-body "><!-- panel-body Starts -->

				<div class="input-group"><!-- input-group Starts -->

					<input style="border: none;" type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-p-cats" placeholder="Filter Brands">

					<a class="input-group-addon" style="background-color: red;color: white;border: none;"> <i class="fa fa-search"></i> </a>

				</div><!-- input-group Ends -->

			</div><!-- panel-body Ends -->

			<div class="panel-body " ><!-- panel-body scroll-menu Starts -->

				<ul class="nav nav-pills nav-stacked category-menu" id="dev-p-cats"><!-- nav nav-pills nav-stacked category-menu Starts -->

					<?php

					$p_cat_where = "";

					if($include_page == "vendor_store"){

					$p_cat_ids = return_column_ids("p_cat_id");

					if(!empty($p_cat_ids)){

					$p_cat_where = "p_cat_id in ($p_cat_ids) and";

					}

					}

					$get_p_cats = "select * from product_categories where $p_cat_where p_cat_top='yes'";

					$run_p_cats = mysqli_query($con,$get_p_cats);

					while($row_p_cats = mysqli_fetch_array($run_p_cats)){

					$p_cat_id = $row_p_cats['p_cat_id'];

					$p_cat_title = $row_p_cats['p_cat_title'];

					$p_cat_image = $row_p_cats['p_cat_image'];

					if($p_cat_image == ""){


					}
					else{

					$p_cat_image = "<img src='$store_back_url" . "admin_area/other_images/$p_cat_image' width='20'> &nbsp;";

					}

					echo "

					<li class='checkbox checkbox-primary' >

					<a>

					<label>

						<input ";

						if(isset($aPCat[$p_cat_id])){ echo "checked='checked'"; }

						echo " 
						type='checkbox' value='$p_cat_id' name='p_cat' class='get_p_cat' id='p_cat' >

						<span>
							<p class = 'text-muted'>
								$p_cat_title
							</p>
						</span>

					</label>

					</a>

					</li>

					";


					}

					$get_p_cats = "select * from product_categories where $p_cat_where p_cat_top='no'";

					$run_p_cats = mysqli_query($con,$get_p_cats);

					while($row_p_cats = mysqli_fetch_array($run_p_cats)){

					$p_cat_id = $row_p_cats['p_cat_id'];

					$p_cat_title = $row_p_cats['p_cat_title'];

					$p_cat_image = $row_p_cats['p_cat_image'];

					if($p_cat_image == ""){


					}
					else{

					$p_cat_image = "<img src='$store_back_url" . "admin_area/other_images/$p_cat_image' width='20'> &nbsp;";

					}

					echo "

					<li class='checkbox checkbox-primary'>

					<a>

					<label>

					<input ";

					if(isset($aPCat[$p_cat_id])){ echo "checked='checked'"; }

					echo " type='checkbox' value='$p_cat_id' name='p_cat' class='get_p_cat' id='p_cat' >

					
					<span>
							<p class = 'text-muted' style  = 'text-align : justify'>
								$p_cat_title
							</p>
						</span>

					</label>

					</a>

					</li>

					";


					}

					?>

				</ul><!-- nav nav-pills nav-stacked category-menu Ends -->

			</div><!-- panel-body scroll-menu Ends -->

		</div><!-- panel-collapse collapse-data Ends -->

	</div><!--- panel panel-default sidebar-menu Ends -->



</div>