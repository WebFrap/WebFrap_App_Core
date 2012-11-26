  <div id="wgt-tab-form-wbfsys_user_announcement_status-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_user_announcement_status_details"
        title="<?php echo $I18N->l('user announcement Status','wbfsys.user_announcement_status.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_user_announcement_status-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_user_announcement_status-default" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysUserAnnouncementStatusName;?>
          <?php echo $ELEMENT->inputWbfsysUserAnnouncementStatusAccessKey;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_user_announcement_status-description').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-wbfsys_user_announcement_status-description" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysUserAnnouncementStatusDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_user_announcement_status-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_user_announcement_status-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysUserAnnouncementStatusMOrder;?>
          <?php echo $ELEMENT->inputWbfsysUserAnnouncementStatusMUuid;?>
          <?php echo $ELEMENT->inputWbfsysUserAnnouncementStatusMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysUserAnnouncementStatusMRoleCreate;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysUserAnnouncementStatusMVersion;?>
          <?php echo $ELEMENT->inputWbfsysUserAnnouncementStatusMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysUserAnnouncementStatusMTimeCreated;?>
          <?php echo $ELEMENT->inputWbfsysUserAnnouncementStatusRowid;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
