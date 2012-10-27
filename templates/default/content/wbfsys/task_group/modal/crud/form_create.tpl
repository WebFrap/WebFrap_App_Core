  <div id="wgt-tab-form-wbfsys_task_group-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_task_group_details"
        title="<?php echo $I18N->l('Task Group','wbfsys.task_group.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_task_group-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_task_group-default" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysTaskGroupIdResponsible;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysTaskGroupIdTask;?>
          <?php echo $ELEMENT->inputWbfsysTaskGroupIdGroup;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_task_group-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_task_group-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysTaskGroupMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysTaskGroupMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysTaskGroupRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysTaskGroupMUuid;?>
          <?php echo $ELEMENT->inputWbfsysTaskGroupMVersion;?>
          <?php echo $ELEMENT->inputWbfsysTaskGroupMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysTaskGroupMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
