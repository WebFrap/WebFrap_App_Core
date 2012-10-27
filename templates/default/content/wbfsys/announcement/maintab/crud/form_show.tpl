
  <!-- elements are assigned via class asgd-<?php echo $VAR->formId?> -->
  <form
    method="post"
    accept-charset="utf-8"
    class="<?php echo $VAR->formClass?>"
    id="<?php echo $VAR->formId?>"
    action="<?php echo $VAR->formAction?>" ></form>

  <div 
    id="<?php echo $this->id?>" 
    style="position:relative;height:100%;overflow-y:hidden;" 
    class="wcm wcm_ui_accordion_tab"  >
    
    <!-- Accordion Head -->
    <div style="position:absolute;width:200px;height:100%;top:0px:bottom:0px;"   >
    
      <div id="<?php echo $this->id?>-head" style="height:600px;" >
          
        <h3><a tab="details" ><?php echo $I18N->l('Announcement','wbfsys.announcement.label')?></a></h3>
        <div>
          
<p>This is a read only view of the Announcement base and related data.
To edit the dataset change into the edit mode.</p>

<label class="hint" >Hint:</label> 
<p class="hint" >If the edit mode button is not visible you do not have the edit rights for this Announcement.
Should you feel that you should have edit rights, please contact the system admin.</p>
      
        </div>
        
        
    <?php if(
      Webfrap::classLoadable('WbfsysEntityAttachment_Entity')
        && Webfrap::classLoadable('WbfsysFile_Entity')
        && $VAR->showTabAttachments
    ){
    ?>

    <!-- tab: attachments in management: WbfsysFile manytomany -->
    <h3>
      <a
        tab="attachments"
        wgt_src="ajax.php?c=Wbfsys.Announcement_Ref_Attachments.tab&amp;objid=<?php
            echo $VAR->entityWbfsysAnnouncement->getId();
          ?>&tabid=<?php
            echo $this->id;
          ?>-content-attachments&a_root=<?php
            echo $VAR->params->aclRoot;
          ?>&m_root=<?php
            echo $VAR->params->maskRoot;
          ?>&a_root_id=<?php
            echo $VAR->params->aclRootId;
          ?>&a_key=<?php
            echo $VAR->params->aclNode;
          ?>&a_level=<?php
            echo (1+$VAR->params->aclLevel);
          ?>&a_node=mgmt-wbfsys_announcement-ref-attachments" ><?php echo $I18N->l('Attachments','wbfsys.announcement.label.tab_attachments')?></a>
    </h3>
    <div>
      
<label>Files</label>
<p>Here you can assign Files to the currently selected Announcement.</p>
<p>To do so click on "Append new File", search for the designated File
and append it by clicking on the "connect" Action in the list entry menu.</p>
      
    </div>

    <?php } ?>

    <?php if(
      Webfrap::classLoadable('WbfsysUserAnnouncement_Entity')
        && Webfrap::classLoadable('WbfsysRoleUser_Entity')
        && $VAR->showTabStatus
    ){
    ?>

    <!-- tab: status in management: WbfsysRoleUser manytomany -->
    <h3>
      <a
        tab="status"
        wgt_src="ajax.php?c=Wbfsys.Announcement_Ref_Status.tab&amp;objid=<?php
            echo $VAR->entityWbfsysAnnouncement->getId();
          ?>&tabid=<?php
            echo $this->id;
          ?>-content-status&a_root=<?php
            echo $VAR->params->aclRoot;
          ?>&m_root=<?php
            echo $VAR->params->maskRoot;
          ?>&a_root_id=<?php
            echo $VAR->params->aclRootId;
          ?>&a_key=<?php
            echo $VAR->params->aclNode;
          ?>&a_level=<?php
            echo (1+$VAR->params->aclLevel);
          ?>&a_node=mgmt-wbfsys_announcement-ref-status" ><?php echo $I18N->l('User Status','wbfsys.announcement.label.tab_status')?></a>
    </h3>
    <div>
      
<label>System Users</label>
<p>Here you can assign System Users to the currently selected Announcement.</p>
<p>To do so click on "Append new System User", search for the designated System User
and append it by clicking on the "connect" Action in the list entry menu.</p>
      
    </div>

    <?php } ?>

        
      </div>
    </div>
    
    <div 
      id="<?php echo $this->id?>-content" 
      style="position:absolute;left:200px;right:0px;top:0px;bottom:0px;height:100%;overflow:hidden;overflow-y:auto;"  >
  
      <div class="container" id="<?php echo $this->id?>-content-details" >
        
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
<div class="full" >
  Link: <strong><?php echo $this->getServerAddress() ?>maintab.php?c=Wbfsys.Announcement.edit&amp;objid=<?php echo $VAR->entity ?></strong>
</div>        <div class="left bw3" >
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
      
      
      <div class="container" id="<?php echo $this->id?>-content-attachments" ></div>

      <div class="container" id="<?php echo $this->id?>-content-status" ></div>

      
    </div>
    
  </div>

<div class="wgt-clear xxsmall">&nbsp;</div>
