  <div id="wgt-tab-form-wbfsys_audio_variant-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_audio_variant_details"
        title="<?php echo $I18N->l('Audio Variant','wbfsys.audio_variant.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_audio_variant-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_audio_variant-default" >
          <?php echo $ELEMENT->inputWbfsysAudioVariantMimetype;?>

          <?php echo $ELEMENT->inputWbfsysAudioVariantFileHash;?>

        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysAudioVariantFile;?>
          <?php echo $ELEMENT->inputWbfsysAudioVariantIdLang;?>
          <?php echo $ELEMENT->inputWbfsysAudioVariantIdAudio;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysAudioVariantIdAudioCodec;?>
          <?php echo $ELEMENT->inputWbfsysAudioVariantFileSize;?>
          <?php echo $ELEMENT->inputWbfsysAudioVariantIdLicence;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_audio_variant-description').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-wbfsys_audio_variant-description" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysAudioVariantDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_audio_variant-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_audio_variant-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysAudioVariantMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysAudioVariantMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysAudioVariantRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysAudioVariantMUuid;?>
          <?php echo $ELEMENT->inputWbfsysAudioVariantMVersion;?>
          <?php echo $ELEMENT->inputWbfsysAudioVariantMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysAudioVariantMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
