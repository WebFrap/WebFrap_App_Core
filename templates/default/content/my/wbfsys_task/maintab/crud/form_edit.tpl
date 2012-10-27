
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
          
        <h3><a tab="details" ><?php echo $I18N->l('My Tasks','my.wbfsys_task.label')?></a></h3>
        <div>
          
<p>The dashed fields marked with an asterisk in the label are mandatory.<br />
You will not be able to save any data until you have provided all required information.</p>

<label class="hint" >Hint:</label>
<p class="hint" >If you made changes don't forget to save before closing the tab, or else your work will be lost.</p>
      
        </div>
        
        
    <?php if(
      Webfrap::classLoadable('WbfsysEntityComment_Entity')
        && Webfrap::classLoadable('WbfsysComment_Entity')
        && $VAR->showTabComments
    ){
    ?>

    <!-- tab: comments in management: WbfsysComment manytomany -->
    <h3>
      <a
        tab="comments"
        wgt_src="ajax.php?c=My.WbfsysTask_Ref_Comments.tab&amp;objid=<?php
            echo $VAR->entityMyWbfsysTask->getId();
          ?>&tabid=<?php
            echo $this->id;
          ?>-content-comments&a_root=<?php
            echo $VAR->params->aclRoot;
          ?>&m_root=<?php
            echo $VAR->params->maskRoot;
          ?>&a_root_id=<?php
            echo $VAR->params->aclRootId;
          ?>&a_key=<?php
            echo $VAR->params->aclNode;
          ?>&a_level=<?php
            echo (1+$VAR->params->aclLevel);
          ?>&a_node=mgmt-my_wbfsys_task-ref-comments" ><?php echo $I18N->l('Comments','my.wbfsys_task.label.tab_comments')?></a>
    </h3>
    <div>
      
<label>Comments</label>
<p>Here you can assign Comments to the currently selected My Tasks.</p>
<p>To do so click on "Append new Comment", search for the designated Comment
and append it by clicking on the "connect" Action in the list entry menu.</p>
      
    </div>

    <?php } ?>

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
        wgt_src="ajax.php?c=My.WbfsysTask_Ref_Attachments.tab&amp;objid=<?php
            echo $VAR->entityMyWbfsysTask->getId();
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
          ?>&a_node=mgmt-my_wbfsys_task-ref-attachments" ><?php echo $I18N->l('Attachements','my.wbfsys_task.label.tab_attachments')?></a>
    </h3>
    <div>
      
<label>Files</label>
<p>Here you can assign Files to the currently selected My Tasks.</p>
<p>To do so click on "Append new File", search for the designated File
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
          <span onclick="$S('#wgt-box-my_wbfsys_task-default-<?php echo $VAR->entityMyWbfsysTask; ?>').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-my_wbfsys_task-default-<?php echo $VAR->entityMyWbfsysTask; ?>" >
          <?php echo $ELEMENT->inputMyWbfsysTaskVid;?>

          <?php echo $ELEMENT->inputMyWbfsysTaskIdVidEntity;?>

        <div class="full" >
          <?php echo $ELEMENT->inputMyWbfsysTaskTitle;?>
        </div>
        <div class="left bw3" >
          <?php echo $ELEMENT->inputMyWbfsysTaskPriority;?>
          <?php echo $ELEMENT->inputMyWbfsysTaskMParent;?>
          <?php echo $ELEMENT->inputMyWbfsysTaskIdType;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputMyWbfsysTaskHttpUrl;?>
          <?php echo $ELEMENT->inputMyWbfsysTaskIdStatus;?>
          <?php echo $ELEMENT->inputMyWbfsysTaskProgress;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-my_wbfsys_task-description-<?php echo $VAR->entityMyWbfsysTask; ?>').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-my_wbfsys_task-description-<?php echo $VAR->entityMyWbfsysTask; ?>" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputMyWbfsysTaskDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-my_wbfsys_task-meta-<?php echo $VAR->entityMyWbfsysTask; ?>').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-my_wbfsys_task-meta-<?php echo $VAR->entityMyWbfsysTask; ?>" style="display:none" >
<div class="full" >
  Link: <strong><?php echo $this->getServerAddress() ?>maintab.php?c=My.WbfsysTask.edit&amp;objid=<?php echo $VAR->entity ?></strong>
</div>        <div class="left bw3" >
          <?php echo $ELEMENT->inputMyWbfsysTaskMRoleChange;?>
          <?php echo $ELEMENT->inputMyWbfsysTaskMTimeChanged;?>
          <?php echo $ELEMENT->inputMyWbfsysTaskRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputMyWbfsysTaskMUuid;?>
          <?php echo $ELEMENT->inputMyWbfsysTaskMVersion;?>
          <?php echo $ELEMENT->inputMyWbfsysTaskMRoleCreate;?>
          <?php echo $ELEMENT->inputMyWbfsysTaskMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>
      
      
      <div class="container" id="<?php echo $this->id?>-content-comments" ></div>

      <div class="container" id="<?php echo $this->id?>-content-attachments" ></div>

      
    </div>
    
  </div>

<div class="wgt-clear xxsmall">&nbsp;</div>
