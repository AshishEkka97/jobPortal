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
	<div class="row">
    	<div class="col-md-2"></div>
    	<div class="col-md-8">
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
                            <p>
                            	<?php echo $bio; ?>
                            </p>
                        </center>
              			</div>
              			<div class="col-md-6">
                        	<table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Name:</td>
                        <td><?php echo $name; ?></td>
                      </tr>
                      <tr>
                        <td>Sex:</td>
                        <td><?php if($sex=='M') echo "Male"; else echo "Female"; ?></td>
                      </tr>
                      <tr>
                        <td>Date of Birth</td>
                        <td><?php echo $dob; ?></td>
                      </tr>
                   
                      <tr>
                        <td>Industry/Domain Of Work:</td>
                        <td><?php echo $ind; ?></td>
                      </tr>
                      <tr>
                        <td>Experience</td>
                        <td><?php echo $exp; ?> Years</td>
                      </tr>
                        <tr>
                        <td>Home Address</td>
                        <td><?php echo $dist; ?>, <?php echo $state; ?>, <?php echo $country; ?></td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></td>
                      </tr>
                      
                      <tr>
                        <td>Mobile:</td>
                        <td><?php echo $mobile; ?>
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
                        </td>
                           
                      </tr>
                      
                      <tr>
                        <td>Projects:</td>
                        <td><?php echo $projects; ?>
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
                	<a data-original-title="Print Profile" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-print"></i></a>
                        <span class="pull-right">
                            <a href="edit_profile.php?uid=<?php echo $uid; ?>" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                            <a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                        </span>
                </div>
  	  		</div>
    	</div>
    	<div class="col-md-2"></div>
	</div>
</div>
<?php
?>