<?php 
    session_start();
    include 'base.php';
    include 'includes.php';
    include 'db-con.php';
    $username = $_SESSION['username'];
    $query = "SELECT * FROM STUDENT WHERE Roll_No='$username'";
    $queryResult = mysql_query($query);
    $result = mysql_fetch_array($queryResult);
    $query = "SELECT * FROM userProfile WHERE Roll_No='$username'";
    $queryResult = mysql_query($query);
    $details = mysql_fetch_array($queryResult);
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
                <form id="updateDetails" action= "javascript:updateDetails()">
                <div class="col-xs-4"><h4>Internship Details</h4></div>
                <div class="col-xs-8"><textarea type="text" cols="50" rows="4" name="internship"><?php echo $details['internship'] ?></textarea></div>
            </div>
            <?php 
                $checkBranch = str_split($result['Roll_No']);
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
            ?>
            <?php if($isME) {?>
                <div class="row">
                    <br>
                    <div class="col-xs-4"><h4>Fluid and Thermal</h4></div>
                    <div class="col-xs-8"><textarea rows="4" name="interest1"><?php echo $details['interest1'] ?></textarea></div>
                </div>
                <div class="row">
                    <br>
                    <div class="col-xs-4"><h4>Automobile</h4></div>
                    <div class="col-xs-8"><textarea rows="4" name="interest2"><?php echo $details['interest2'] ?></textarea></div>
                </div>
                <div class="row">
                    <br>
                    <div class="col-xs-4"><h4>Manufacturing and Design</h4></div>
                    <div class="col-xs-8"><textarea rows="4" name="interest3"><?php echo $details['interest3'] ?></textarea></div>
                </div>
                <div class="row">
                    <br>
                    <div class="col-xs-4"><h4>Technical Skills</h4></div>
                    <div class="col-xs-8"><textarea rows="4" name="interest4"><?php echo $details['interest4'] ?></textarea></div>
                </div>
                <div class="row">
                    <br>
                    <div class="col-xs-4"><h4>Other</h4></div>
                    <div class="col-xs-8"><textarea rows="4" name="interest5"><?php echo $details['interest5'] ?></textarea></div>
                </div>
            <?php }?>
            <?php if($isEE) {?>
                <div class="row">
                    <br>
                    <div class="col-xs-4"><h4>Power System</h4></div>
                    <div class="col-xs-8"><textarea rows="4" name="interest1"><?php echo $details['interest1'] ?></textarea></div>
                </div>
                <div class="row">
                    <br>
                    <div class="col-xs-4"><h4>Commuincation</h4></div>
                    <div class="col-xs-8"><textarea rows="4" name="interest2"><?php echo $details['interest2'] ?></textarea></div>
                </div>
                <div class="row">
                    <br>
                    <div class="col-xs-4"><h4>Electronics</h4></div>
                    <div class="col-xs-8"><textarea rows="4" name="interest3"><?php echo $details['interest3'] ?></textarea></div>
                </div>
                <div class="row">
                    <br>
                    <div class="col-xs-4"><h4>Technical Skills</h4></div>
                    <div class="col-xs-8"><textarea rows="4" name="interest4"><?php echo $details['interest4'] ?></textarea></div>
                </div>
                <div class="row">
                    <br>
                    <div class="col-xs-4"><h4>Other</h4></div>
                    <div class="col-xs-8"><textarea rows="4" name="interest5"><?php echo $details['interest5'] ?></textarea></div>
                </div>
            <?php }?>
            <?php if($isSS) {?>
                <div class="row">
                    <br>
                    <div class="col-xs-4"><h4>Finance</h4></div>
                    <div class="col-xs-8"><textarea rows="4" name="interest1"><?php echo $details['interest1'] ?></textarea></div>
                </div>
                <div class="row">
                    <br>
                    <div class="col-xs-4"><h4>Analytics</h4></div>
                    <div class="col-xs-8"><textarea rows="4" name="interest2"><?php echo $details['interest2'] ?></textarea></div>
                </div>
                <div class="row">
                    <br>
                    <div class="col-xs-4"><h4>Coding</h4></div>
                    <div class="col-xs-8"><textarea rows="4" name="interest2"><?php echo $details['interest3'] ?></textarea></div>
                </div>
                <div class="row">
                    <br>
                    <div class="col-xs-4"><h4>Technical Skills</h4></div>
                    <div class="col-xs-8"><textarea rows="4" name="interest4"><?php echo $details['interest4'] ?></textarea></div>
                </div>
                <div class="row">
                    <br>
                    <div class="col-xs-4"><h4>Other</h4></div>
                    <div class="col-xs-8"><textarea rows="4" name="interest5"><?php echo $details['interest5'] ?></textarea></div>
                </div>
            <?php }?>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <button id="logout" class="btn btn-primary">Logout</button>
        </div>
    </div>
</div>
<script>
    function updateDetails(){
        var updateForm = $("#updateDetails").serialize();
        $.ajax({
          type:"POST",
          url:"studProfile.php",
          data: updateForm,
          success:function(data){
            window.location.href = "user.php";
          }
        });
    }
    $("#logout").click(function(){
        $.ajax({
            type:"POST",
            url:"logout.php",
            success:function(data){
                window.location.href = "index.php";    
            }
        });
    });
</script>