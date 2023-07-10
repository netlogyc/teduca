<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta charset="utf-8"> <!-- utf-8 works for most cases -->
    <meta name="viewport" content="width=device-width"> <!-- Forcing initial-scale shouldn't be necessary -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Use the latest (edge) version of IE rendering engine -->
    <meta name="x-apple-disable-message-reformatting">  <!-- Disable auto-scale in iOS 10 Mail entirely -->
    <title></title> <!-- The title tag shows in email notifications, like Android 4.4. -->

    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900" rel="stylesheet">

<!-- CSS Reset : BEGIN -->
<style>

/* What it does: Remove spaces around the email design added by some email clients. */
/* Beware: It can remove the padding / margin and add a background color to the compose a reply window. */
html,
body {
    margin: 0 auto !important;
    padding: 0 !important;
    height: 100% !important;
    width: 100% !important;
    mso-line-height-rule: exactly; 
    background-color: #222222;
}
/* What it does: Stops email clients resizing small text. */
* {
    -ms-text-size-adjust: 100%;
    -webkit-text-size-adjust: 100%;
}

/* What it does: Centers email on Android 4.4 */
div[style*="margin: 16px 0"] {
    margin: 0 !important;
}

/* What it does: Stops Outlook from adding extra spacing to tables. */
table,
td {
    mso-table-lspace: 0pt !important;
    mso-table-rspace: 0pt !important;
}

/* What it does: Fixes webkit padding issue. */
table {
    border-spacing: 0 !important;
    border-collapse: collapse !important;
    table-layout: fixed !important;
    margin: 0 auto !important;
}

/* What it does: Uses a better rendering method when resizing images in IE. */
img {
    -ms-interpolation-mode:bicubic;
}

/* What it does: Prevents Windows 10 Mail from underlining links despite inline CSS. Styles for underlined links should be inline. */
a {
    text-decoration: none;
}

/* What it does: A work-around for email clients meddling in triggered links. */
*[x-apple-data-detectors],  /* iOS */
.unstyle-auto-detected-links *,
.aBn {
    border-bottom: 0 !important;
    cursor: default !important;
    color: inherit !important;
    text-decoration: none !important;
    font-size: inherit !important;
    font-family: inherit !important;
    font-weight: inherit !important;
    line-height: inherit !important;
}

/* What it does: Prevents Gmail from displaying a download button on large, non-linked images. */
.a6S {
    display: none !important;
    opacity: 0.01 !important;
}

/* What it does: Prevents Gmail from changing the text color in conversation threads. */
.im {
    color: inherit !important;
}

/* If the above doesn't work, add a .g-img class to any image in question. */
img.g-img + div {
    display: none !important;
}

/* What it does: Removes right gutter in Gmail iOS app: https://github.com/TedGoas/Cerberus/issues/89  */
/* Create one of these media queries for each additional viewport size you'd like to fix */
.email-container {
	margin: 0 auto !important;
	max-width: 600px !important; 
}

/* iPhone 4, 4S, 5, 5S, 5C, and 5SE */
@media only screen and (min-device-width: 320px) and (max-device-width: 374px) {
    .email-container {
        min-width: 320px !important;
    }
}
/* iPhone 6, 6S, 7, 8, and X */
@media only screen and (min-device-width: 375px) and (max-device-width: 413px) {
    .email-container {
        min-width: 375px !important;
    }
}
/* iPhone 6+, 7+, and 8+ */
@media only screen and (min-device-width: 414px) {
    .email-container {
        min-width: 414px !important;
    }
}
</style>

<!-- CSS Reset : END -->

<!-- Progressive Enhancements : BEGIN -->
<style>

.primary{
	background: #f5564e;
}
.bg_white{
	background: #ffffff;
}
.bg_light{
	background: #fafafa;
}
.bg_black{
	background: #000000;
}
.bg_dark{
	background: rgba(0,0,0,.8);
}

.center {
	width: 100% !important; 
	background-color: #f1f1f1 !important;
	text-align: center;
}
.email-section{
	padding:2.5em;
}
.top {
	padding: 1em 2.5em;
} 
.text-center {
	text-align: center !important;
}

/*BUTTON*/
.btn{
	padding: 5px 15px;
	display: inline-block;
}
.btn.btn-primary{
	border-radius: 5px;
	background: #f5564e;
	color: #ffffff;
}
.btn.btn-white{
	border-radius: 5px;
	background: #ffffff;
	color: #000000;
}
.btn.btn-white-outline{
	border-radius: 5px;
	background: transparent;
	border: 1px solid #fff;
	color: #fff;
}

h1,h2,h3,h4,h5,h6{
	font-family: 'Nunito Sans', sans-serif;
	color: #ffffff;
	margin-top: 0px;
	margin-bottom: 0px;
}

body{
	font-family: 'Nunito Sans', sans-serif;
	font-weight: 400;
	font-size: 15px;
	line-height: 1.8;
	color: rgba(0,0,0,.4);
}

