  <div id="wgt-tab-form-wbfsys_know_how_repository-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_know_how_repository_details"
        title="<?php echo $I18N->l('Know How Repository','wbfsys.know_how_repository.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_know_how_repository-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_know_how_repository-default" >
          <?php echo $ELEMENT->inputWbfsysKnowHowRepositoryVid;?>

          <?php echo $ELEMENT->inputWbfsysKnowHowRepositoryIdVidEntity;?>

        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysKnowHowRepositoryTitle;?>
        </div>
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysKnowHowRepositoryAccessKey;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysKnowHowRepositoryIdLang;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_know_how_repository-description').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-wbfsys_know_how_repository-description" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysKnowHowRepositoryDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_know_how_repository-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_know_how_repository-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysKnowHowRepositoryMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysKnowHowRepositoryMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysKnowHowRepositoryRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysKnowHowRepositoryMUuid;?>
          <?php echo $ELEMENT->inputWbfsysKnowHowRepositoryMVersion;?>
          <?php echo $ELEMENT->inputWbfsysKnowHowRepositoryMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysKnowHowRepositoryMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
