  <div id="wgt-tab-form-wbfsys_protocol_access-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_protocol_access_details"
        title="<?php echo $I18N->l('Protocol Access','wbfsys.protocol_access.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_protocol_access-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_protocol_access-default" >
          <?php echo $ELEMENT->inputWbfsysProtocolAccessVid;?>

          <?php echo $ELEMENT->inputWbfsysProtocolAccessIdVidEntity;?>

        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysProtocolAccessLabel;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysProtocolAccessCounter;?>
          <?php echo $ELEMENT->inputWbfsysProtocolAccessIdMask;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_protocol_access-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_protocol_access-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysProtocolAccessRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysProtocolAccessMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysProtocolAccessMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
