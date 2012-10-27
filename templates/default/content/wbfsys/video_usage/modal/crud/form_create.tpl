  <div id="wgt-tab-form-wbfsys_video_usage-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_video_usage_details"
        title="<?php echo $I18N->l('Video Usage','wbfsys.video_usage.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_video_usage-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_video_usage-default" >
          <?php echo $ELEMENT->inputWbfsysVideoUsageVid;?>

          <?php echo $ELEMENT->inputWbfsysVideoUsageIdVidEntity;?>

        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysVideoUsageIdVideo;?>
        </div>
        <div class="inline bw3" >
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_video_usage-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_video_usage-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysVideoUsageMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysVideoUsageMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysVideoUsageRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysVideoUsageMUuid;?>
          <?php echo $ELEMENT->inputWbfsysVideoUsageMVersion;?>
          <?php echo $ELEMENT->inputWbfsysVideoUsageMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysVideoUsageMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
