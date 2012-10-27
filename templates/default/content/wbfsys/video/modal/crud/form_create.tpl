  <div id="wgt-tab-form-wbfsys_video-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_video_details"
        title="<?php echo $I18N->l('Video','wbfsys.video.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_video-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_video-default" >
          <?php echo $ELEMENT->inputWbfsysVideoMimetype;?>

          <?php echo $ELEMENT->inputWbfsysVideoFileHash;?>

        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysVideoTitle;?>
        </div>
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysVideoAccessKey;?>
          <?php echo $ELEMENT->inputWbfsysVideoFile;?>
          <?php echo $ELEMENT->inputWbfsysVideoIdLang;?>
          <?php echo $ELEMENT->inputWbfsysVideoLength;?>
          <?php echo $ELEMENT->inputWbfsysVideoHeight;?>
          <?php echo $ELEMENT->inputWbfsysVideoIdConfidentiality;?>
          <?php echo $ELEMENT->inputWbfsysVideoIdVideoCodec;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysVideoFlagSound;?>
          <?php echo $ELEMENT->inputWbfsysVideoFileSize;?>
          <?php echo $ELEMENT->inputWbfsysVideoFlagColor;?>
          <?php echo $ELEMENT->inputWbfsysVideoWidth;?>
          <?php echo $ELEMENT->inputWbfsysVideoIdLicence;?>
          <?php echo $ELEMENT->inputWbfsysVideoIdMediathek;?>
          <?php echo $ELEMENT->inputWbfsysVideoIdAudioCodec;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_video-description').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-wbfsys_video-description" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysVideoDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_video-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_video-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysVideoMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysVideoMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysVideoRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysVideoMUuid;?>
          <?php echo $ELEMENT->inputWbfsysVideoMVersion;?>
          <?php echo $ELEMENT->inputWbfsysVideoMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysVideoMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
