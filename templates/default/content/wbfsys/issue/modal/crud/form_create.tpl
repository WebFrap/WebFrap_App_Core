  <div id="wgt-tab-form-wbfsys_issue-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_issue_details"
        title="<?php echo $I18N->l('Issue','wbfsys.issue.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_issue-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_issue-default" >
          <?php echo $ELEMENT->inputWbfsysIssueVid;?>

          <?php echo $ELEMENT->inputWbfsysIssueIdVidEntity;?>

        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysIssueTitle;?>
        </div>
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysIssueIdOs;?>
          <?php echo $ELEMENT->inputWbfsysIssueIdSeverity;?>
          <?php echo $ELEMENT->inputWbfsysIssueIdType;?>
          <?php echo $ELEMENT->inputWbfsysIssueProgress;?>
          <?php echo $ELEMENT->inputWbfsysIssueIdResponsible;?>
          <?php echo $ELEMENT->inputWbfsysIssueIdFinishRevision;?>
          <?php echo $ELEMENT->inputWbfsysIssueIdRevision;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysIssueIdBrowser;?>
          <?php echo $ELEMENT->inputWbfsysIssueIdPriority;?>
          <?php echo $ELEMENT->inputWbfsysIssueIdCategory;?>
          <?php echo $ELEMENT->inputWbfsysIssueFinishTill;?>
          <?php echo $ELEMENT->inputWbfsysIssueFlagHidden;?>
          <?php echo $ELEMENT->inputWbfsysIssueIdStatus;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_issue-description').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-wbfsys_issue-description" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysIssueErrorMessage;?>
          <?php echo $ELEMENT->inputWbfsysIssueDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_issue-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_issue-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysIssueMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysIssueMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysIssueRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysIssueMUuid;?>
          <?php echo $ELEMENT->inputWbfsysIssueMVersion;?>
          <?php echo $ELEMENT->inputWbfsysIssueMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysIssueMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
