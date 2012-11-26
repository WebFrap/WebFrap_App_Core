  <div id="wgt-tab-form-wbfsys_audio-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_audio_details"
        title="<?php echo $I18N->l('Audio','wbfsys.audio.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_audio-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_audio-default" >
          <?php echo $ELEMENT->inputWbfsysAudioMimetype;?>

          <?php echo $ELEMENT->inputWbfsysAudioFileHash;?>

        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysAudioTitle;?>
        </div>
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysAudioAccessKey;?>
          <?php echo $ELEMENT->inputWbfsysAudioFileSize;?>
          <?php echo $ELEMENT->inputWbfsysAudioIdLang;?>
          <?php echo $ELEMENT->inputWbfsysAudioLength;?>
          <?php echo $ELEMENT->inputWbfsysAudioIdMediathek;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysAudioFile;?>
          <?php echo $ELEMENT->inputWbfsysAudioIdConfidentiality;?>
          <?php echo $ELEMENT->inputWbfsysAudioIdLicence;?>
          <?php echo $ELEMENT->inputWbfsysAudioIdCodec;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_audio-description').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-wbfsys_audio-description" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysAudioDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_audio-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_audio-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysAudioMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysAudioMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysAudioRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysAudioMUuid;?>
          <?php echo $ELEMENT->inputWbfsysAudioMVersion;?>
          <?php echo $ELEMENT->inputWbfsysAudioMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysAudioMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
