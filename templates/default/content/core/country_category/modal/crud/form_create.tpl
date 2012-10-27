  <div id="wgt-tab-form-core_country_category-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_core_country_category_details"
        title="<?php echo $I18N->l('country Category','core.country_category.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-core_country_category-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-core_country_category-default" >
        <div class="full" >
          <?php echo $ELEMENT->inputCoreCountryCategoryTitle;?>
        </div>
        <div class="left bw3" >
          <?php echo $ELEMENT->inputCoreCountryCategoryIdParent;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputCoreCountryCategoryName;?>
          <?php echo $ELEMENT->inputCoreCountryCategoryAccessKey;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-core_country_category-description').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-core_country_category-description" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputCoreCountryCategoryDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-core_country_category-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-core_country_category-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputCoreCountryCategoryMOrder;?>
          <?php echo $ELEMENT->inputCoreCountryCategoryMUuid;?>
          <?php echo $ELEMENT->inputCoreCountryCategoryMTimeChanged;?>
          <?php echo $ELEMENT->inputCoreCountryCategoryMRoleCreate;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputCoreCountryCategoryMVersion;?>
          <?php echo $ELEMENT->inputCoreCountryCategoryMRoleChange;?>
          <?php echo $ELEMENT->inputCoreCountryCategoryMTimeCreated;?>
          <?php echo $ELEMENT->inputCoreCountryCategoryRowid;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
