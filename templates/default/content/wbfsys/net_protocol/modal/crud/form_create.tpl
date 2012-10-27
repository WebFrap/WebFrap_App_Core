  <div id="wgt-tab-form-wbfsys_net_protocol-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_net_protocol_details"
        title="<?php echo $I18N->l('Network Protocol','wbfsys.net_protocol.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_net_protocol-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_net_protocol-default" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysNetProtocolName;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysNetProtocolAccessKey;?>
          <?php echo $ELEMENT->inputWbfsysNetProtocolFlagEncrypted;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_net_protocol-description').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-wbfsys_net_protocol-description" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysNetProtocolDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_net_protocol-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_net_protocol-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysNetProtocolMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysNetProtocolMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysNetProtocolRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysNetProtocolMUuid;?>
          <?php echo $ELEMENT->inputWbfsysNetProtocolMVersion;?>
          <?php echo $ELEMENT->inputWbfsysNetProtocolMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysNetProtocolMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
