  <div id="wgt-tab-form-wbfsys_issue_severity-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_issue_severity_details"
        title="<?php echo $I18N->l('issue severity','wbfsys.issue_severity.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_issue_severity-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_issue_severity-default" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysIssueSeverityName;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysIssueSeverityAccessKey;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_issue_severity-description').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-wbfsys_issue_severity-description" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysIssueSeverityDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_issue_severity-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_issue_severity-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysIssueSeverityMOrder;?>
          <?php echo $ELEMENT->inputWbfsysIssueSeverityMUuid;?>
          <?php echo $ELEMENT->inputWbfsysIssueSeverityMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysIssueSeverityMRoleCreate;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysIssueSeverityMVersion;?>
          <?php echo $ELEMENT->inputWbfsysIssueSeverityMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysIssueSeverityMTimeCreated;?>
          <?php echo $ELEMENT->inputWbfsysIssueSeverityRowid;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
