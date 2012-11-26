  <div id="wgt-tab-form-wbfsys_image_variant-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_image_variant_details"
        title="<?php echo $I18N->l('Image Variant','wbfsys.image_variant.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_image_variant-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_image_variant-default" >
          <?php echo $ELEMENT->inputWbfsysImageVariantMimetype;?>

          <?php echo $ELEMENT->inputWbfsysImageVariantFileHash;?>

        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysImageVariantHeight;?>
          <?php echo $ELEMENT->inputWbfsysImageVariantWidth;?>
          <?php echo $ELEMENT->inputWbfsysImageVariantIdImage;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysImageVariantIdFormat;?>
          <?php echo $ELEMENT->inputWbfsysImageVariantFileSize;?>
          <?php echo $ELEMENT->inputWbfsysImageVariantFile;?>
          <?php echo $ELEMENT->inputWbfsysImageVariantIdLicence;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_image_variant-description').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-wbfsys_image_variant-description" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysImageVariantDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_image_variant-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_image_variant-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysImageVariantMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysImageVariantMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysImageVariantRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysImageVariantMUuid;?>
          <?php echo $ELEMENT->inputWbfsysImageVariantMVersion;?>
          <?php echo $ELEMENT->inputWbfsysImageVariantMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysImageVariantMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
