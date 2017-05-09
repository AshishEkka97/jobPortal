<?php
	include("session.php");
	include("header.html");
	include("my_library.php");
	$uid = $_REQUEST["uid"];
	
	$skillQuery = "SELECT skillName FROM skills WHERE skillId IN (SELECT skillId FROM user_skills_relations WHERE empId = '$uid')";
	
	$con = dbConnect();
	
	$rsProfile = mysqli_query($con, "SELECT * FROM user_profile WHERE uid='$uid'");
	$rsUsr = mysqli_query($con, "SELECT uEmail, uPass, uSex, uDob FROM user_master WHERE uid='$uid'");
	$rsIndustry = mysqli_query($con, "SELECT indName FROM industries WHERE indId = (SELECT upIndustry FROM user_profile WHERE uId = '$uid')");
	$rsCountry = mysqli_query($con, "SELECT countries_name FROM countries WHERE countries_id = (SELECT upCountry FROM user_profile WHERE uId = '$uid')");
	$rsSkills = mysqli_query($con, $skillQuery);
	$rsExp = mysqli_query($con, "SELECT expYear FROM experience WHERE upId = '$uid'");
	
	$rowP = mysqli_fetch_array($rsProfile);
	$rowU = mysqli_fetch_array($rsUsr);
	$rowE = mysqli_fetch_array($rsExp);
	$rowI = mysqli_fetch_array($rsIndustry);
	$rowC = mysqli_fetch_array($rsCountry);
	
	$name = $rowP["upName"];
	$sex = $rowU["uSex"];
	$dob = $rowU["uDob"];
	$ind = $rowI["indName"];
	$exp = $rowE["expYear"];
	$dist = $rowP["upDistt"];
	$state = $rowP["upState"];
	$country = $rowC["countries_name"];
	$email = $rowU["uEmail"];
	$mobile = $rowP["upMobile"];
	$projects = $rowP["upProjects"];
	$bio = $rowP["upBio"];
	$file = $rowP["upPic"];
?>

<!--Scripting For The Profile Page-->
<script type="text/javascript">
$(document).ready(function() {
    var panels = $('.user-infos');
    var panelsButton = $('.dropdown-user');
    panels.hide();

    //Click dropdown
    panelsButton.click(function() {
        //get data-for attribute
        var dataFor = $(this).attr('data-for');
        var idFor = $(dataFor);

        //current button
        var currentButton = $(this);
        idFor.slideToggle(400, function() {
            //Completed slidetoggle
            if(idFor.is(':visible'))
            {
                currentButton.html('<i class="glyphicon glyphicon-chevron-up text-muted"></i>');
            }
            else
            {
                currentButton.html('<i class="glyphicon glyphicon-chevron-down text-muted"></i>');
            }
        })
    });


    $('[data-toggle="tooltip"]').tooltip();

    $('button').click(function(e) {
        e.preventDefault();
        alert("This is a demo.\n :-)");
    });
});
</script>
<br><br><br>

