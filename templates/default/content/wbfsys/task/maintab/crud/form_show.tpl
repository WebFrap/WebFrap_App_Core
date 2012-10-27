
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
          
        <h3><a tab="details" ><?php echo $I18N->l('Task','wbfsys.task.label')?></a></h3>
        <div>
          
<p>This is a read only view of the Task base and related data.
To edit the dataset change into the edit mode.</p>

<label class="hint" >Hint:</label> 
<p class="hint" >If the edit mode button is not visible you do not have the edit rights for this Task.
Should you feel that you should have edit rights, please contact the system admin.</p>
      
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
        wgt_src="ajax.php?c=Wbfsys.Task_Ref_Comments.tab&amp;objid=<?php
            echo $VAR->entityWbfsysTask->getId();
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
          ?>&a_node=mgmt-wbfsys_task-ref-comments" ><?php echo $I18N->l('Comments','wbfsys.task.label.tab_comments')?></a>
    </h3>
    <div>
      
<label>Comments</label>
<p>Here you can assign Comments to the currently selected Task.</p>
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
        wgt_src="ajax.php?c=Wbfsys.Task_Ref_Attachments.tab&amp;objid=<?php
            echo $VAR->entityWbfsysTask->getId();
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
          ?>&a_node=mgmt-wbfsys_task-ref-attachments" ><?php echo $I18N->l('Attachements','wbfsys.task.label.tab_attachments')?></a>
    </h3>
    <div>
      
<label>Files</label>
<p>Here you can assign Files to the currently selected Task.</p>
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
          <span onclick="$S('#wgt-box-wbfsys_task-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_task-default" >
          <?php echo $ELEMENT->inputWbfsysTaskVid;?>

          <?php echo $ELEMENT->inputWbfsysTaskIdVidEntity;?>

        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysTaskTitle;?>
        </div>
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysTaskPriority;?>
          <?php echo $ELEMENT->inputWbfsysTaskMParent;?>
          <?php echo $ELEMENT->inputWbfsysTaskIdType;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysTaskHttpUrl;?>
          <?php echo $ELEMENT->inputWbfsysTaskIdStatus;?>
          <?php echo $ELEMENT->inputWbfsysTaskProgress;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_task-description').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-wbfsys_task-description" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysTaskDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_task-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_task-meta" style="display:none" >
<div class="full" >
  Link: <strong><?php echo $this->getServerAddress() ?>maintab.php?c=Wbfsys.Task.edit&amp;objid=<?php echo $VAR->entity ?></strong>
</div>        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysTaskMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysTaskMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysTaskRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysTaskMUuid;?>
          <?php echo $ELEMENT->inputWbfsysTaskMVersion;?>
          <?php echo $ELEMENT->inputWbfsysTaskMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysTaskMTimeCreated;?>
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
