<?php
	include("header.html");
	include("my_library.php");
?>
<link rel="stylesheet" href="css/bootstrap-multiselect.css" type="text/css" />

<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.js"></script>
<script type="text/javascript" src="js/bootstrap-multiselect.js"></script>
<link rel="stylesheet" href="css/bootstrap-min.css" type="text/css" />

<br>
<br>
<br>
<div class="container">
	<form action="process.php" method="get" class="well form-horizontal" id="add_job">
    	<fieldset>
        	<!--Form Name-->
            <legend><center><h2><b>New Job Campaign</b></h2></center></legend><br>
            
            <!--Form Elements-->
            <input type="text" name="act" value="addJob" hidden="true">
            <div class="form-group">
            	<label class="col-md-4 control-label">Job Name:</label>
                <div class="col-md-4 inputGroupContainer">
                	<div class="input-group">
                    	<span class="input-group-addon"><i class="glyphicon glyphicon-comment"></i></span>
                        <input name="jobName" type="text" placeholder="Job Name" class="form-control" required>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
            	<label class="col-md-4 control-label">Industry/Domain of Work:</label>
                <div class="col-md-4 inputGroupContainer">
                	<div class="input-group">
                    	<span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
                        <?php
                        IndustryList("jobIndustry", "form-control", true);
						?>
                    </div>
                    
                </div>
            </div>
            
            <div class="form-group" id="exprow">
            	<label class="col-md-4 control-label" for="exps">Recommended Experience:</label>
                <div class="col-md-4 inputGroupContainer" id="exps">
                	<div class="input-group" id="exptext">
                    	<span class="input-group-addon"><i class="glyphicon glyphicon-cog"></i></span>
                    	<select name="jobExp" class="form-control">
                        	<?php
								for($i = 1; $i<20; $i++)
								{
									echo "<option value='$i'>$i Years</option>";
								}
							?>
                        </select>
                    </div>
                    <div id="expList">
                  </div>
                </div>
            </div>
            
            <?php
				STATIC $skillSet = array(0);
			?>
            
            <div class="form-group" id="skillrow">
            	<label class="col-md-4 control-label" for="skills">Skills Required:</label>
                <div class="col-md-4 inputGroupContainer" id="skills">
                	<div class="input-group" id="skilltext">
                    	<span class="input-group-addon"><i class="glyphicon glyphicon-wrench"></i></span>
                        <?php
							skillList("jobSkills[]", "form-control", $skillSet, true);
						?>
                    </div>
                </div>
                
            </div>
            
            <div class="form-group">
            	<label class="col-md-4 control-label">Country Of Work:</label>
                <div class="col-md-4 inputGroupContainer">
                	<div class="input-group">
                    	<span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
                        <?php
                        countryList("jobCountry", "form-control", true);
						?>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
            	<label class="col-md-4 control-label">Job Description:</label>
                <div class="col-md-4 inputGroupContainer">
                	<div class="input-group">
                    	<span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i></span>
                        <textarea name="jobDesc" class="form-control"></textarea>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
            	<label class="col-md-4 control-label">Expected Income:</label>
                <div class="col-md-4 inputGroupContainer">
                	<div class="input-group">
                    	<span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                        <input name="jobIncome" maxlength="10" placeholder="Enter In Numbers" class="form-control" required>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
            	<label class="col-md-4 control-label">Apply Date:</label>
                <div class="col-md-4 inputGroupContainer">
                	<div class="input-group">
                    	<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                        <input type='date' name="jobApply" maxlength="10" placeholder="Apply Date" class="form-control" required>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
            	<label class="col-md-4 control-label">End Date:</label>
                <div class="col-md-4 inputGroupContainer">
                	<div class="input-group">
                    	<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                        <input type='date' name="jobEnd" maxlength="10" placeholder="Apply Date" class="form-control" required>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
            	<label class="col-md-4 control-label">Contact:</label>
                <div class="col-md-4 inputGroupContainer">
                	<div class="input-group">
                    	<span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                        <input name="jobContact" maxlength="10" placeholder="Mobile" class="form-control" required>
                    </div>
                </div>
            </div>
            
            

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4"><br>
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button type="submit" class="btn btn-warning" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Create Job <span class="glyphicon glyphicon-send"></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</button>
  </div>
</div>
        </fieldset>       
	</form>
</div>