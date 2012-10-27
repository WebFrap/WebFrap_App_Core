
  <!-- elements are assigned via class asgd-<?php echo $VAR->formId?> -->
  <form
    method="post"
    accept-charset="utf-8"
    class="<?php echo $VAR->formClass?>"
    id="<?php echo $VAR->formId?>"
    action="<?php echo $VAR->formAction?>" ></form>

  <div 
    id="<?php echo $this->id?>" 
    style="position:relative;height:100%;overflow-y:hidden;" 
    class="wcm wcm_ui_accordion_tab"  >
    
    <!-- Accordion Head -->
    <div style="position:absolute;width:200px;height:100%;top:0px:bottom:0px;"   >
    
      <div id="<?php echo $this->id?>-head" style="height:600px;" >
          
        <h3><a tab="details" ><?php echo $I18N->l('Issue','wbfsys.issue.label')?></a></h3>
        <div>
                
<p>The dashed fields marked with an asterisk in the label are mandatory.<br />
You will not be able to save any data until you have provided all required information.</p>

<p>Be aware that you first have to create a new Issue by clicking on "Create"
before you can add references to other data or assign user / roles.</p>

      
<p>You will, by default, be assigned to the new Issue as "Owner".</p>


<label class="hint" >Hint:</label>
<p class="hint" >If you made changes don't forget to save before closing the tab, or else your work will be lost.</p>
      
        </div>
        
        
        
      </div>
    </div>
    
    <div 
      id="<?php echo $this->id?>-content" 
      style="position:absolute;left:200px;right:0px;top:0px;bottom:0px;height:100%;overflow:hidden;overflow-y:auto;"  >
  
      <div class="container" id="<?php echo $this->id?>-content-details" >
        
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
      
      
      
    </div>
    
  </div>

<div class="wgt-clear xxsmall">&nbsp;</div>
