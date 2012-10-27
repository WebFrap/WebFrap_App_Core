  <div id="wgt-tab-form-wbfsys_video_variant-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_video_variant_details"
        title="<?php echo $I18N->l('Video Variant','wbfsys.video_variant.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_video_variant-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_video_variant-default" >
          <?php echo $ELEMENT->inputWbfsysVideoVariantMimetype;?>

          <?php echo $ELEMENT->inputWbfsysVideoVariantFileHash;?>

        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysVideoVariantFileSize;?>
          <?php echo $ELEMENT->inputWbfsysVideoVariantFile;?>
          <?php echo $ELEMENT->inputWbfsysVideoVariantWidth;?>
          <?php echo $ELEMENT->inputWbfsysVideoVariantIdLicence;?>
          <?php echo $ELEMENT->inputWbfsysVideoVariantIdVideo;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysVideoVariantIdAudioCodec;?>
          <?php echo $ELEMENT->inputWbfsysVideoVariantIdVideoCodec;?>
          <?php echo $ELEMENT->inputWbfsysVideoVariantIdLang;?>
          <?php echo $ELEMENT->inputWbfsysVideoVariantHeight;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_video_variant-description').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-wbfsys_video_variant-description" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysVideoVariantDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_video_variant-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_video_variant-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysVideoVariantMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysVideoVariantMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysVideoVariantRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysVideoVariantMUuid;?>
          <?php echo $ELEMENT->inputWbfsysVideoVariantMVersion;?>
          <?php echo $ELEMENT->inputWbfsysVideoVariantMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysVideoVariantMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
