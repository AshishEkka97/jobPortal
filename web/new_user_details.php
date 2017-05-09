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

	$(document).ready(function(){  
$('#skill').keyup(function(){  
           var query = $(this).val();  
           if(query != '')  
           {  
                $.ajax({  
                     url:"skills.php",  
                     method:"POST",  
                     data:{query:query},  
                     success:function(data)  
                     {  
                          $('#skillList').fadeIn();  
                          $('#skillList').html(data);  
                     }  
                });  
           }  
      });  
      $(document).on('click', 'li', function(){  
           $('#skill').val($(this).text());  
           $('#skillList').fadeOut();  
      });  
 });
	function removeSkillField(e)
	{				
				var container = document.getElementById("skills");
                container.removeChild(container.lastChild);
				
				var row = document.getElementById("skillrow");
                row.removeChild(row.lastChild);
	}
	
	
	function addSkillField()
    {
				if( typeof addSkillField.count == 'undefined' ) {
        			addSkillField.count = 0
    			}
				var div = document.getElementById("skilltext");
				var clone = div.cloneNode(true);
				clone.id = addSkillField.count;			

                var container = document.getElementById("skills");
                container.appendChild(clone);
				
				var icon = document.createElement('i');
				icon.className = "glyphicon glyphicon-remove-circle";
				
				var button = document.createElement('button');
				button.type = "button";
				button.className = "btn btn-default";
				button.onclick = Function("removeSkillField(this)");
				button.appendChild(icon);
				
				var minus = document.createElement('div');
				minus.className = "col-md-4";
				minus.id = addSkillField.count;
				minus.appendChild(button);
				
				var row = document.getElementById('skillrow');
				row.appendChild(minus);
				
				addSkillField.count++;		
    }
</script>

<br>
<br>
<br>
<div class="container">
	<form action="process.php" method="post" enctype="multipart/form-data" class="well form-horizontal" id="user_profile">
    	<fieldset>
        	<!--Form Name-->
            <legend><center><h2><b>Profile Details</b></h2></center></legend><br>
            
            <!--Form Elements-->
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
                        <input name="upState" type="text" placeholder="State" class="form-control" required>
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
							skillList("upSkills[]", "form-control", $skillSet, true);
						?>
                    </div>
                    <div id="skillList">
                  </div>
                </div>
                
            </div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4"><br>
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button type="submit" class="btn btn-warning" id="btnget" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspSUBMIT <span class="glyphicon glyphicon-send"></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</button>
  </div>
</div>
        </fieldset>       
	</form>
</div>