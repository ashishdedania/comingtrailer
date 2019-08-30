<div class="ctbody-content">

<?php
if(!empty($message)){
$msg=explode("_",$message);
echo '<div class="alert alert-'.$msg[0].'">
'.$msg[1].'!
</div>';
}
?>

<div class="adsense-info">

        <div class="block">
            <?php echo form_open_multipart(base_url( 'backend/adsense/save' ), array( 'method' => 'POST' ));?>
                <input type="hidden" name="width" value="728">
                <input type="hidden" name="height" value="90">
                <input type="hidden" name="media" value="W">
                <p class="title">728x90 (website)</p>
                <div class="inside-box cf">
                    <input type="radio" name="radio_val"
                    <?php if(!empty($edit_data) &&
                             !empty($edit_data['728X90_W']) &&
                             $edit_data['728X90_W']['selected_show_opt']=="C")
                             { echo "checked"; }
                    ?>
                   checked class="radio-button" value="C">

                    <textarea class="code" name="code" rows="10" cols="40"><?php if(!empty($edit_data) &&
                            !empty($edit_data['728X90_W']))
                        { echo $edit_data['728X90_W']['code']; }
                        ?></textarea>
                </div>
                <div class="inside-box cf">
                    <input type="radio" name="radio_val"
                    <?php if(!empty($edit_data) &&
                        !empty($edit_data['728X90_W']) &&
                        $edit_data['728X90_W']['selected_show_opt']=="I")
                    { echo "checked"; }
                    ?>
                   class="radio-button" value="I">
                    <div class="image-wrap">
                        <input type="file" name="attachment" class="attach-file" size="30">
                        <div class="image"><img src="<?php if(!empty($edit_data) && !empty($edit_data['728X90_W']['img_name'])){ echo base_url()."images/jaherat/".$edit_data['728X90_W']['img_name']; } ?>" alt="" />

                        <?php if(!empty($edit_data) && !empty($edit_data['728X90_W']['img_name'])){ ?>
                            <a onclick="return confirm('Are You Sure You Want To Delete?')" href="<?php echo base_url()."backend/adsense/delete?id=".$edit_data['728X90_W']['id'] ?>" class="delete">DELETE</a>
                        <?php } ?>
                    </div>

                    <div class="input-wrap">
                        <label>Image Link</label>
                        <input value="<?php if(!empty($edit_data) &&
                            !empty($edit_data['728X90_W']))
                        { echo $edit_data['728X90_W']['img_link']; }
                        ?>" name="img_link" class="input-field full-field" type="url">
                    </div>
                </div>
                <input type="submit" class="button" value="Save">
            </div>
            <?php echo form_close();?>
        </div>



        <div class="block">
            <?php echo form_open_multipart(base_url( 'backend/adsense/save' ), array( 'method' => 'POST' ));?>
            <input type="hidden" name="width" value="300">
            <input type="hidden" name="height" value="250">
            <input type="hidden" name="media" value="W">
            <p class="title">300x250 (website)</p>
            <div class="inside-box cf">
                <input type="radio" name="radio_val"
                    <?php if(!empty($edit_data) &&
                        !empty($edit_data['300X250_W']) &&
                        $edit_data['300X250_W']['selected_show_opt']=="C")
                    { echo "checked"; }
                    ?>
                       checked class="radio-button" value="C">

                    <textarea class="code" name="code" rows="10" cols="40"><?php if(!empty($edit_data) &&
                            !empty($edit_data['300X250_W']))
                        { echo $edit_data['300X250_W']['code']; }
                        ?></textarea>
            </div>
            <div class="inside-box cf">
                <input type="radio" name="radio_val"
                    <?php if(!empty($edit_data) &&
                        !empty($edit_data['300X250_W']) &&
                        $edit_data['300X250_W']['selected_show_opt']=="I")
                    { echo "checked"; }
                    ?>
                       class="radio-button" value="I">
                <div class="image-wrap">
                    <input type="file" name="attachment" class="attach-file" size="30">
                    <div class="image"><img src="<?php if(!empty($edit_data) && !empty($edit_data['300X250_W']['img_name'])){ echo base_url()."images/jaherat/".$edit_data['300X250_W']['img_name']; } ?>" alt="" />

                        <?php if(!empty($edit_data) && !empty($edit_data['300X250_W']['img_name'])){ ?>
                            <a onclick="return confirm('Are You Sure You Want To Delete?')" href="<?php echo base_url()."backend/adsense/delete?id=".$edit_data['300X250_W']['id'] ?>" class="delete">DELETE</a>
                        <?php } ?>
                    </div>

                    <div class="input-wrap">
                        <label>Image Link</label>
                        <input value="<?php if(!empty($edit_data) &&
                            !empty($edit_data['300X250_W']))
                        { echo $edit_data['300X250_W']['img_link']; }
                        ?>" name="img_link" class="input-field full-field" type="url">
                    </div>
                </div>
                <input type="submit" class="button" value="Save">
            </div>
            <?php echo form_close();?>
        </div>




        <div class="block">
            <?php echo form_open_multipart(base_url( 'backend/adsense/save' ), array( 'method' => 'POST' ));?>
            <input type="hidden" name="width" value="300">
            <input type="hidden" name="height" value="600">
            <input type="hidden" name="media" value="W">
            <p class="title">300x600 (website)</p>
            <div class="inside-box cf">
                <input type="radio" name="radio_val"
                    <?php if(!empty($edit_data) &&
                        !empty($edit_data['300X600_W']) &&
                        $edit_data['300X600_W']['selected_show_opt']=="C")
                    { echo "checked"; }
                    ?>
                       checked class="radio-button" value="C">

                    <textarea class="code" name="code" rows="10" cols="40"><?php if(!empty($edit_data) &&
                            !empty($edit_data['300X600_W']))
                        { echo $edit_data['300X600_W']['code']; }
                        ?></textarea>
            </div>
            <div class="inside-box cf">
                <input type="radio" name="radio_val"
                    <?php if(!empty($edit_data) &&
                        !empty($edit_data['300X600_W']) &&
                        $edit_data['300X600_W']['selected_show_opt']=="I")
                    { echo "checked"; }
                    ?>
                       class="radio-button" value="I">
                <div class="image-wrap">
                    <input type="file" name="attachment" class="attach-file" size="30">
                    <div class="image"><img src="<?php if(!empty($edit_data) && !empty($edit_data['300X600_W']['img_name'])){ echo base_url()."images/jaherat/".$edit_data['300X600_W']['img_name']; } ?>" alt="" />

                        <?php if(!empty($edit_data) && !empty($edit_data['300X600_W']['img_name'])){ ?>
                            <a onclick="return confirm('Are You Sure You Want To Delete?')" href="<?php echo base_url()."backend/adsense/delete?id=".$edit_data['300X600_W']['id'] ?>" class="delete">DELETE</a>
                        <?php } ?>
                    </div>

                    <div class="input-wrap">
                        <label>Image Link</label>
                        <input value="<?php if(!empty($edit_data) &&
                            !empty($edit_data['300X600_W']))
                        { echo $edit_data['300X600_W']['img_link']; }
                        ?>" name="img_link" class="input-field full-field" type="url">
                    </div>
                </div>
                <input type="submit" class="button" value="Save">
            </div>
            <?php echo form_close();?>
        </div>



        <div class="block">
            <?php echo form_open_multipart(base_url( 'backend/adsense/save' ), array( 'method' => 'POST' ));?>
            <input type="hidden" name="width" value="1350">
            <input type="hidden" name="height" value="400">
            <input type="hidden" name="media" value="A">
            <p class="title">1350x400 (App)</p>
            <div class="inside-box cf">
                <input type="radio" name="radio_val"
                    <?php if(!empty($edit_data) &&
                        !empty($edit_data['1350X400_A']) &&
                        $edit_data['1350X400_A']['selected_show_opt']=="C")
                    { echo "checked"; }
                    ?>
                       checked class="radio-button" value="C">

                    <textarea class="code" name="code" rows="10" cols="40"><?php if(!empty($edit_data) &&
                            !empty($edit_data['1350X400_A']))
                        { echo $edit_data['1350X400_A']['code']; }
                        ?></textarea>
            </div>
            <div class="inside-box cf">
                <input type="radio" name="radio_val"
                    <?php if(!empty($edit_data) &&
                        !empty($edit_data['1350X400_A']) &&
                        $edit_data['1350X400_A']['selected_show_opt']=="I")
                    { echo "checked"; }
                    ?>
                       class="radio-button" value="I">
                <div class="image-wrap">
                    <input type="file" name="attachment" class="attach-file" size="30">
                    <div class="image"><img src="<?php if(!empty($edit_data) && !empty($edit_data['1350X400_A']['img_name'])){ echo base_url()."images/jaherat/".$edit_data['1350X400_A']['img_name']; } ?>" alt="" />

                        <?php if(!empty($edit_data) && !empty($edit_data['1350X400_A']['img_name'])){ ?>
                            <a onclick="return confirm('Are You Sure You Want To Delete?')" href="<?php echo base_url()."backend/adsense/delete?id=".$edit_data['1350X400_A']['id'] ?>" class="delete">DELETE</a>
                        <?php } ?>
                    </div>

                    <div class="input-wrap">
                        <label>Image Link</label>
                        <input value="<?php if(!empty($edit_data) &&
                            !empty($edit_data['1350X400_A']))
                        { echo $edit_data['1350X400_A']['img_link']; }
                        ?>" name="img_link" class="input-field full-field" type="url">
                    </div>
                </div>
                <input type="submit" class="button" value="Save">
            </div>
            <?php echo form_close();?>
        </div>



        <div class="block">
            <?php echo form_open_multipart(base_url( 'backend/adsense/save' ), array( 'method' => 'POST' ));?>
            <input type="hidden" name="width" value="300">
            <input type="hidden" name="height" value="90">
            <input type="hidden" name="media" value="W">
            <p class="title">300X90 (WEBSITE - AMP)</p>
            <div class="inside-box cf">
                <input type="radio" name="radio_val"
                    <?php if(!empty($edit_data) &&
                        !empty($edit_data['300X90_W']) &&
                        $edit_data['300X90_W']['selected_show_opt']=="C")
                    { echo "checked"; }
                    ?>
                       checked class="radio-button" value="C">

                    <textarea class="code" name="code" rows="10" cols="40"><?php if(!empty($edit_data) &&
                            !empty($edit_data['300X90_W']))
                        { echo $edit_data['300X90_W']['code']; }
                        ?></textarea>
            </div>
            <div class="inside-box cf">
                <input type="radio" name="radio_val"
                    <?php if(!empty($edit_data) &&
                        !empty($edit_data['300X90_W']) &&
                        $edit_data['300X90_W']['selected_show_opt']=="I")
                    { echo "checked"; }
                    ?>
                       class="radio-button" value="I">
                <div class="image-wrap">
                    <input type="file" name="attachment" class="attach-file" size="30">
                    <div class="image"><img src="<?php if(!empty($edit_data) && !empty($edit_data['300X90_W']['img_name'])){ echo base_url()."images/jaherat/".$edit_data['300X90_W']['img_name']; } ?>" alt="" />

                        <?php if(!empty($edit_data) && !empty($edit_data['300X90_W']['img_name'])){ ?>
                            <a onclick="return confirm('Are You Sure You Want To Delete?')" href="<?php echo base_url()."backend/adsense/delete?id=".$edit_data['300X90_W']['id'] ?>" class="delete">DELETE</a>
                        <?php } ?>
                    </div>

                    <div class="input-wrap">
                        <label>Image Link</label>
                        <input value="<?php if(!empty($edit_data) &&
                            !empty($edit_data['300X90_W']))
                        { echo $edit_data['300X90_W']['img_link']; }
                        ?>" name="img_link" class="input-field full-field" type="url">
                    </div>
                </div>
                <input type="submit" class="button" value="Save">
            </div>
            <?php echo form_close();?>
        </div>



        <div class="block">
            <?php echo form_open_multipart(base_url( 'backend/adsense/save' ), array( 'method' => 'POST' ));?>
            <input type="hidden" name="width" value="300">
            <input type="hidden" name="height" value="251">
            <input type="hidden" name="media" value="W">
            <p class="title">300X251 (WEBSITE - AMP)</p>
            <div class="inside-box cf">
                <input type="radio" name="radio_val"
                    <?php if(!empty($edit_data) &&
                        !empty($edit_data['300X251_W']) &&
                        $edit_data['300X251_W']['selected_show_opt']=="C")
                    { echo "checked"; }
                    ?>
                       checked class="radio-button" value="C">

                    <textarea class="code" name="code" rows="10" cols="40"><?php if(!empty($edit_data) &&
                            !empty($edit_data['300X251_W']))
                        { echo $edit_data['300X251_W']['code']; }
                        ?></textarea>
            </div>
            <div class="inside-box cf">
                <input type="radio" name="radio_val"
                    <?php if(!empty($edit_data) &&
                        !empty($edit_data['300X251_W']) &&
                        $edit_data['300X251_W']['selected_show_opt']=="I")
                    { echo "checked"; }
                    ?>
                       class="radio-button" value="I">
                <div class="image-wrap">
                    <input type="file" name="attachment" class="attach-file" size="30">
                    <div class="image"><img src="<?php if(!empty($edit_data) && !empty($edit_data['300X251_W']['img_name'])){ echo base_url()."images/jaherat/".$edit_data['300X251_W']['img_name']; } ?>" alt="" />

                        <?php if(!empty($edit_data) && !empty($edit_data['300X251_W']['img_name'])){ ?>
                            <a onclick="return confirm('Are You Sure You Want To Delete?')" href="<?php echo base_url()."backend/adsense/delete?id=".$edit_data['300X251_W']['id'] ?>" class="delete">DELETE</a>
                        <?php } ?>
                    </div>

                    <div class="input-wrap">
                        <label>Image Link</label>
                        <input value="<?php if(!empty($edit_data) &&
                            !empty($edit_data['300X251_W']))
                        { echo $edit_data['300X251_W']['img_link']; }
                        ?>" name="img_link" class="input-field full-field" type="url">
                    </div>
                </div>
                <input type="submit" class="button" value="Save">
            </div>
            <?php echo form_close();?>
        </div>

         <div class="block">
            <?php echo form_open_multipart(base_url( 'backend/adsense/save' ), array( 'method' => 'POST' ));?>
            <input type="hidden" name="width" value="1440">
            <input type="hidden" name="height" value="2560">
            <input type="hidden" name="media" value="A">
            <p class="title">1440X2560 (APP)</p>
            <div class="inside-box cf">
                <input type="radio" name="radio_val"
                    <?php if(!empty($edit_data) &&
                        !empty($edit_data['1440X2560_A']) &&
                        $edit_data['1440X2560_A']['selected_show_opt']=="N")
                    { echo "checked"; }
                    ?>
                        class="radio-button" value="N">

                   NONE
            </div>
             <div class="inside-box cf">
                <input type="radio" name="radio_val"
                    <?php if(!empty($edit_data) &&
                        !empty($edit_data['1440X2560_A']) &&
                        $edit_data['1440X2560_A']['selected_show_opt']=="C")
                    { echo "checked"; }
                    ?>
                        class="radio-button" value="C">

                   Google Adsense
            </div>
            <?php /*<div class="inside-box cf">
                <input type="radio" name="radio_val"
                    <?php if(!empty($edit_data) &&
                        !empty($edit_data['1440X2560_A']) &&
                        $edit_data['1440X2560_A']['selected_show_opt']=="C")
                    { echo "checked"; }
                    ?>
                        class="radio-button" value="C">

                    <textarea class="code" name="code" rows="10" cols="40"><?php if(!empty($edit_data) &&
                            !empty($edit_data['1440X2560_A']))
                        { echo $edit_data['1440X2560_A']['code']; }
                        ?></textarea>
            </div> */ ?>
            <div class="inside-box cf">
                <input type="radio" name="radio_val"
                    <?php if(!empty($edit_data) &&
                        !empty($edit_data['1440X2560_A']) &&
                        $edit_data['1440X2560_A']['selected_show_opt']=="I")
                    { echo "checked"; }
                    ?>
                       class="radio-button" value="I">
                <div class="image-wrap">
                    <input type="file" name="attachment" class="attach-file" size="30">
                    <div class="image"><img src="<?php if(!empty($edit_data) && !empty($edit_data['1440X2560_A']['img_name'])){ echo base_url()."images/jaherat/".$edit_data['1440X2560_A']['img_name']; } ?>" alt="" />

                        <?php if(!empty($edit_data) && !empty($edit_data['1440X2560_A']['img_name'])){ ?>
                            <a onclick="return confirm('Are You Sure You Want To Delete?')" href="<?php echo base_url()."backend/adsense/delete?id=".$edit_data['1440X2560_A']['id'] ?>" class="delete">DELETE</a>
                        <?php } ?>
                    </div>

                    <div class="input-wrap">
                        <label>Image Link</label>
                        <input value="<?php if(!empty($edit_data) &&
                            !empty($edit_data['1440X2560_A']))
                        { echo $edit_data['1440X2560_A']['img_link']; }
                        ?>" name="img_link" class="input-field full-field" type="url">
                    </div>
                </div>
                <input type="submit" class="button" value="Save">
            </div>

            
            <?php echo form_close();?>
        </div>

         <div class="block">
            <?php echo form_open_multipart(base_url( 'backend/adsense/save' ), array( 'method' => 'POST' ));?>
            <input type="hidden" name="width" value="1440">
            <input type="hidden" name="height" value="2561">
            <input type="hidden" name="media" value="A">
            <p class="title">1440X2561 (APP)</p>
             <div class="inside-box cf">
                <input type="radio" name="radio_val"
                    <?php if(!empty($edit_data) &&
                        !empty($edit_data['1440X2561_A']) &&
                        $edit_data['1440X2561_A']['selected_show_opt']=="N")
                    { echo "checked"; }
                    ?>
                        class="radio-button" value="N">

                   NONE
            </div>

             <div class="inside-box cf">
                <input type="radio" name="radio_val"
                    <?php if(!empty($edit_data) &&
                        !empty($edit_data['1440X2561_A']) &&
                        $edit_data['1440X2561_A']['selected_show_opt']=="C")
                    { echo "checked"; }
                    ?>
                        class="radio-button" value="C">

                   Google Adsense
            </div>
            <?php /*
            <div class="inside-box cf">
                <input type="radio" name="radio_val"
                    <?php if(!empty($edit_data) &&
                        !empty($edit_data['1440X2561_A']) &&
                        $edit_data['1440X2561_A']['selected_show_opt']=="C")
                    { echo "checked"; }
                    ?>
                        class="radio-button" value="C">

                    <textarea class="code" name="code" rows="10" cols="40"><?php if(!empty($edit_data) &&
                            !empty($edit_data['1440X2561_A']))
                        { echo $edit_data['1440X2561_A']['code']; }
                        ?></textarea>
            </div> */ ?>
            <div class="inside-box cf">
                <input type="radio" name="radio_val"
                    <?php if(!empty($edit_data) &&
                        !empty($edit_data['1440X2561_A']) &&
                        $edit_data['1440X2561_A']['selected_show_opt']=="I")
                    { echo "checked"; }
                    ?>
                       class="radio-button" value="I">
                <div class="image-wrap">
                    <input type="file" name="attachment" class="attach-file" size="30">
                    <div class="image"><img src="<?php if(!empty($edit_data) && !empty($edit_data['1440X2561_A']['img_name'])){ echo base_url()."images/jaherat/".$edit_data['1440X2561_A']['img_name']; } ?>" alt="" />

                        <?php if(!empty($edit_data) && !empty($edit_data['1440X2561_A']['img_name'])){ ?>
                            <a onclick="return confirm('Are You Sure You Want To Delete?')" href="<?php echo base_url()."backend/adsense/delete?id=".$edit_data['1440X2561_A']['id'] ?>" class="delete">DELETE</a>
                        <?php } ?>
                    </div>

                    <div class="input-wrap">
                        <label>Image Link</label>
                        <input value="<?php if(!empty($edit_data) &&
                            !empty($edit_data['1440X2561_A']))
                        { echo $edit_data['1440X2561_A']['img_link']; }
                        ?>" name="img_link" class="input-field full-field" type="url">
                    </div>
                </div>
                <input type="submit" class="button" value="Save">
            </div>

           
            <?php echo form_close();?>
        </div>


         <div class="block">
            <?php echo form_open_multipart(base_url( 'backend/adsense/save' ), array( 'method' => 'POST' ));?>
            <input type="hidden" name="width" value="1440">
            <input type="hidden" name="height" value="210">
            <input type="hidden" name="media" value="A">
            <p class="title">1440X210 (APP)</p>
             <div class="inside-box cf">
                <input type="radio" name="radio_val"
                    <?php if(!empty($edit_data) &&
                        !empty($edit_data['1440X210_A']) &&
                        $edit_data['1440X210_A']['selected_show_opt']=="N")
                    { echo "checked"; }
                    ?>
                        class="radio-button" value="N">

                   NONE
            </div>

             <div class="inside-box cf">
                <input type="radio" name="radio_val"
                    <?php if(!empty($edit_data) &&
                        !empty($edit_data['1440X210_A']) &&
                        $edit_data['1440X210_A']['selected_show_opt']=="C")
                    { echo "checked"; }
                    ?>
                        class="radio-button" value="C">

                   Google Adsense
            </div>
            <?php /*
            <div class="inside-box cf">
                <input type="radio" name="radio_val"
                    <?php if(!empty($edit_data) &&
                        !empty($edit_data['1440X210_A']) &&
                        $edit_data['1440X210_A']['selected_show_opt']=="C")
                    { echo "checked"; }
                    ?>
                        class="radio-button" value="C">

                    <textarea class="code" name="code" rows="10" cols="40"><?php if(!empty($edit_data) &&
                            !empty($edit_data['1440X210_A']))
                        { echo $edit_data['1440X210_A']['code']; }
                        ?></textarea>
            </div> */ ?>
            <div class="inside-box cf">
                <input type="radio" name="radio_val"
                    <?php if(!empty($edit_data) &&
                        !empty($edit_data['1440X210_A']) &&
                        $edit_data['1440X210_A']['selected_show_opt']=="I")
                    { echo "checked"; }
                    ?>
                       class="radio-button" value="I">
                <div class="image-wrap">
                    <input type="file" name="attachment" class="attach-file" size="30">
                    <div class="image"><img src="<?php if(!empty($edit_data) && !empty($edit_data['1440X210_A']['img_name'])){ echo base_url()."images/jaherat/".$edit_data['1440X210_A']['img_name']; } ?>" alt="" />

                        <?php if(!empty($edit_data) && !empty($edit_data['1440X210_A']['img_name'])){ ?>
                            <a onclick="return confirm('Are You Sure You Want To Delete?')" href="<?php echo base_url()."backend/adsense/delete?id=".$edit_data['1440X210_A']['id'] ?>" class="delete">DELETE</a>
                        <?php } ?>
                    </div>

                    <div class="input-wrap">
                        <label>Image Link</label>
                        <input value="<?php if(!empty($edit_data) &&
                            !empty($edit_data['1440X210_A']))
                        { echo $edit_data['1440X210_A']['img_link']; }
                        ?>" name="img_link" class="input-field full-field" type="url">
                    </div>
                </div>
                <input type="submit" class="button" value="Save">
            </div>

           
            <?php echo form_close();?>
        </div>
    </div>
</div>