<div class="container-fluid">
<form action="process.php" method="post" enctype="multipart/form-data">
	<input type="text" name="act" value="pedit" hidden="true">
    <input type="text" name="uid" value="<?php echo $_REQUEST['uid']; ?>" hidden="true">
	<div class="row">
    	<div class="col-md-1"></div>
    	<div class="col-md-10">
   	  		<div class="panel panel-info">
    	  		<div class="panel-heading">
    	    		<h3 class="panel-title"><?php echo $name; ?>'s Profile</h3>
  	    		</div>
    	  		<div class="panel-body">
					<div class="row">
              			<div class="col-md-6">
                        <center>
                        <div class="row">
                        	<div class="col-md-3">
                            </div>
                            <div class="col-md-6">
                        	<?php
								if($file=="")
								{
							?>
           	  				<div class="ratio img-responsive img-circle" style="background-image: url(/jobPortal/images/ImgResponsive_Placeholder.png)">
                            </div>
                            <?php
								}
								else
								{
							?>
                            <div class="ratio img-responsive img-circle" style="background-image: url(user//profile//<?php echo $file; ?>)">
                            </div>
                            <?php
								}
							?>
                            </div>
                            <div class="col-md-3">
                            </div>
                            </div>
                            <br>
                            <input type="file" name='upFile' class="form-control">
                            <br>
                            	<textarea name="upBio" class="form-control">
                            	<?php echo $bio; ?>
                                </textarea>
                        </center>
              			</div>
              			<div class="col-md-6">
                        	<table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Name:</td>
                        <td><input type='text' class="form-control" name='upName' value='<?php echo $name; ?>'></td>
                      </tr>
                      <tr>
                        <td>Sex:</td>
                        <td>
                        	<?php
                            	if($sex=='M')
                        			echo "<input type='radio' name='uSex' value='M' checked>Male <input type='radio' name='uSex' value='F'>Female";
								else
									echo "<input type='radio' name='uSex' value='M'>Male <input type='radio' name='uSex' value='F' checked>Female";
							?>
						</td>
                      </tr>
                      <tr>
                        <td>Date of Birth</td>
                        <td>
							<input type="date" class="form-control" name="uDob" value='<?php echo $dob; ?>'>
                        </td>
                      </tr>
                   
                      <tr>
                        <td>Industry/Domain Of Work:</td>
                        <td>
							<?php
								industryList("upIndustry", "form-control", false, $ind) 
							?>
                        </td>
                      </tr>
                      <tr>
                        <td>Experience</td>
                        <td>
                        	<select name="upExp" class="form-control">
                        	<?php
								for($i = 1; $i<20; $i++)
								{
									if($i==$exp)
									echo "<option value='$i' selected>$i Years</option>";
									else
									echo "<option value='$i'>$i Years</option>";
								}
							?>
                        </select>
                      </tr>
                        <tr>
                        <td>District</td>
                        <td><input type="text" class="form-control" name='upDist' value='<?php echo $dist; ?>'></td>
                      </tr>
                      
                      <tr>
                        <td>State</td>
                        <td><input type="text" class="form-control" name='upState' value='<?php echo $state; ?>'></td>
                      </tr>
                      
                      <tr>
                        <td>Country</td>
                        <td>
                        	<?php
								countryList("upCountry", "form-control", false, $country);
							?>
                        </td>
                      </tr>
                      
                      <tr>
                        <td>Email</td>
                        <td><input type="email" class="form-control" name="uEmail" value='<?php echo $email; ?>'></td>
                      </tr>
                      
                      <tr>
                        <td>Mobile:</td>
                        <td><input type="number" class="form-control" maxlength="10" name="upMobile" value='<?php echo $mobile; ?>'>
                        </td>
                           
                      </tr>
                      
                      <tr>
                        <td>Skills:</td>
                        <td><?php
								$nr = mysqli_num_rows($rsSkills);
								$c = 1;
                        		while($rowS=mysqli_fetch_array($rsSkills))
								{
									echo $rowS["skillName"];
									if($c<$nr-1)
									echo ", ";
									else if($c==$nr-1)
									echo " and ";
									else
									echo ".";
									$c++;
								}
							?>
                            <tr>
                            <td>Edit Skills(Mutiselect By ctrl/shift):</td>
                            <td>
                            <?php
								$skill = array("");
								$skillSet = array(0);
								
								skillList("upSkills[]", "form-control", $skillSet, true, $skill);
							?>
                            </td>
                            </tr>
                        </td>
                           
                      </tr>
                      
                      <tr>
                        <td>Projects:</td>
                        <td>
                        <textarea name="upProjects" class="form-control"><?php echo $projects; ?></textarea>
                        </td>
                           
                      </tr>
                     
                    </tbody>
                  </table>
                  
                  <!-- Not Needed
                  <a href="#" class="btn btn-primary">My Sales Performance</a>
                  <a href="#" class="btn btn-primary">Team Sales Performance</a>
                  -->
                        </div>
            		</div>
		  		</div>
    	  		<div class="panel-footer">
                	<input type="submit" class="btn btn-info value="Save">
                </div>
  	  		</div>
    	</div>
    	<div class="col-md-1"></div>
	</div>
</form>
</div>
<?php
?>