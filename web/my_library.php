<!--
	This is my library. It has bunch of functions.
 -->
<?php
	function dbConnect($sname = "localhost", $uname = "root", $upass ="", $dbname = "jobportal")
	{
		$con = mysqli_connect($sname, $uname, $upass);
		$flag = mysqli_select_db($con, $dbname);
		if($flag)
		return $con;
		else
		return 0;
	}
	
	/* Creating a function to register new user */
	
	function create_user($name, $email, $pass, $type, $sex, $dob)
	{
		$con = dbConnect("localhost", "root", "", "jobportal");
		if($con)
		{
			//Insertion into User Master
			mysqli_query($con, "INSERT INTO user_master(uName, uEmail, uPass,
			uType, uSex, uDob) VALUES ('$name', '$email', '$pass', '$type', '$sex', '$dob')");
			
			//Last ID generated
			$uId = mysqli_insert_id($con);
			return $uId;
		}
		else
		{
			return 0;
		}
	}
	
	function create_user_profile($uid, $rec, $name, $mob, $country, $state, $dist, $industry, $projects, $skill, $expYear)
	{
		$con = dbConnect("localhost", "root", "", "jobportal");
		if($con)
		{
			//Insertion into User Profile
			mysqli_query($con, "INSERT INTO user_profile(uId, upName, upMobile, upCountry,
			upState, upDistt, upIndustry, upProjects) VALUES ($uid, '$name', '$mob', '$country', '$state', '$dist', '$industry', '$projects')");
			
			//Last ID generated
			$uId = mysqli_insert_id($con);
			
			echo count($skill);
			echo "<br>";
			//Insertion into User Skills Relationship Table
			for($i=0;$i<count($skill);$i++)
			{
				mysqli_query($con, "INSERT INTO user_skills_relations(empId, skillId) VALUES ('$uid', '$skill[$i]')") or die("Error In Inserting Skills");
				
			}
			//Insertion Into Experience
			mysqli_query($con, "INSERT INTO experience(expYear, industry, upId) VALUES ('$expYear', '$industry', '$uid')");
			
			//check if the new user is a recruiter
			if($rec == 1)
			{
				//return 2 if recruiter
				return 2;
			}
			else
			{
				//return 1 if a normal user
				return 1;
			}
		}
		else
		{
			//return 0 if connection not sucessfull, i.e unable to add
			return 0;
		}
	}
	
	function edit_user_profile($uid, $name, $mob, $country, $state, $dist, $industry, $projects, $skill, $expYear, $bio, $img, $email, $sex, $dob)
	{
		$con = dbConnect("localhost", "root", "", "jobportal");
		if($con)
		{
			//Setting New values into User Profile
			mysqli_query($con, "UPDATE user_profile SET upName = '$name', upMobile = '$mob', upCountry = '$country', upState = '$state', upDistt = '$dist', upIndustry = '$industry', upProjects = '$projects', upBio = '$bio', upPic = '$img' WHERE uId = '$uid'");
			
			//Setting New Values in User Master
			mysqli_query($con, "UPDATE user_master SET uSex = '$sex', uEmail = '$email', uDob = '$dob' WHERE uId = '$uid'");
			
			//ignore coming two, just for error handling. Might come handy in future
			echo count($skill);
			echo "<br>";
			echo $uid;
			//Delete The Existing User Skill Relation Of The User
			mysqli_query($con, "DELETE FROM user_skills_relations WHERE empId='$uid'") or die ("Unable to delete skills");
			
			
			//Insertion into User Skills Relationship Table
			for($i=0;$i<count($skill);$i++)
			{
				mysqli_query($con, "INSERT INTO user_skills_relations(empId, skillId) VALUES ('$uid', '$skill[$i]')") or die("Error In Inserting Skills");
				
			}
			
			
			//Updating New Values Into Experience
			mysqli_query($con, "UPDATE experience SET expYear = '$expYear', industry = '$industry' WHERE upId = '$uid'");
			
			//Everything is done now, return 1 stating success
			return 1;
		}
		else
		{
			//return 0 if connection not sucessfull, i.e unable to edit
			return 0;
		}
	}
	
	function create_company_profile($name, $country, $state, $district, $industry, $contact, $website)
	{
		$con = dbConnect("localhost", "root", "", "jobportal");
		if($con)
		{
			//Insertion into Company Table
			mysqli_query($con, "INSERT INTO companies(cName, cCountry,
			cState, cDistrict, cIndustry, cContact, cWebsite) VALUES ('$name', '$country', '$state', '$district', '$industry', '$contact', '$website')");
			
			//Last ID generated
			$cId = mysqli_insert_id($con);
			
			if($cId)
			{
				return $cId;
			}
			else
			{
				return 0;
			}
		}
	}
	
	function countryList($fieldname="country", $classes="form-control", $important=false, $country="")
	{
		/*This function will create a drop list of countries whenever called
		I'm using Bootstrap class for the UI*/
		if($important)
		echo "<select name='$fieldname' class='$classes' placeholder='Country' required>";
		else
		echo "<select name='$fieldname' class='$classes' placeholder='Country'>";
		$con = dbConnect("localhost", "root", "", "jobPortal");
		if($con)
		{
			$rsCountry = mysqli_query($con, "SELECT * FROM countries");
			while($row = mysqli_fetch_array($rsCountry))
			{
				if($row["countries_name"]==$country)
				echo "<option value='".$row['countries_id']."' selected>".$row['countries_name']."</option>";
				else
				echo "<option value='".$row['countries_id']."'>".$row['countries_name']."</option>";
			}
		}
		else
		{
			echo "<option value='0'>Unable To Fetch.</option>";
		}
		echo "</select>";
	}
	
	function industryList($fieldname="industry", $classes="form-control", $important=false, $ind="Aerospace Industry")
	{
		/*This function will create a drop list of industries whenever called
		I'm using Bootstrap class for the UI*/
		if($important)
		echo "<select name='$fieldname' class='$classes' placeholder='Industry' required>";
		else
		echo "<select name='$fieldname' class='$classes' placeholder='Industry'>";
		$con = dbConnect("localhost", "root", "", "jobPortal");
		if($con)
		{
			$rsIndustry = mysqli_query($con, "SELECT * FROM industries");
			if($rsIndustry)
			{
				while($row = mysqli_fetch_array($rsIndustry))
				{
					if($row["indName"]==$ind)
					echo "<option value='".$row['indId']."' selected>".$row['indName']."</option>";
					else
					echo "<option value='".$row['indId']."'>".$row['indName']."</option>";
				}
			}
			else
			{
				echo "<option value='0'>Unable To Fetch.</option>";
			}
		}
		else
		{
			echo "<option value='0'>Unable To Fetch.</option>";
		}
		echo "</select>";
	}
	
	function create_job($name, $domain, $exp, $skills, $country, $desc, $apply, $end, $income, $contact)
	{
		$con = dbConnect();
		$query = "INSERT INTO jobs(jobName, jobDomain, jobExp, jobCountry, jobDesc, jobApplyDate, jobEndDate, jobIncome, jobContact) values('$name', '$domain', '$exp', '$country', '$desc', '$apply', '$end', '$income', '$contact')";
		$rsJob = mysqli_query($con, $query);
		
		return $rsJob;
	}
	
	function skillList($fieldname="skills", $classes="form-control", &$alreadySkills, $important=false, $skills)
	{
		/*This function will create a drop list of industries whenever called
		I'm using Bootstrap class for the UI*/
		
		$formatted = implode(",", $alreadySkills);
		
		if($important)
		echo "<select name='$fieldname' class='$classes' placeholder='Skills' id='chkskill' required multiple='multiple'>";
		else
		echo "<select name='$fieldname' class='$classes' placeholder='Skills'>";
		$con = dbConnect("localhost", "root", "", "jobPortal");
		if($con)
		{
			$rsSkill = mysqli_query($con, "SELECT * FROM skills WHERE skillId NOT IN ($formatted)");
			if($rsSkill)
			{
				while($row = mysqli_fetch_array($rsSkill))
				{
					if(in_array($row["skillName"], $skills, true))
					echo "<option value='".$row['skillId']."' selected>".$row['skillName']."</option>";
					else
					echo "<option value='".$row['skillId']."'>".$row['skillName']."</option>";
				}
			}
			else
			{
				echo "<option value='0'>Unable To Fetch.</option>";
			}
		}
		else
		{
			echo "<option value='0'>Unable To Fetch.</option>";
		}
		echo "</select>";
		if(isset($_POST["skill"]))
		$alreadySkills[] = $_POST['skill'];
	}
?>

<!--This piece of shit is required by skillList()-->
<script type="text/javascript">

$(function() {

    $('#chkskill').multiselect({

        includeSelectAllOption: true
    });

    $('#btnget').click(function(){

        alert($('#chkskill').val());
    });
});

</script>