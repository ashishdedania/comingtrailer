<option selected="selected" disabled="disabled" value="">Select</option>
<?php
    foreach ($subcat as $value) {

?>
    <option value="<?php echo $value['sub_id'];?>"><?php echo $value['sub_name'];?></option>
<?php
    }
?>


