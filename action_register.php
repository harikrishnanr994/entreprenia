<?php
include("config.php");
$link = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME) or die ("connection failed");
$errors = array();
$data = array(); 
$fname = mysqli_real_escape_string($link,$_POST['fname']);
$lname = mysqli_real_escape_string($link,$_POST['lname']);
$pwd = mysqli_real_escape_string($link,$_POST['pwd']);
$cpwd = mysqli_real_escape_string($link,$_POST['cpwd']);
$college = mysqli_real_escape_string($link,$_POST['college']);
$email = mysqli_real_escape_string($link,$_POST['email']);
$phone = mysqli_real_escape_string($link,$_POST['phone']);
$phone = '+91'.$phone;
$accom = isset($_POST['acccomodation']) ? mysqli_real_escape_string($link,$_POST['acccomodation']) : 'no';
$gender =  mysqli_real_escape_string($link,$_POST['gender']);
  
$activation = md5(uniqid(rand(), true));
$activated = "0";
$bool = true;
function hashSSHA($password) {
    $salt = sha1(rand());
    $salt = substr($salt, 0, 10);
    $encrypted = base64_encode(sha1($password . $salt, true) . $salt);
    $hash = array("salt" => $salt, "encrypted" => $encrypted);
    return $hash;
}
if($pwd == $cpwd) { 
    $id = mysqli_query($link, "Select *  from users ORDER BY id DESC limit 1 ");
    $row = mysqli_fetch_array($id);
    $uid=$row['id'];
    $uid++;
    $uid = str_pad($uid, 4, '0', STR_PAD_LEFT);
    $uuid="EEDC16".$uid;
    $query = mysqli_query($link, "Select * from users");
    while($row = mysqli_fetch_array($query)) {
      	$table_users = $row['email']; 
	      	if($email == $table_users) {
	      		$bool = false;
	      $errors['email']= 'This email is already registered with us!';
	    }
	}
    
	if($bool) {
	    $hash = hashSSHA($pwd);
	    $encrypted_password = $hash["encrypted"];
	    $salt = $hash["salt"];
	      
	    mysqli_query($link, "INSERT INTO users (uuid, fname, lname, password, salt, email, mobile, college, accomodation, activation, activated, gender) VALUES ('$uuid','$fname','$lname','$encrypted_password','$salt','$email','$phone','$college','$accom','$activation','$activated','$gender')"); 
	    if (mysqli_affected_rows($link) == 1) {
			/*$message = '<!DOCTYPE html>
				<html>
				   <head>
				      <style type="text/css">        
				         body {width:100% !important; margin:0; padding:0; -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%;}
				         #backgroundTable {margin:0; padding:0; width:100% !important; line-height: 100% !important;}
				         img {outline:none; text-decoration:none; border:none; -ms-interpolation-mode: bicubic;}
				         a img {border:none;}
				         .image_fix {display:block;}
				         p {margin: 0px !important;}
				         table td {border-collapse: collapse;}
				         table {border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;}
				         table[class=full] { width: 100%; }
				         
				         #outlook a {padding:0;} 
				         
				         .ExternalClass {width:100%;} 
				         .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {line-height: 100%;} 
       
				         body, td {font-family: Helvetica, Arial, sans-serif; font-size:14px; color: #000000;}
				                 
				         @media only screen and (max-width: 640px) {
				         a[href^="tel"], a[href^="sms"] {
				         text-decoration: none;
				         color: #ffffff; 
				         pointer-events: none;
				         cursor: default;
				         }
				         .mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
				         text-decoration: default;
				         color: #ffffff !important;
				         pointer-events: auto;
				         cursor: default;
				         }
				         table[class=devicewidth] {width: 440px !important; text-align:center !important;}
				         td[class=devicewidth] {width: 440px !important; text-align:center !important;}
				         table[class=devicewidthinner] {width: 420px !important; text-align:center !important;}
				         td[class=devicewidthinner] {width: 420px !important; text-align:center !important;}        
				         table[class="emhide"] {display: none !important;}
				         td[class="emhide"] {display: none !important;}
				         img[class="bigimage"] {width: 440px !important; height:169px !important;}
				         img[class="col2img"] {width: 260px !important; height:103px !important;}
				         img[class="col2img2"] {width: 260px !important; height:103px !important; padding-top:25px;}         
				         td[class="logo"] {text-align: center !important;} 
				         img[class="features"] {padding-bottom:25px;}            
				         table[class=sep] {width: 80% !important;}  
				         td[class=mobilecentering] {text-align:center !important;}   
				         table[class=FluidButton] {text-align: center;margin: 0px auto !important;}    
				         td[class=footer] {width: 100%; padding-left: 10px; padding-right: 10px; text-align:center !important;}                   
				         }
				         
				       
				         @media only screen and (max-width: 480px) {
				         a[href^="tel"], a[href^="sms"] {
				         text-decoration: none;
				         color: #ffffff; 
				         pointer-events: none;
				         cursor: default;
				         }
				         .mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
				         text-decoration: default;
				         color: #ffffff !important; 
				         pointer-events: auto;
				         cursor: default;
				         }
				         table[class=devicewidth] {width: 280px !important; text-align:center !important;}
				         td[class=devicewidth] {width: 280px !important; text-align:center !important;}
				         table[class=devicewidthinner] {width: 260px !important; text-align:center !important;}
				         td[class=devicewidthinner] {width: 260px !important; text-align:center !important;}
				         table[class="emhide"] {display: none !important; }
				         td[class="emhide"] {display: none !important; }
				         img[class="bigimage"] {width: 280px !important; height:116px !important;}
				         img[class="col2img"] {width: 260px !important; height:103px !important;}
				         img[class="col2img2"] {width: 260px !important; height:103px !important;} 
				         }
				      </style>      
				   </head>
				   <body bgcolor="#eeeeee">
				      
				  
				   
				   <!-- Start of header -->
				   <table width="100%"  cellpadding="0" cellspacing="0" border="0" id="backgroundTable">      
				         <tr>
				            <td align="center">
				               <table bgcolor="#FFFFFF" width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth">                  
				                     <tr>
				                        <td align="center">
				                           <table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth">                              
				                                 <tr>
				                                    <td align="center">
				                                       <table width="540" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth">
				                                          
				                                            <!-- Spacing -->
				                                             <tr>
				                                                <td width="100%" height="30" style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">&nbsp;</td>
				                                             </tr>
				                                             <!-- End of Spacing -->                                          
				                                             <!-- Logo: 179x40 pixels -->
				                                             <tr>
				                                                <td width="100%" align="center" valign="middle" class="devicewidthinner" style="text-align:center;">
				                                                   <img width="179" height="40" src="http://edc.phacsin.com/img/theme/logo-mail.png" alt="logo" border="0" style="border:none; outline:none; text-decoration:none;">
				                                                </td>
				                                             </tr>
				                                             <!-- End of Logo -->
				                                             <!-- Spacing -->
				                                             <tr>
				                                                <td width="100%" height="30" style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">&nbsp;</td>
				                                             </tr>
				                                             <!-- End of Spacing -->                                            
				                                       </table>
				                                    </td>
				                                 </tr>                             
				                           </table>
				                        </td>
				                     </tr>                  
				               </table>
				            </td>
				         </tr>      
				   </table>
				   <!-- End of Header -->

				   <!-- Start of main image -->
				   <table width="100%"  cellpadding="0" cellspacing="0" border="0" id="backgroundTable">      
				         <tr>
				            <td align="center">
				            <!-- Main image: 600x203 pixels and line -->
				               <table bgcolor="#ffffff" width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth">
				                     <tr>
				                        <td width="600" align="center" cellspacing="0" cellpadding="0" border="0" class="devicewidth">
				                          <img width="600" border="0" height="203" alt="main image" style="display:block; border:none; outline:none; text-decoration:none;" src="http://edc.phacsin.com/img/theme/main-image.jpg" class="bigimage">
				                        </td>
				                     </tr>
				                     <tr>
				                        <td height="4" style="font-size: 0px; line-height: 0px;" bgcolor="#ea3a52">&nbsp;</td>
				                     </tr>   
				               </table>  
				            </td>
				            <!-- End of Main image -->
				         </tr>      
				   </table>
				   <!-- End of main image -->

				   <!-- Block 1 -->
				   <table width="100%"  cellpadding="0" cellspacing="0" border="0" id="backgroundTable">      
				         <tr>
				            <td align="center">
				               <table bgcolor="#ffffff" width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth">                 
				                     <tr>
				                        <td align="center">
				                           <table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth">                             
				                                 <!-- Spacing -->
				                                 <tr>
				                                    <td width="100%" height="30" style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">&nbsp;</td>
				                                 </tr>
				                                 <!-- End of Spacing -->
				                                 <tr>
				                                    <td align="center">
				                                       <table width="540" align="center" cellpadding="0" cellspacing="0" border="0" class="devicewidthinner">                                          
				                                             <!-- Title -->
				                                             <tr>
				                                                <td style="font-family: Helvetica, Arial, sans-serif; text-align:center; font-weight:bold; font-size: 24px; line-height:24px;">
				                                                   Confirm your email address
				                                                </td>
				                                             </tr>
				                                             <!-- End of Title -->
				                                             <!-- Spacing -->
				                                             <tr>
				                                                <td height="15" style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">&nbsp;</td>
				                                             </tr>
				                                             <!-- End of Spacing -->
				                                             <!-- Content -->
				                                             <tr>
				                                                <td style="font-family: Helvetica, Arial, sans-serif; font-weight: normal; font-size:14px; color: #0E0E0E; line-height:18px; text-align:center;">
				                                                    The Innovation and Entrepreneurship Development Cell of NSS College of Engineering, Palakkad is an organisation  that support entrepreneurship in students.We have recently won the awards for Innovation and Leadership in the country and also paved way for earning the Best Engineering College South Award.<br><br>

				                                                    Currently we have 17 startups and more are in the pre registration phases.The cell host various programs for the students of NSSCe and other Schools and Colleges around Kerala.We give workshops , Hands on Experience and experience sharing .<br><br>

				                                                    We take the pleasure to welcome you into the EDC family and hope to have your hands in developing the College and EDC in the coming years</td>
				                                             </tr>
				                                             <!-- End of content -->
				                                             <!-- Spacing -->
				                                             <tr>
				                                                <td width="100%" height="20" style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">&nbsp;</td>
				                                             </tr>
				                                             <!-- End of Spacing -->
				                                             <!-- Button -->
				                                             <tr>
				                                                <td align="center">
				                                                   <table height="40" align="center" valign="middle" border="0" cellpadding="0" cellspacing="0" class="tablet-button" style="border-collapse:separate;">                                                      
				                                                         <tr>
				                                                            <td width="auto" align="center" valign="middle" height="40" style="background-color:#ea3a52; border-top-left-radius:5px; border-bottom-left-radius:5px; border-top-right-radius:5px; border-bottom-right-radius:5px; background-clip: padding-box; font-size:17px; font-family: Helvetica, Arial, sans-serif; text-align:center; color:#ffffff; font-weight: bold; letter-spacing: 1px; padding-left:42px; padding-right:42px;">
				                                                               <span style="color: #ffffff; font-size:17px;">


				                                                               <a style="color: #ffffff; text-align:center;text-decoration: none;" href="www.dvaita16.com/activate.php?email=' . $email . '&key='.$activation.'">Confirm my email</a>

				                                                               </span>
				                                                            </td>
				                                                         </tr>                                                     
				                                                   </table>
				                                                </td>
				                                             </tr>
				                                             <!-- End of Button -->                                                                                                                                                                                        
				                                             <!-- Spacing -->
				                                             <tr>
				                                                <td width="100%" height="28" style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">&nbsp;</td>
				                                             </tr>
				                                             <!-- End of Spacing -->                                                                                                                     
				                                       </table>
				                                    </td>
				                                 </tr>                             
				                           </table>
				                        </td>
				                     </tr>                  
				               </table>
				            </td>
				         </tr>      
				   </table>
				   <!-- End of Block 1 -->   
 

				   <!-- Start of footermenu -->
				   <table width="100%"  cellpadding="0" cellspacing="0" border="0" id="backgroundTable">      
				         <tr>
				            <td align="center">
				               <table width="600" bgcolor="#a0a0a0" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth">                 
				                     <tr>
				                        <td align="center">
				                           <table width="540" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth">                             
				                                <!-- Spacing -->
				                                <tr>
				                                    <td width="100%" height="20" style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">&nbsp;</td>
				                                </tr>
				                                 <!-- End of Spacing --> 
				                                 <!-- Company information -->                                
				                                 <tr>
				                                    <td width="100%" align="center" valign="middle" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px; color:#fefefe; text-align:center;" class="footer">EDC, NSS College of Engineering, Palakkad | Kerala India | <a href="mailto:contact@edcnssce.org" style="text-decoration: none; color:#fefefe;">contact@edcnssce.org</a>
				                                    </td>                                 
				                                 </tr> 
				                                <!-- End of Company information -->
				                                <!-- Spacing -->
				                                <tr>
				                                    <td width="100%" height="10" style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">&nbsp;</td>
				                                </tr>
				                                 <!-- End of Spacing -->                                                              
				                                 <!-- Social icons -->

				                                <!-- End of Social icons -->
				                                <!-- Spacing -->
				                                <tr>
				                                    <td width="100%" height="18" style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">&nbsp;</td>
				                                </tr>
				                                 <!-- End of Spacing -->                                                                  
				                           </table>
				                        </td>
				                     </tr>                  
				               </table>
				            </td>
				         </tr>      
				   </table>

				  </body>
				</html>';
				$subject = 'Registration Confirmation';
				$headers  = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
				$headers .= 'From: no-reply@edcnssce.org'."\r\n".
				    'Reply-To: '."\r\n" .
				    'X-Mailer: PHP/' . phpversion();
				mail($email, $subject , $message, $headers);     */
	    
	        $data['success'] = true;
	        $data['message'] = 'Success!';
	    }
	    else {
	        $data['success'] = false;
		    $data['errors']  = $errors;
	    }
	}
	echo json_encode( $data );
}
?>
