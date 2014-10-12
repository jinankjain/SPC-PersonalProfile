<?php 
	session_start();
	include 'base.php';
	include 'includes.php';
	include 'db-con.php';
	$username = $_SESSION['username'];
	$query = "SELECT * FROM STUDENT WHERE Roll_No='$username'";
	$queryResult = mysql_query($query);
	$result = mysql_fetch_array($queryResult);
?>
<div class = "container-fluid">
	<div class="row-fluid">
		<div class="col-xs-2"></div>
		<div class="col-xs-6">
			<h1>Student Profile Details</h1>
			<div class="row">
				<div class="col-xs-4"><h4>Name:</h4></div>
				<div class="col-xs-8"><h4><?php echo $result['NAME'] ?></h4></div>
			</div>
			<div class="row">
				<div class="col-xs-4"><h4>Roll Numer:</h4></div>
				<div class="col-xs-8"><h4><?php echo $result['Roll_No'] ?></h4></div>
			</div>
			<div class="row">
				<div class="col-xs-4"><h4>C.P.I:</h4></div>
				<div class="col-xs-8"><h4><?php echo $result['cpi'] ?></h4></div>
			</div>
			<div class="row">
				<div class="col-xs-4"><h4>Internship Details</h4></div>
				<div class="col-xs-8"><textarea></textarea></div>
			</div>
			<?php 
				$checkBranch = str_split($result['Roll_No']);
				if($checkBranch[7] == "1"){
					$isEE = true;
				}else if($checkBranch[7] == "2"){
					$isME = true;
				}else if($checkBranch[7] == "3"){
					$isSS = true;
				}else if($checkBranch[7] == "0"){
					$isCSE = true;
				}
				
			?>
		</div>
	</div>
</div>