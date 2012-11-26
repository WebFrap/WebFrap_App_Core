  <div id="wgt-tab-form-wbfsys_audio_usage-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_audio_usage_details"
        title="<?php echo $I18N->l('Audio Usage','wbfsys.audio_usage.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_audio_usage-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_audio_usage-default" >
          <?php echo $ELEMENT->inputWbfsysAudioUsageVid;?>

          <?php echo $ELEMENT->inputWbfsysAudioUsageIdVidEntity;?>

        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysAudioUsageIdAudio;?>
        </div>
        <div class="inline bw3" >
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_audio_usage-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_audio_usage-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysAudioUsageMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysAudioUsageMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysAudioUsageRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysAudioUsageMUuid;?>
          <?php echo $ELEMENT->inputWbfsysAudioUsageMVersion;?>
          <?php echo $ELEMENT->inputWbfsysAudioUsageMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysAudioUsageMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
