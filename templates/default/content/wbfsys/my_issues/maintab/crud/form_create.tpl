
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
          
        <h3><a tab="details" ><?php echo $I18N->l('My Issues','wbfsys.my_issues.label')?></a></h3>
        <div>
                
<p>The dashed fields marked with an asterisk in the label are mandatory.<br />
You will not be able to save any data until you have provided all required information.</p>

<p>Be aware that you first have to create a new My Issues by clicking on "Create"
before you can add references to other data or assign user / roles.</p>

      
<p>You will, by default, be assigned to the new My Issues as "Owner".</p>


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
      
      
      
    </div>
    
  </div>

<div class="wgt-clear xxsmall">&nbsp;</div>
