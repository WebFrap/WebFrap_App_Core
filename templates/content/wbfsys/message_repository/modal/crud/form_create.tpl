  <div id="wgt-tab-form-wbfsys_message_repository-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_message_repository_details"
        title="<?php echo $I18N->l('Message Repository','wbfsys.message_repository.label')?>"  >
        
      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_message_repository-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_message_repository-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysMessageRepositoryMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysMessageRepositoryMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysMessageRepositoryRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysMessageRepositoryMUuid;?>
          <?php echo $ELEMENT->inputWbfsysMessageRepositoryMVersion;?>
          <?php echo $ELEMENT->inputWbfsysMessageRepositoryMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysMessageRepositoryMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
