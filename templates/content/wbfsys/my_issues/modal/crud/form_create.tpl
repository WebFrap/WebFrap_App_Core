  <div id="wgt-tab-form-wbfsys_my_issues-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_my_issues_details"
        title="<?php echo $I18N->l('My Issues','wbfsys.my_issues.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_my_issues-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_my_issues-default" >
          <?php echo $ELEMENT->inputWbfsysMyIssuesVid;?>

          <?php echo $ELEMENT->inputWbfsysMyIssuesIdVidEntity;?>

        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysMyIssuesTitle;?>
        </div>
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysMyIssuesIdOs;?>
          <?php echo $ELEMENT->inputWbfsysMyIssuesIdSeverity;?>
          <?php echo $ELEMENT->inputWbfsysMyIssuesIdType;?>
          <?php echo $ELEMENT->inputWbfsysMyIssuesProgress;?>
          <?php echo $ELEMENT->inputWbfsysMyIssuesIdResponsible;?>
          <?php echo $ELEMENT->inputWbfsysMyIssuesIdFinishRevision;?>
          <?php echo $ELEMENT->inputWbfsysMyIssuesIdRevision;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysMyIssuesIdBrowser;?>
          <?php echo $ELEMENT->inputWbfsysMyIssuesIdPriority;?>
          <?php echo $ELEMENT->inputWbfsysMyIssuesIdCategory;?>
          <?php echo $ELEMENT->inputWbfsysMyIssuesFinishTill;?>
          <?php echo $ELEMENT->inputWbfsysMyIssuesFlagHidden;?>
          <?php echo $ELEMENT->inputWbfsysMyIssuesIdStatus;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_my_issues-description').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-wbfsys_my_issues-description" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysMyIssuesErrorMessage;?>
          <?php echo $ELEMENT->inputWbfsysMyIssuesDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_my_issues-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_my_issues-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysMyIssuesMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysMyIssuesMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysMyIssuesRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysMyIssuesMUuid;?>
          <?php echo $ELEMENT->inputWbfsysMyIssuesMVersion;?>
          <?php echo $ELEMENT->inputWbfsysMyIssuesMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysMyIssuesMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