a{
	color: #f5564e;
}

table{
	margin: 0 auto !important;
}

.height-space {
	display: none; 
	font-size: 1px;
	max-height: 0px; 
	max-width: 0px; 
	opacity: 0; 
	height: 20px !important;
	overflow: hidden; 
	mso-hide: all; 
	font-family: sans-serif;
}
.padding-left {
	padding-left: 3% !important;
}
/*LOGO*/

.logo h1{
	margin: 0;
	text-align: left;
}
.logo h1 a{
	color: #000;
	font-size: 20px;
	font-weight: 700;
	text-transform: uppercase;
	font-family: 'Nunito Sans', sans-serif;
}
.logo h1 a img {
	max-width: 150px !important;
	max-height: 50px !important;
	overflow: hidden;
	display: block;
}

.navigation{
	padding: 0;
	text-align: right;
}
.navigation li{
	list-style: none;
	display: inline-block;;
	margin-left: 5px;
	font-size: 12px;
	font-weight: 700;
	text-transform: uppercase;
}
.navigation li a{
	color: rgba(0,0,0,.6);
}

/*HERO*/
.hero{
	position: relative;
	z-index: 0;
}
.hero .overlay{
	position: absolute;
	top: 0;
	left: 0;
	right: 0;
	bottom: 0;
	content: '';
	width: 100%;
	background: #000000;
	z-index: -1;
	opacity: .3;
}
.hero .icon{
}
.hero .icon a{
	display: block;
	width: 60px;
	margin: 0 auto;
}
.hero .text{
	color: rgba(255,255,255,.8);
	padding: 0 4em;
}
.hero .text h2{
	color: #ffffff;
	font-size: 40px;
	margin-bottom: 0;
	line-height: 1.2;
	font-weight: 900;
}


/*HEADING SECTION*/
.body-header {
	text-align: center; 
	color: #000; 
	margin-top: 15px;
	margin-bottom: 15px;
}

.heading-section{
}
.heading-section h2{
	color: #000000;
	font-size: 24px;
	margin-top: 0;
	line-height: 1.4;
	font-weight: 700;
}
.heading-section .subheading{
	margin-bottom: 20px !important;
	display: inline-block;
	font-size: 13px;
	text-transform: uppercase;
	letter-spacing: 2px;
	color: rgba(0,0,0,.4);
	position: relative;
}
.heading-section .subheading::after{
	position: absolute;
	left: 0;
	right: 0;
	bottom: -10px;
	content: '';
	width: 100%;
	height: 2px;
	background: #f5564e;
	margin: 0 auto;
}

.heading-section-white{
	color: rgba(255,255,255,.8);
}
.heading-section-white h2{
	font-family: 
	line-height: 1;
	padding-bottom: 0;
}
.heading-section-white h2{
	color: #ffffff;
}
.heading-section-white .subheading{
	margin-bottom: 0;
	display: inline-block;
	font-size: 13px;
	text-transform: uppercase;
	letter-spacing: 2px;
	color: rgba(255,255,255,.4);
}

.heading-section-white p {
	margin: 4px auto;
}


.icon{
	text-align: center;
}
.icon img{
}

</style>


</head>

<body width="100%">
	<div class="center">
    <div class="height-space"></div>
    <div class="email-container">
      <!-- BEGIN BODY -->
      <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
		  <tr>
          <td valign="middle" class="hero bg_white">
          	<div class="overlay"></div>
            <table>
            	<tr>
            		<td>
            			<div class="text body-header">
            				<h3>{{ $setting->title }}</h3>
            			</div>
            		</td>
            	</tr>
            </table>
          </td>
	      </tr><!-- end tr -->
	      <tr>
	        <td class="bg_dark email-section text-center">
	        	<div class="heading-section heading-section-white">
	          	
	          	<!-- Content Area -->
	          	@isset($data['student_id'])
	          	<h4>{{ __('field_student_id') }}: {{ $data['student_id'] }}</h4>
	          	<p>{{ __('field_website_url') }}: <a href="{{ route('student.login') }}">{{ route('student.login') }}</a></p>
	          	<hr/>
	          	@endisset
	          	@isset($data['staff_id'])
	          	<h4>{{ __('field_staff_id') }}: {{ $data['staff_id'] }}</h4>
	          	<p>{{ __('field_website_url') }}: <a href="{{ route('login') }}">{{ route('login') }}</a></p>
	          	<hr/>
	          	@endisset
	          	<h3>{{ $data['subject'] }}</h3>

				<p>{{ __('field_email') }} : {{ $data['email'] }}</p>
				<p>{{ __('field_password') }} : {{ $data['password'] }}</p>
				<br/>
          		<!-- Content Area -->
	        	</div>
	        </td>
	      </tr><!-- end: tr -->
      <!-- 1 Column Text + Button : END -->
      </table>
    </div>
  </div>
</body>
</html>