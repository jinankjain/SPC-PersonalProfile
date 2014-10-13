<?php 
	include 'db-con.php';
	include 'includes.php';
	include 'base.php';
	
	$isFluid = false;
	$isManufacturing = false;
	$isAutomobile = false;
	$isPower = false;
	$isElectronics = false;
	$isCommuincation = false;
	$isFinance = false;
	$isCoding = false;
	$isAnalytics = false;
	$isOther = false;

	$username = $_GET['x'];
	$parameter = $_GET['y'];
	if($parameter=="fluid"){
		$isFluid = true;
	}else if($parameter=="manu"){
		$isManufacturing = true;
	}else if($parameter=="auto"){
		$isAutomobile = true;
	}else if($parameter=="electro"){
		$isElectronics = true;
	}else if($parameter=="power"){
		$isPower = true;
	}else if($parameter=="comm"){
		$isCommuincation = true;
	}else if($parameter=="finance"){
		$isFinance = true;
	}else if($parameter=="analytics"){
		$isAnalytics= true;
	}else if($parameter=="coding"){
		$isCoding = true;
	}else if($parameter=="other"){
		$isOther = true;
	}
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
                <div class="col-xs-8"><h4><?php echo $username ?></h4></div>
            </div>
            <div class="row">
                <div class="col-xs-4"><h4>C.P.I:</h4></div>
                <div class="col-xs-8"><h4><?php echo $result['cpi'] ?></h4></div>
            </div>
            <?php if(isset($userDetails['internship'])){ ?>
            <div class="row">
                <div class="col-xs-4"><h4>Internship Details</h4></div>
                <div class="col-xs-8"><?php echo $userDetails['internship'] ?></div>
            </div>
            <?php } ?>
            <?php if($isME) {?>
            	<?php if($isFluid) {?>
                <div class="row">
                    <br>
                    <div class="col-xs-4"><h4>Fluid and Thermal</h4></div>
                    <div class="col-xs-8"><?php echo $userDetails['interest1'] ?></div>
                </div>
                <?php }?>
                <?php if($isAutomobile) {?>
                <div class="row">
                    <br>
                    <div class="col-xs-4"><h4>Automobile</h4></div>
                    <div class="col-xs-8"><?php echo $userDetails['interest2'] ?>/div>
                </div>
                <?php } ?>
                <?php if($isManufacturing) {?>
                <div class="row">
                    <br>
                    <div class="col-xs-4"><h4>Manufacturing and Design</h4></div>
                    <div class="col-xs-8"><?php echo $userDetails['interest3'] ?></div>
                </div>
                <?php } ?>
                <?php if($isOther) {?>
                <div class="row">
                    <br>
                    <div class="col-xs-4"><h4>Other</h4></div>
                    <div class="col-xs-8"><?php echo $details['interest5'] ?></div>
                </div>
                <?php } ?>
            <?php }?>
            <?php if($isEE) {?>
            	<?php if($isPower){ ?>
                <div class="row">
                    <br>
                    <div class="col-xs-4"><h4>Power System</h4></div>
                    <div class="col-xs-8"><?php echo $userDetails['interest1'] ?></div>
                </div>
                <?php } ?>
                <?php if($isCommuincation){ ?>
                <div class="row">
                    <br>
                    <div class="col-xs-4"><h4>Commuincation</h4></div>
                    <div class="col-xs-8"><?php echo $userDetails['interest2'] ?></div>
                </div>
                <?php } ?>
                <?php if($isElectronics){ ?>
                <div class="row">
                    <br>
                    <div class="col-xs-4"><h4>Electronics</h4></div>
                    <div class="col-xs-8"><?php echo $userDetails['interest3'] ?></div>
                </div>
                <?php } ?>
                <?php if($isOther) {?>
                <div class="row">
                    <br>
                    <div class="col-xs-4"><h4>Other</h4></div>
                    <div class="col-xs-8"><?php echo $details['interest5'] ?></div>
                </div>
                <?php } ?>
            <?php }?>
            <?php if($isSS) {?>
            	<?php if($isFinance) {?>
                <div class="row">
                    <br>
                    <div class="col-xs-4"><h4>Finance</h4></div>
                    <div class="col-xs-8"><?php echo $userDetails['interest1'] ?></div>
                </div>
                <?php } ?>
                <?php if($isAnalytics) {?>
                <div class="row">
                    <br>
                    <div class="col-xs-4"><h4>Analytics</h4></div>
                    <div class="col-xs-8"><?php echo $userDetails['interest2'] ?></div>
                </div>
                <?php } ?>
                <?php if($isCoding) {?>
                <div class="row">
                    <br>
                    <div class="col-xs-4"><h4>Coding</h4></div>
                    <div class="col-xs-8"><?php echo $userDetails['interest3'] ?></div>
                </div>
                <?php } ?>
                <?php if($isOther) {?>
                <div class="row">
                    <br>
                    <div class="col-xs-4"><h4>Other</h4></div>
                    <div class="col-xs-8"><?php echo $details['interest5'] ?></div>
                </div>
                <?php } ?>
            <?php }?>
        </div>
    </div>
</div>