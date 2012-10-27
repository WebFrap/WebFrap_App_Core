  <div id="wgt-tab-form-wbfsys_image-create" class="wcm wcm_ui_tab" >
    <div class="wgt_tab_body" >

    <!-- elements are assigned via class asgd-<?php echo $VAR->formId?> -->
    <form
      method="post"
      accept-charset="utf-8"
      class="<?php echo $VAR->formClass?>"
      id="<?php echo $VAR->formId?>"
      action="<?php echo $VAR->formAction?>" ></form>

      <!-- Tab Details -->
      <div  
        id="<?php echo $this->id?>_tab_wbfsys_image_details"
        title="<?php echo $I18N->l('Image','wbfsys.image.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_image-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_image-default" >
          <?php echo $ELEMENT->inputWbfsysImageMimetype;?>

          <?php echo $ELEMENT->inputWbfsysImageFileHash;?>

        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysImageTitle;?>
        </div>
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysImageAccessKey;?>
          <?php echo $ELEMENT->inputWbfsysImageIdFormat;?>
          <?php echo $ELEMENT->inputWbfsysImageFlagColor;?>
          <?php echo $ELEMENT->inputWbfsysImageHeight;?>
          <?php echo $ELEMENT->inputWbfsysImageIdLicence;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysImageFile;?>
          <?php echo $ELEMENT->inputWbfsysImageFileSize;?>
          <?php echo $ELEMENT->inputWbfsysImageWidth;?>
          <?php echo $ELEMENT->inputWbfsysImageIdConfidentiality;?>
          <?php echo $ELEMENT->inputWbfsysImageColorModel;?>
          <?php echo $ELEMENT->inputWbfsysImageIdMediathek;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_image-description').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-wbfsys_image-description" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysImageDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_image-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_image-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysImageMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysImageMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysImageRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysImageMUuid;?>
          <?php echo $ELEMENT->inputWbfsysImageMVersion;?>
          <?php echo $ELEMENT->inputWbfsysImageMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysImageMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
