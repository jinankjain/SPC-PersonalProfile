<?php 
	include 'db-con.php';
	include 'includes.php';
	include 'base.php';
	$username = $_GET['x'];
	$checkBranch = str_split($username);
    $isME  = 0;
    $isCSE = 0;
    $isEE  = 0;
    $isSS  = 0;
    if($checkBranch[7] == "1"){
        $isEE = true;
    }else if($checkBranch[7] == "2"){
        $isME = true;
    }else if($checkBranch[7] == "3"){
        $isSS = true;
    }else if($checkBranch[7] == "0"){
        $isCSE = true;
    }
	$query = "SELECT * FROM STUDENT WHERE Roll_No='$username'";
	$queryResult = mysql_query($query);
	$result = mysql_fetch_array($queryResult);
	$query = "SELECT * FROM userProfile WHERE Roll_No='$username'";
	$queryResult = mysql_query($query);
	$userDetails = mysql_fetch_array($queryResult);
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
                <div class="col-xs-4"><h4>Roll Number:</h4></div>
                <div class="col-xs-8"><h4><?php echo $result['Roll_No'] ?></h4></div>
            </div>
            <div class="row">
                <div class="col-xs-4"><h4>C.P.I:</h4></div>
                <div class="col-xs-8"><h4><?php echo $result['cpi'] ?></h4></div>
            </div>
            <div class="row">
                <div class="col-xs-4"><h4>Internship Details</h4></div>
                <div class="col-xs-8"><?php echo $userDetails['internship'] ?></div>
            </div>
            <?php if($isME) {?>
                <div class="row">
                    <br>
                    <div class="col-xs-4"><h4>Fluid and Thermal</h4></div>
                    <div class="col-xs-8"><?php echo $userDetails['interest1'] ?></div>
                </div>
                <div class="row">
                    <br>
                    <div class="col-xs-4"><h4>Automobile</h4></div>
                    <div class="col-xs-8"><?php echo $userDetails['interest2'] ?>/div>
                </div>
                <div class="row">
                    <br>
                    <div class="col-xs-4"><h4>Manufacturing and Design</h4></div>
                    <div class="col-xs-8"><?php echo $userDetails['interest3'] ?></div>
                </div>
            <?php }?>
            <?php if($isEE) {?>
                <div class="row">
                    <br>
                    <div class="col-xs-4"><h4>Power System</h4></div>
                    <div class="col-xs-8"><?php echo $userDetails['interest1'] ?></div>
                </div>
                <div class="row">
                    <br>
                    <div class="col-xs-4"><h4>Commuincation</h4></div>
                    <div class="col-xs-8"><?php echo $userDetails['interest2'] ?></div>
                </div>
                <div class="row">
                    <br>
                    <div class="col-xs-4"><h4>Electronics</h4></div>
                    <div class="col-xs-8"><?php echo $userDetails['interest3'] ?></div>
                </div>
            <?php }?>
            <?php if($isSS) {?>
                <div class="row">
                    <br>
                    <div class="col-xs-4"><h4>Finance and Analytics</h4></div>
                    <div class="col-xs-8"><?php echo $userDetails['interest1'] ?></div>
                </div>
                <div class="row">
                    <br>
                    <div class="col-xs-4"><h4>Non Core</h4></div>
                    <div class="col-xs-8"><?php echo $userDetails['interest2'] ?></div>
                </div>
            <?php }?>
        </div>
    </div>
</div>