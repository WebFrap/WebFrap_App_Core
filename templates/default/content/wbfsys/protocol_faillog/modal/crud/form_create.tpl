  <div id="wgt-tab-form-wbfsys_protocol_faillog-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_protocol_faillog_details"
        title="<?php echo $I18N->l('Protocol Faillog','wbfsys.protocol_faillog.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_protocol_faillog-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_protocol_faillog-default" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysProtocolFaillogUserName;?>
          <?php echo $ELEMENT->inputWbfsysProtocolFaillogUserAgent;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysProtocolFaillogCustomData;?>
          <?php echo $ELEMENT->inputWbfsysProtocolFaillogIpAddress;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_protocol_faillog-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_protocol_faillog-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysProtocolFaillogRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysProtocolFaillogMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysProtocolFaillogMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
