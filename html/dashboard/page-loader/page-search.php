<?php 

	require_once "../../inc/conn.php";
	require_once "../../inc/variables.php";
	// logged_in(true);

	// Pagination variables
	$results_per_page = 30; // Number of results per page
	$current_page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int) $_GET['page'] : 1; // Current page number
	$offset = ($current_page - 1) * $results_per_page; // Offset for SQL query

	if (post('category')) {

		$sql = "SELECT * FROM uploads WHERE hidden=0";

		$category = softSan(post('category'));
	    if (in_array($category, array('scenario', 'cheatsheet', 'video'))) {
			$sql .= " AND category='$category'";
		}

		if (post('query', true)) {
			$query = softSan(post('query'));
			if ($query!=='') {
				if (post('search_type')=='search_content') {
					$sql .= " AND (content LIKE '%$query%' OR tags LIKE '%$query%')";
				}else{
					$sql .= " AND (title LIKE '%$query%' OR tags LIKE '%$query%')";
				}
			}
		}

		if (post('tags', true)) {
			$tags = post('tags');
			if ($tags!=='') {
				if (is_array($tags)) {
			      foreach($tags as $tag){
			      	$tag = softSan($tag);
					$sql .= " AND tags LIKE '%$tag%'";
				  }
				}
			}
		}

		if (post('university', true)) {
			$university = softSan(post('university'));
			if ($university!=='all') {
				$sql .= " AND university='$university'";
			}
		}

		if (post('difficulty', true)) {
			$difficulty = (int) softSan(post('difficulty'));
			if ($difficulty!=='all') {
				$sql .= " AND difficulty='$difficulty'";
			}
		}

		if (post('author', true)) {
			$author = softSan(post('author'));
			if ($author!=='all') {
				$sql .= " AND author='$author'";
			}
		}

		$sql .= " AND hidden=0 ORDER BY free DESC, time_added DESC";

		// Get total number of results
		$total_results_query = mysqli_query($conn, $sql);
		$total_results = mysqli_num_rows($total_results_query);

		// Add LIMIT and OFFSET for pagination
		$sql .= " LIMIT $results_per_page OFFSET $offset";

		$query = mysqli_query($conn, $sql);
		$res = mysqli_fetch_all($query, MYSQLI_ASSOC);

		if (empty($res)) {
			echo "<br><br><br><br><br><center><lord-icon src='https://cdn.lordicon.com/jxzkkoed.json' trigger='loop' style='width:100px;height:100px'></lord-icon><br><br>We couldn't find anything! <br>Need this resource? <a href='".$url."contact?review=true&content=I+need+a+resource' style='color:#31afb4;text-decoration:underline'>Let us know</a></center>";
		} else {
			if (post('category')=='scenario') { ?>
				<div class="disclaimer"><i class='bx bxs-hot'></i> We have <b>150+</b> pharmacy osce scenarios at the moment and are uploading roughly 3 new ones each week, watch this space 👀</div>
			<?php } else { ?>
				<div class="disclaimer"><i class='bx bxs-hot'></i> Feel free to look around, but at the moment it's mostly scenarios. More is being added to Info Capsules and Videos as we speak!</div>
			<?php }

			foreach ($res as $r) {
				$slug = str_replace(' ', '-', strtolower(trim($r['title'])));
				// only allow numbers, letters and hyphen in slug
				$slug = preg_replace('/[^A-Za-z0-9\-]/', '', $slug);
				?>
				<div class="file">
					<a target="_blank" href="<?php echo $url;?>pharmacy-scenario/<?php echo $slug;?>?id=<?php echo $r['id'];?>">
					<!-- <a target="_blank" href="<?php echo $url;?>resource?id=<?php echo $r['id'];?>"> -->
						<div class="file-icon">
							<?php if ($r['free']!=="yes"){
								if (!isset($_SESSION['premium']) OR $_SESSION['premium']==false) { ?>
									<i class="bx bxs-lock-alt"></i>
								<?php } else { ?>
									<i style="color:#EF798A" class="bx bx-lock-open-alt"></i>
								<?php }
							} else { ?>
								<span style="font-size: 12px;font-weight: bolder;color: #EF798A;">FREE</span>
							<?php } ?>

							<?php if ($r['ai']=="yes"){ ?>
								🤖
							<?php } ?>

							<?php if (!empty($r['files']) and $r['category']!=='video'): ?>
								<i style="color:#31afb4;font-size: 18px;transform: translateY(2px);" class="bx bx-cloud-download"></i>
							<?php endif ?>
						</div>
						<div class="file-header" style="color:#31afb4">
							<?php
							$now = time();
							$your_date = $r['time_added'];
							$datediff = $now - $your_date;
							$days = round($datediff / (60 * 60 * 24));
							if ($days<14) {
								if(isset($_COOKIE['darkmode']) && $_COOKIE['darkmode'] == 'true') {
									echo "<div style='border: 1px dashed #5D576B;color:white;display:inline-block;padding:0 4px'>NEW</div> ";
								}
								else{
									echo "<div style='border: 1px dashed #5D576B;color:black;display:inline-block;padding:0 4px'>NEW</div> ";
								}
							} else { 
								echo time_elapsed_string($r['time_added']).' ago';
							}
							?>
						</div>
						<div style="display: flex;">
							<div class="file-content">
								<div class="file-title"><b><?php echo $r['title'];?></b></div>
								<div class="file-text diagnosis" style="color:#31afb4"><?php echo $r['diagnosis'];?></div>
							</div>
						</div>
					</a>
				</div>
			<?php }
			echo "<div class='clearfix'></div>";


			// ----------------------------
			// Pagination logic
			$total_pages = ceil($total_results / $results_per_page);
			if ($total_pages > 1) {
				echo "<div class='pagination'>";
				if ($current_page > 1) {
					// echo "<div href='?page=".($current_page - 1)."' class='pagination-button'><</div>";
				}
				for ($i = 1; $i <= $total_pages; $i++) {
					if ($i == $current_page) {
						echo "<div class='pagination-button current-pagination'>$i</div>";
					} else {
						echo "<div style='cursor:pointer' onclick='page=$i;getResults()' class='pagination-button'>$i</div>";
					}
				}
				if ($current_page < $total_pages) {
					// echo "<div onclick='page=".($current_page + 1).";getResults()' class='pagination-button'>></div>";
				}
				echo "</div>";
			}
			// ----------------------------




		}
	}
?>
