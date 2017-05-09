<?php
	include("header.html");
	
	$minyear = date("Y")-40;
	$maxyear = date("Y")-18;
?>

<br>
<br>
<br>
<div class="container">
	<form action="process.php" method="get" class="well form-horizontal" id="registration_form">
    	<fieldset>
        	<!--Form Name-->
            <legend><center><h2><b>Registration Form</b></h2></center></legend><br>
            
            <!--Form Elements-->
            <input type="text" name="act" value="reg" hidden="true">
            
            <div class="form-group">
            	<label class="col-md-4 control-label">UserName</label>
                <div class="col-md-4 inputGroupContainer">
                	<div class="input-group">
                    	<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input name="uName" type="text" placeholder="UserName" class="form-control" required>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
            	<label class="col-md-4 control-label">Email</label>
                <div class="col-md-4 inputGroupContainer">
                	<div class="input-group">
                    	<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                        <input name="uEmail" type="email" placeholder="Email" class="form-control" required>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
            	<label class="col-md-4 control-label">Password</label>
                <div class="col-md-4 inputGroupContainer">
                	<div class="input-group">
                    	<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input name="uPass1" type="password" placeholder="Password" class="form-control" required>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
            	<label class="col-md-4 control-label">Confirm Password</label>
                <div class="col-md-4 inputGroupContainer">
                	<div class="input-group">
                    	<span class="input-group-addon"><i class="glyphicon glyphicon-check"></i></span>
                        <input name="uPass" type="password" placeholder="Confirm Password" class="form-control" required>
                    </div>
                </div>
            </div>
            
            
            <div class="form-group">
            	<label class="col-md-4 control-label">Sex</label>
                <div class="col-md-4 inputGroupContainer">
                	<div class="input-group">
                   	  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <span class="form-control">
                        <label class="radio-inline" style="padding-top:0px">
                        <input name="uSex" type="radio" value="M" required>Male
                        </label>
                        <label class="radio-inline" style="padding-top:0px">
                        <input name="uSex" type="radio" value="F" required>Female
                        </label>
                        </span>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
            	<label class="col-md-4 control-label">Date Of Birth</label>
                <div class="col-md-4 inputGroupContainer">
                	<div class="input-group">
                    	<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                        <?php
                        echo "<input name='uDob' type='date' placeholder='Enter Dob' class='form-control' min='$minyear-01-01' max='$maxyear-12-31' required>"
						?>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
            	<label class="col-md-4 control-label">Register As:</label>
                <div class="col-md-4 inputGroupContainer">
                	<div class="input-group">
                   	  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <span class="form-control">
                        <label class="radio-inline" style="padding-top:0px">
                        <input name="uType" type="radio" value="User" required>Job Seeker
                        </label>
                        <label class="radio-inline" style="padding-top:0px">
                        <input name="uType" type="radio" value="Recruiter" required>Job Recriuter
                        </label>
                        </span>
                    </div>
                </div>
            </div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4"><br>
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <button type="submit" class="btn btn-warning" > &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspSUBMIT <span class="glyphicon glyphicon-send"></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </button>
  </div>
</div>
        </fieldset>       
	</form>
</div>