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
	<form action="process.php" method="get" class="well form-horizontal" id="company_profile">
    	<fieldset>
        	<!--Form Name-->
            <legend><center><h2><b>Company Profile</b></h2></center></legend><br>
            
            <!--Form Elements-->
            <input type="text" name="act" value="cp" hidden="true">
            <?php
				if(isset($_REQUEST["uid"]) and $_REQUEST["rec"])
				{
					$uid = $_REQUEST["uid"];
					$rec = $_REQUEST["rec"];
            		echo "<input type='text' name='uid' value='$uid' hidden='true'>";
					echo "<input type='text' name='rec' value='$rec' hidden='true'>";
				}
			?>
            <div class="form-group">
            	<label class="col-md-4 control-label">Company Name:</label>
                <div class="col-md-4 inputGroupContainer">
                	<div class="input-group">
                    	<span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
                        <input name="cName" type="text" placeholder="Company Name" class="form-control" required>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
            	<label class="col-md-4 control-label">Country:</label>
                <div class="col-md-4 inputGroupContainer">
                	<div class="input-group">
                    	<span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
                        <?php
                        countryList("cCountry", "form-control", true);
						?>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
            	<label class="col-md-4 control-label">State:</label>
                <div class="col-md-4 inputGroupContainer">
                	<div class="input-group">
                    	<span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                        <input name="cState" type="text" placeholder="State" class="form-control" required>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
            	<label class="col-md-4 control-label">District</label>
                <div class="col-md-4 inputGroupContainer">
                	<div class="input-group">
                    	<span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                        <input name="cDist" type="text" placeholder="District" class="form-control" required>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
            	<label class="col-md-4 control-label">Industry/Domain of Work:</label>
                <div class="col-md-4 inputGroupContainer">
                	<div class="input-group">
                    	<span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
                        <?php
                        IndustryList("cIndustry", "form-control", true);
						?>
                    </div>
                    
                </div>
            </div>
            
            <div class="form-group">
            	<label class="col-md-4 control-label">Contact:</label>
                <div class="col-md-4 inputGroupContainer">
                	<div class="input-group">
                    	<span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                        <input name="cContact" maxlength="10" placeholder="Mobile" class="form-control" required>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
            	<label class="col-md-4 control-label">Company Website:</label>
                <div class="col-md-4 inputGroupContainer">
                	<div class="input-group">
                    	<span class="input-group-addon"><i class="glyphicon glyphicon-link"></i></span>
                        <input name="cWebsite" type="text" placeholder="First Name" class="form-control" required>
                    </div>
                </div>
            </div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4"><br>
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button type="submit" class="btn btn-warning" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Submit <span class="glyphicon glyphicon-send"></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</button>
  </div>
</div>
        </fieldset>       
	</form>
</div>