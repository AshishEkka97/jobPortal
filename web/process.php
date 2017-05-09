<!--This page will act as backend for all the form data submitted.
	Every Form in this project will have their action attribute set
    to this page, and a hidden textbox value "act" (denoting action to be performed)
    is passed here. If condition will be used to check the exact module to be executed.
    
    IDK if this method is good or not.
    
    Remember that this page in turn calls a number of functions,
    which I have defined in "my_library.php"
-->
<?php
	include("my_library.php");
	if(isset($_REQUEST["act"]))
	{
		$act = $_REQUEST["act"];
		if($act=="reg")
		{
			$uName = $_REQUEST["uName"];
			$uPass = $_REQUEST["uPass"];
			$uEmail = $_REQUEST["uEmail"];
			$uSex = $_REQUEST["uSex"];
			$uDob = $_REQUEST["uDob"];
			$type = $_REQUEST["uType"];
			if($type == "User")
			{			
				//creating new user with a userid
				$uId = create_user($uName, $uEmail, $uPass, "User", $uSex, $uDob);
				
				//redirecting to user_profile page
				header("location:new_user_profile.php?uid=$uId&r=0");
			}
			else if($type == "Recruiter")
			{
				//creating new user with a userid
				$uId = create_user($uName, $uEmail, $uPass, "Recruiter", $uSex, $uDob);
				
				//redirecting to user_profile page
				header("location:new_user_profile.php?uid=$uId&r=1");
			}
		}
		
		if($act=="up")
		{
			$uid = $_REQUEST["uid"];
			$rec = $_REQUEST["rec"];
			
			$fName = $_REQUEST["upFName"];
			$lName = $_REQUEST["upLName"];
			$name = $fName." ".$lName;
			
			$mob = $_REQUEST["upPhone"];
			
			$country = $_REQUEST["upCountry"];
			
			$state = $_REQUEST["upState"];
			
			$dist = $_REQUEST["upDist"];
			
			$ind = $_REQUEST["upIndustry"];
			
			$skills = $_REQUEST["upSkills"];
			
			$exp = $_REQUEST["expYear"];
			
			$projects = $_REQUEST["upProjects"];
			
			//insertion into User Profile
			$status = create_user_profile($uid, $rec, $name, $mob, $country, $state, $dist, $ind, $projects, $skills, $exp);
			
			if($status == 1)
			{
				header("location:index.php");
			}
			else if($status == 2)
			{
				header("location:new_company_profile.php?uid=$uid&rec=1");
			}
			else
			{
				header("location:404");
			}
		}
		
		if($act=="cp")
		{
			$uid = $_REQUEST["uid"];
			
			$rec = $_REQUEST["rec"];
			
			$cName = $_REQUEST["cName"];
			
			$cCountry = $_REQUEST["cCountry"];
			
			$cState = $_REQUEST["cState"];
			
			$cDist = $_REQUEST["cDist"];
			
			$cIndustry = $_REQUEST["cIndustry"];
			
			$cContact = $_REQUEST["cContact"];
			
			$cWebsite = $_REQUEST["cWebsite"];
			
			//insertion into Company Profile
			$status = create_company_profile($cName, $cCountry, $cState, $cDist, $cIndustry, $cContact, $cWebsite);
			
			if($status)
			{
				header("location:index.php");
			}
			else
			{
				header("location:404");
			}
		}
		
		if($act=="login")
		{
			$email = $_REQUEST["Email"];
			$pass = $_REQUEST["Pass"];
			
			$con = dbConnect();
			
			$rsPass = mysqli_query($con, "SELECT uPass FROM user_master WHERE uEmail='$email'");
			if($rsPass)
			{
				while($row=mysqli_fetch_array($rsPass))
				{
					if($row["uPass"]==$pass)
					{
						echo "Success";
					}
					else
					{
						echo "Wrong Pass";
					}
				}
			}
			else
			{
				echo "Wrong User";
			}
		}
		
		if($act=="addJob")
		{
			$jobName = $_REQUEST["jobName"];
			$jobDomain = $_REQUEST["jobIndustry"];
			$jobExp = $_REQUEST["jobExp"];
			$jobSkills = $_REQUEST["jobSkills"];
			$jobCountry = $_REQUEST["jobCountry"];
			$jobDesc = $_REQUEST["jobDesc"];
			$jobIncome = $_REQUEST["jobIncome"];
			$jobApply = $_REQUEST["jobApply"];
			$jobEnd = $_REQUEST["jobEnd"];
			$jobContact = $_REQUEST["jobContact"];
			
			$addJob = create_job($jobName, $jobDomain, $jobExp, $jobSkills, $jobCountry, $jobDesc, $jobApply, $jobEnd, $jobIncome, $jobContact);
			
			if($addJob)
			{
				echo "SucessFully Added";
			}
			else
			{
				echo "Not Added";
			}
		}
		
		if($act=="pedit")
		{
			$uid = $_REQUEST["uid"];
			
			$name = $_REQUEST["upName"];
			
			$mob = $_REQUEST["upMobile"];
			
			$country = $_REQUEST["upCountry"];
			
			$state = $_REQUEST["upState"];
			
			$dist = $_REQUEST["upDist"];
			
			$ind = $_REQUEST["upIndustry"];
			
			$skills = $_REQUEST["upSkills"];
			
			$exp = $_REQUEST["upExp"];
			
			$projects = $_REQUEST["upProjects"];
			
			$bio = $_REQUEST["upBio"];
			
			$x=$_FILES["upFile"];
			
			if(isset($x))
			{
				move_uploaded_file($x["tmp_name"],"user\\profile\\".$x["name"]);
				$img=$x["name"];
			}
			else
			{
				$con = dbConnect();
				$rsImg = mysqli_query($con, "SELECT upPic FROM user_profile WHERE uId=$uid") or die("Error");
				$rowImg = mysql_fetch_array($rsImg);
				$img = $rowImg["upPic"];
			}
			
			//for user master
			
			$email = $_REQUEST["uEmail"];
			
			$sex = $_REQUEST["uSex"];
			
			$dob = $_REQUEST["uDob"];

			
			//insertion into User Profile
			$status = edit_user_profile($uid, $name, $mob, $country, $state, $dist, $ind, $projects, $skills, $exp, $bio, $img, $email, $sex, $dob);
			
			if($status == 1)
			{
				header("location:profile.php?uid=$uid");
			}
			else
			{
				header("location:404");
			}
		}
	}	
?>