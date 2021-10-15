<?php echo $sys_error;?>
<?php if($sys_error == 1){?>
    <div id="message-box" class="<?php echo $sys_error_type;?>">
        <span><?php echo $sys_error_msg;?></span>
    </div>
<?php } ?>