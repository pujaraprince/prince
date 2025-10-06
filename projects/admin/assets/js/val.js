
function validation45(str) {
	
		
		if(str.ufn.value=="")
		{
			alert(' Name field is required !');
			document.getElementById('ufn').focus();
			return false;
		}
		
		if(str.uln.value=="")
		{
			alert('Email Name field is required !');
			document.getElementById('uln').focus();
			return false;
		}

	    if(!str.uln.value.match(/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,3})+$/))
          	{
	     alert('Please enter Correct Email Address');
	        document.getElementById('uln').focus();
	      return false;
	       }


		if(str.project.value=="")
		{
			alert('Project  field is required !');
			document.getElementById('project').focus();
			return false;
		};
	   
		

		if(str.mobile.value=="")
		{
			alert('Mobile Number field is required !');
			document.getElementById('mobile').focus();
			return false;
		}
         
		

		if(!str.mobile.match(/^[0-9]{8,12}$/))
	      {
	        alert('! Please enter mobile number between 8 to 12 digit length');
	  document.getElementById('mobile').focus();
	        return false;
	}

     if(str.message.value=="")
		{
			alert('Message field is required !');
			document.getElementById('message').focus();
			return false;
		}
	};




	function validation4(str) {
	
		
		if(str.sname.value=="")
		{
			alert('Name field is required !');
			document.getElementById('sname').focus();
			return false;
		}
		
		if(str.semail.value=="")
		{
			alert('Email Name field is required !');
			document.getElementById('semail').focus();
			return false;
		};

	    if(!str.semail.value.match(/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,3})+$/))
	     {
	     alert('Please enter Correct Email Address');
	        document.getElementById('semail').focus();
	      return false;
	     }

		if(str.spass.value=="")
		{
			alert('Password  field is required !');
			document.getElementById('spass').focus();
			return false;
		};
	   
		

		if(str.smobile.value=="")
		{
			alert('Mobile Number field is required !');
			document.getElementById('smobile').focus();
			return false;
		}
         
		

		if(str.smobile.value.length<8 || str.smobile.value.length>12)
	      {
	        alert('! Please enter mobile number between 8 to 12 digit length');
	  document.getElementById('smobile').focus();
	        return false;
	}

     if(str.address.value=="")
		{
			alert('Address field is required !');
			document.getElementById('address').focus();
			return false;
		}

		if(str.pincode.value=="")
		{
			alert('Pincode field is required !');
			document.getElementById('pincode').focus();
			return false;
		}

		if(str.photo.value=="")
	   {
		alert('photo field is required !');
			document.getElementById('photo').focus();
	  return false;
	}
	}




	function check(file)
	{
	
	var filename=file.value;
	var ext=filename.substring(filename.lastIndexOf('.')+1); // get ext from file name
	
		if(ext=="jpg" || ext=="png" || ext=="jpeg" || ext=="gif" || ext=="JPG" || 
		ext=="PNG" || ext=="JPEG" || ext=="GIF" || ext=="webp")
		{
			
			document.getElementById("submit").disabled=false;
		}
		else
		{
			alert('! Please upload only JPG , GIF , JPEG File');
			document.getElementById("submit").disabled=true;
		}
	} 


	function validation35(str) {
	
		
		if(str.sename.value=="")
		{
			alert('Service Name field is required !');
			document.getElementById('sename').focus();
			return false;
		}
		
		if(str.desc.value=="")
		{
			alert('Description field is required !');
			document.getElementById('desc').focus();
			return false;
		};

	
		if(str.sprice.value=="")
		{
			alert('Price  field is required !');
			document.getElementById('sprice').focus();
			return false;
		};
	   


		if(str.photo1.value=="")
	   {
		alert('Upload image field is required !');
			document.getElementById('photo1').focus();
	  return false;
	}

	if(str.select.value=="")
	   {
		alert('Select a category field is required !');
		str.select.focus();
	  return false;
	}
	}


	function validation55(str) {
	
		
		if(str.cname.value=="")
		{
			alert('Category Name field is required !');
			document.getElementById('cname').focus();
			return false;
		}
		
		if(str.cdesc.value=="")
		{
			alert('Category Description field is required !');
			document.getElementById('cdesc').focus();
			return false;
		}

	

		if(str.photo2.value=="")
	   {
		alert('Upload image field is required !');
			document.getElementById('photo2').focus();
	  return false;
	}

	
	}


	