  <div id="wgt-tab-form-wbfsys_protocol_usage-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_protocol_usage_details"
        title="<?php echo $I18N->l('Protocol Usage','wbfsys.protocol_usage.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_protocol_usage-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_protocol_usage-default" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysProtocolUsageIpAddress;?>
          <?php echo $ELEMENT->inputWbfsysProtocolUsageIdMainLanguage;?>
          <?php echo $ELEMENT->inputWbfsysProtocolUsageIdBrowser;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysProtocolUsageFlagSso;?>
          <?php echo $ELEMENT->inputWbfsysProtocolUsageIdOs;?>
          <?php echo $ELEMENT->inputWbfsysProtocolUsageIdBrowserVersion;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_protocol_usage-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_protocol_usage-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysProtocolUsageRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysProtocolUsageMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysProtocolUsageMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
