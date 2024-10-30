<style>
#qb {
	background: rgba(252,234,187,1);
background: -moz-linear-gradient(top, rgba(252,234,187,1) 0%, rgba(252,205,77,1) 50%, rgba(248,181,0,1) 51%, rgba(251,223,147,1) 100%);
background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(252,234,187,1)), color-stop(50%, rgba(252,205,77,1)), color-stop(51%, rgba(248,181,0,1)), color-stop(100%, rgba(251,223,147,1)));
background: -webkit-linear-gradient(top, rgba(252,234,187,1) 0%, rgba(252,205,77,1) 50%, rgba(248,181,0,1) 51%, rgba(251,223,147,1) 100%);
background: -o-linear-gradient(top, rgba(252,234,187,1) 0%, rgba(252,205,77,1) 50%, rgba(248,181,0,1) 51%, rgba(251,223,147,1) 100%);
background: -ms-linear-gradient(top, rgba(252,234,187,1) 0%, rgba(252,205,77,1) 50%, rgba(248,181,0,1) 51%, rgba(251,223,147,1) 100%);
background: linear-gradient(to bottom, rgba(252,234,187,1) 0%, rgba(252,205,77,1) 50%, rgba(248,181,0,1) 51%, rgba(251,223,147,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#fceabb', endColorstr='#fbdf93', GradientType=0 );
width:750px;
height:150px;
display:block;
padding:25px;
}
.tarea {
	width:50%;
	display:block;
	border-left:4px solid #F90;
	margin-left:15px;
font-size:14px;
font-weight:bold;
color:#666666;
}
</style>

<h1>Multiple Admin Emails</h1>

<div id="qb">
  <form method="post" action="options.php">
  <?php settings_fields( 'multi_email_fields' ); ?>
  <label for="textfield" style="margin-left:15px;">Enter another admin email id</label> (Do not enter your default admin email)<br /> 
  <input tyle="text" name="multi_email_ids" class="tarea" id="emails" size="20" value="<?php echo get_option( 'multi_email_ids' ); ?>" />
  <?php submit_button(); ?>
  </form>
</div>