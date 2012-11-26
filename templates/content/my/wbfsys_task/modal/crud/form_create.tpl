  <div id="wgt-tab-form-my_wbfsys_task-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_my_wbfsys_task_details"
        title="<?php echo $I18N->l('My Tasks','my.wbfsys_task.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-my_wbfsys_task-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-my_wbfsys_task-default" >
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
          <span onclick="$S('#wgt-box-my_wbfsys_task-description').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-my_wbfsys_task-description" >
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
          <span onclick="$S('#wgt-box-my_wbfsys_task-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-my_wbfsys_task-meta" style="display:none" >
        <div class="left bw3" >
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



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
