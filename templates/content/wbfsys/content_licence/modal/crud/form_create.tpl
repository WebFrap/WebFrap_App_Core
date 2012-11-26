  <div id="wgt-tab-form-wbfsys_content_licence-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_content_licence_details"
        title="<?php echo $I18N->l('Content Licence','wbfsys.content_licence.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_content_licence-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_content_licence-default" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysContentLicenceName;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysContentLicenceShortname;?>
          <?php echo $ELEMENT->inputWbfsysContentLicenceAccessKey;?>
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysContentLicenceContent;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_content_licence-description').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-wbfsys_content_licence-description" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysContentLicenceDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_content_licence-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_content_licence-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysContentLicenceMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysContentLicenceMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysContentLicenceRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysContentLicenceMUuid;?>
          <?php echo $ELEMENT->inputWbfsysContentLicenceMVersion;?>
          <?php echo $ELEMENT->inputWbfsysContentLicenceMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysContentLicenceMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
