<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="format-detection" content="email=no">
 <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
 <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;800&display=swap" rel="stylesheet">
<title>virtual</title>
<style></style>
</head>
<body>
	<div style="width:100%;background-color:#f2f1f2;display:inline-block;margin:30px 0;">
	     <div class="logo_center" style="text-align:center;">
	         <img src="{{ url()->asset('public/images/builder/images/logo-email.png') }}" style="padding:8px 25px; margin-top:5px;"/>
		 </div>
		 <div style="max-width:750px; background-color: #fff; margin:0 auto; margin:20px auto;">	
			<table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:100%; font-family:verdana;
			padding:5px 30px;">
				  <tbody>
					<tr>			 
					  <td style="padding:80px 0 10px; font-family: 'Open Sans', sans-serif; color:#0D5A6D; font-size:22px;"><p style="margin-top: 15px;">Dear <?php if(isset( $data['reference_name'])){echo $data['reference_name']; } ?>,</p></td> 					         	  
					</tr>
					<tr>
<!--worker is reference name-->	
<!--employer is resume name-->					
					  <td style="padding:10px 0 10px; font-family: 'Open Sans', sans-serif; color:#0D5A6D; font-size:22px;">
					  <p style="margin-bottom: 30px;"><?php if(isset( $data['resume_name'])){echo $data['resume_name']; }?> is kindly requesting a reference from you for working with your company.</p></td> 					         	  
					</tr>
					<tr>			 
					  <td style="padding:10px 0 10px; font-family: 'Open Sans', sans-serif; color:#0D5A6D; font-size:22px;"><p><?php if(isset( $data['resume_name'])){echo $data['resume_name']; }?> is using the resume builder tool at VirtualWorkers.pH.</p></td> 					         	  
					</tr>
                    <tr>			 
					  <td style="padding:10px 0 10px; font-family: 'Open Sans', sans-serif; color:#0D5A6D; font-size:22px;"><p>Your time is appreciated.</p></td> 					         	  
					</tr>					
					<tr>			 
					  <td style="padding:80px 0 40px; text-align:center;"><p><a style="background-color: #26AE61; color: #fff; font-size:20px; text-decoration:none; font-family: 'Montserrat', sans-serif; padding: 13px 20px; border-radius:4px; font-weight: 700;" href="{{url('/resume-builder/reference-response')}}?email=<?php echo $data['enc_email']; ?>&user_id=<?php echo $data['enc_user_id']; ?>&template_id=<?php echo $data['enc_template_id']; ?>&first_name=<?php echo $data['enc_first_name']; ?>">Click to here with a reference</a></p></td>                     				  
					</tr>
					<tr>			 
					  <td style="padding:10px 0 10px; font-family: 'Open Sans', sans-serif; color:#0D5A6D; font-size:22px;"><p>Regards</p></td>                     				  
					</tr>
					<tr>			 					 
                      <td style="padding:10px 0 10px; font-family: 'Open Sans', sans-serif; color:#0D5A6D; font-size:22px;"><p>Team VirtualWorkers</p></td> 					  
					</tr>                   				
				  </tbody>
			 </table>			 			
		 </div>
		 <div style="max-width:750px; background-color: #fff; margin:0 auto; margin:20px auto;">	
			<table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:100%; font-family:verdana;
			padding:5px 30px;">
				  <tbody>
					<tr>			 
					  <td style="padding:10px 0 25px; font-family: 'Open Sans', sans-serif; color:#0D5A6D; font-size:22px;"><p style="margin-top: 15px;">If you <span style="font-weight:900;">cant access</span> the above link, copy and paste the below URL into your browser http://production.virtualworkers.ph/</p></td> 					         	  
					</tr>
								
				  </tbody>
			 </table>			 			
		 </div>
	</div>
</body>
</html>
