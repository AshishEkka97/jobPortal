<?php
	include("header.html");
	include("my_library.php");
?>
<link rel="stylesheet" href="css/bootstrap-multiselect.css" type="text/css" />

<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.js"></script>
<script type="text/javascript" src="js/bootstrap-multiselect.js"></script>
<link rel="stylesheet" href="css/bootstrap-min.css" type="text/css" />



<style>
		.multiselect-container>li>a>label {
  padding: 4px 20px 3px 20px;
}
</style>


<script type="text/javascript">
	function removeExpField(e)
	{				
				var container = document.getElementById("exps");
                container.removeChild(container.lastChild);
				
				var row = document.getElementById("exprow");
                row.removeChild(row.lastChild);
	}
	
	
	function addExpField()
    {
				if( typeof addExpField.count == 'undefined' ) {
        			addExpField.count = 0
    			}
				var div = document.getElementById("exptext");
				var clone = div.cloneNode(true);
				clone.id = addExpField.count;			

                var container = document.getElementById("exps");
                container.appendChild(clone);
				
				var icon = document.createElement('i');
				icon.className = "glyphicon glyphicon-remove-circle";
				
				var button = document.createElement('button');
				button.type = "button";
				button.className = "btn btn-default";
				button.onclick = Function("removeExpField(this)");
				button.appendChild(icon);
				
				var minus = document.createElement('div');
				minus.className = "col-md-4";
				minus.id = addExpField.count;
				minus.appendChild(button);
				
				var row = document.getElementById('exprow');
				row.appendChild(minus);
				
				addExpField.count++;		
    }
</script>

<br>
<br>
<br>
<div class="container">
	<form action="process.php" method="get" class="well form-horizontal" id="user_profile">
    	<fieldset>
        	<!--Form Name-->
            <legend><center><h2><b>Profile Details</b></h2></center></legend><br>
            
            <!--Form Elements-->
            <input type="text" name="act" value="up" hidden="true">
            <?php
				if(isset($_REQUEST["uid"]) and $_REQUEST["r"])
				{
					$uid = $_REQUEST["uid"];
					$rec = $_REQUEST["r"];
            		echo "<input type='text' name='uid' value='$uid' hidden='true'>";
					echo "<input type='text' name='rec' value='$rec' hidden='true'>";
				}
			?>
            <div class="form-group">
            	<label class="col-md-4 control-label">First Name</label>
                <div class="col-md-4 inputGroupContainer">
                	<div class="input-group">
                    	<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input name="upFName" type="text" placeholder="First Name" class="form-control" required>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
            	<label class="col-md-4 control-label">Last Name</label>
                <div class="col-md-4 inputGroupContainer">
                	<div class="input-group">
                    	<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input name="upLName" type="text" placeholder="Last Name" class="form-control" required>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
            	<label class="col-md-4 control-label">Mobile:</label>
                <div class="col-md-4 inputGroupContainer">
                	<div class="input-group">
                    	<span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                        <input name="upPhone" maxlength="10" placeholder="Mobile" class="form-control" required>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
            	<label class="col-md-4 control-label">Country:</label>
                <div class="col-md-4 inputGroupContainer">
                	<div class="input-group">
                    	<span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
                        <?php
                        countryList("upCountry", "form-control", true);
						?>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
            	<label class="col-md-4 control-label">State</label>
                <div class="col-md-4 inputGroupContainer">
                	<div class="input-group">
                    	<span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                        <input name="upState" type="text" placeholder="State" class="form-control" required>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
            	<label class="col-md-4 control-label">District</label>
                <div class="col-md-4 inputGroupContainer">
                	<div class="input-group">
                    	<span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                        <input name="upDist" type="text" placeholder="District" class="form-control" required>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
            	<label class="col-md-4 control-label">Industry/Domain of Work:</label>
                <div class="col-md-4 inputGroupContainer">
                	<div class="input-group">
                    	<span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
                        <?php
                        IndustryList("upIndustry", "form-control", true);
						?>
                    </div>
                    
                </div>
            </div>
            <?php
				STATIC $skillSet = array(0);
			?>
            
            <div class="form-group" id="skillrow">
            	<label class="col-md-4 control-label" for="skills">Skills</label>
                <div class="col-md-4 inputGroupContainer" id="skills">
                	<div class="input-group" id="skilltext">
                    	<span class="input-group-addon"><i class="glyphicon glyphicon-wrench"></i></span>
                        <?php
							skillList("upSkills[]", "form-control", $skillSet, true, "");
						?>
                    </div>
                </div>
                
            </div>
            
            <div class="form-group" id="exprow">
            	<label class="col-md-4 control-label" for="exps">Experience in Industry:</label>
                <div class="col-md-4 inputGroupContainer" id="exps">
                	<div class="input-group" id="exptext">
                    	<span class="input-group-addon"><i class="glyphicon glyphicon-cog"></i></span>
                    	<select name="expYear" class="form-control">
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
            
            <div class="form-group">
            	<label class="col-md-4 control-label">Projects:</label>
                <div class="col-md-4 inputGroupContainer">
                	<div class="input-group">
                    	<span class="input-group-addon"><i class="glyphicon glyphicon-tasks"></i></span>
                        <textarea name="upProjects" class="form-control"></textarea>
                    </div>
                </div>
            </div>

<?php
	if($rec == 1)
	{
?>
<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4"><br>
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button type="submit" class="btn btn-warning" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Create My Company Profile <span class="glyphicon glyphicon-send"></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</button>
  </div>
</div>
<?php
	}
	else
	{
?>
<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4"><br>
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button type="submit" class="btn btn-warning" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Seek Jobs <span class="glyphicon glyphicon-send"></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</button>
  </div>
</div>
<?php
	}
?>
        </fieldset>       
	</form>
</div>