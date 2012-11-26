  <div id="wgt-tab-form-wbfsys_announcement-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_announcement_details"
        title="<?php echo $I18N->l('Announcement','wbfsys.announcement.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_announcement-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_announcement-default" >
          <?php echo $ELEMENT->inputWbfsysAnnouncementVid;?>

          <?php echo $ELEMENT->inputWbfsysAnnouncementIdVidEntity;?>

        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysAnnouncementTitle;?>
        </div>
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysAnnouncementDateStart;?>
          <?php echo $ELEMENT->inputWbfsysAnnouncementIdProcessStatus;?>
          <?php echo $ELEMENT->inputWbfsysAnnouncementIdType;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysAnnouncementImportance;?>
          <?php echo $ELEMENT->inputWbfsysAnnouncementIdChannel;?>
          <?php echo $ELEMENT->inputWbfsysAnnouncementIdUser;?>
          <?php echo $ELEMENT->inputWbfsysAnnouncementDateEnd;?>
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysAnnouncementMessage;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_announcement-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_announcement-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysAnnouncementMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysAnnouncementMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysAnnouncementRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysAnnouncementMUuid;?>
          <?php echo $ELEMENT->inputWbfsysAnnouncementMVersion;?>
          <?php echo $ELEMENT->inputWbfsysAnnouncementMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysAnnouncementMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
