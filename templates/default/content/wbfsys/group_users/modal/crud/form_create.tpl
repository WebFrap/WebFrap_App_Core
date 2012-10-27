  <div id="wgt-tab-form-wbfsys_group_users-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_group_users_details"
        title="<?php echo $I18N->l('Group Users','wbfsys.group_users.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_group_users-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_group_users-default" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysGroupUsersPartial;?>
          <?php echo $ELEMENT->inputWbfsysGroupUsersIdUser;?>
          <?php echo $ELEMENT->inputWbfsysGroupUsersIdentKey;?>
          <?php echo $ELEMENT->inputWbfsysGroupUsersDateEnd;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysGroupUsersVid;?>
          <?php echo $ELEMENT->inputWbfsysGroupUsersIdArea;?>
          <?php echo $ELEMENT->inputWbfsysGroupUsersIdGroup;?>
          <?php echo $ELEMENT->inputWbfsysGroupUsersDateStart;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_group_users-description').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-wbfsys_group_users-description" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysGroupUsersDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_group_users-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_group_users-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysGroupUsersMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysGroupUsersMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysGroupUsersRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysGroupUsersMUuid;?>
          <?php echo $ELEMENT->inputWbfsysGroupUsersMVersion;?>
          <?php echo $ELEMENT->inputWbfsysGroupUsersMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysGroupUsersMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
