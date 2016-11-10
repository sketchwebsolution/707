<?php
if($_POST['save'])
{
	
	update_option('webq_random_text',$_POST['ran']);
	update_option('webq_videocode',$_POST['vid']);
	update_option('home_default_tab',$_POST['def_tab']);
	update_option('webq_tour_page',$_POST['tourlink']);
	update_option('webq_tour_msg',$_POST['tourmsg']);
	
	$msg="Successfully Updated";
}

?>
<form action="" method="post">
<table>
  <tr>
    <td colspan="3"><h1>Theme Settings</h1></td>  
  </tr>
  <tr>
    <td colspan="3" style="color:#063"><?php echo $msg; ?></td>
  </tr>
  <tr>
    <td>You Tube videocode</td>
    <td><textarea name="vid" cols="60" rows="5"><?php echo stripslashes(get_option('webq_videocode')); ?></textarea></td>
    <td>Paste your 390x267 youtube video code.</td>
  </tr>
  <tr>
    <td>Randomize Text</td>
    <td><textarea name="ran" cols="60" rows="5"><?php echo stripslashes(get_option('webq_random_text')); ?></textarea></td>
    <td>Enter the top randomize text separating with commas  </td>
  </tr>
  <tr>
    <td>Homepage Default Tab</td>
    <td>
    <?php $tab=stripslashes(get_option('home_default_tab')); ?>
    <select name="def_tab">
    	<option value="">--Select--</option>
       	<option value="video" <?php if($tab=='video') echo 'selected="selected"'; ?>>Video</option>
        <option value="noticias" <?php if($tab=='noticias') echo 'selected="selected"'; ?>>Noticias</option>
        <option value="tour" <?php if($tab=='tour') echo 'selected="selected"'; ?>>Tour</option>
        <option value="twitter" <?php if($tab=='twitter') echo 'selected="selected"'; ?>>Twitter</option>        
        <option value="facebook" <?php if($tab=='facebook') echo 'selected="selected"'; ?>>Facebook</option>       
    </select>
    </td>
    <td>Select default tab for home page</td>
  </tr>
  <tr>
    <td><strong>Event Page Link</strong></td>
    <td><input type="text" size="50" name="tourlink" value="<?php echo stripslashes(get_option('webq_tour_page')); ?>" /></td>
    <td>Enter the link of event page for home page tour tab  </td>
  </tr>
  <tr>
    <td><strong>No Event massage</strong></td>
    <td><input type="text" size="50" name="tourmsg" value="<?php echo stripslashes(get_option('webq_tour_msg')); ?>" /></td>
    <td>This massage will display if no event found in home page tour tab </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input name="save" type="submit" class="button-primary" id="save" value="Save"></td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>