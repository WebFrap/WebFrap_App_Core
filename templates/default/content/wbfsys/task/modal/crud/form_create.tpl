  <div id="wgt-tab-form-wbfsys_task-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_task_details"
        title="<?php echo $I18N->l('Task','wbfsys.task.label')?>"  >
        
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
        <div class="left bw3" >
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



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
