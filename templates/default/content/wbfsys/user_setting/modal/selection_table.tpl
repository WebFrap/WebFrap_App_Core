
  <form
    method="get"
    accept-charset="utf-8"
    class="<?php echo $VAR->searchFormClass?>"
    id="<?php echo $VAR->searchFormId?>"
    action="<?php echo $VAR->searchFormAction?>" >

    <div id="wgt-search-selection-wbfsys_user_setting-advanced"  style="display:none" >

      <div id="wgt_tab-selection-wbfsys_user_setting-search" class=""  >
        <div 
        	id="wgt_tab-selection-wbfsys_user_setting-search-head" 
        	class="wcm wcm_ui_tab_head wgt-tab-head al"
        	wgt_body="wgt_tab-selection-wbfsys_user_setting-search-content" >
        	
          <div class="inner left" style="width:200px" >
            <h2><?php echo $I18N->l( 'Extended Search', 'wbf.label' )?></h2>
          </div>
          
          <!-- tab heads -->
          <div class="tab_head inline" >
          </div>
          
          <div class="wgt-dropdownbox" id="wgt_tab-selection-wbfsys_user_setting-search-overflow-cruddropbox" >
            <ul id="wgt_tab-selection-wbfsys_user_setting-search-overflow-menu"  >
            </ul>
            <var id="wgt_tab-selection-wbfsys_user_setting-search-overflow-cntrl-cfg-dropmenu"  >{"triggerEvent":"click","align":"right"}</var>
          </div>
        </div>

        <div id="wgt_tab-selection-wbfsys_user_setting-search-content" class="wgt-content-box" >

  

          <div
            class="container"
            id="wgt_tab-selection-wbfsys_user_setting-search-content-meta"
            wgt_key="meta"
            title="Meta" >

            <div class="left bw3" >
              <?php echo $ELEMENT->inputWbfsysUserSettingSearchMRoleCreate?>
              <?php echo $ELEMENT->inputWbfsysUserSettingSearchMTimeCreatedBefore?>
              <?php echo $ELEMENT->inputWbfsysUserSettingSearchMTimeCreatedAfter?>
              <div class="box_border" >&nbsp;</div>
            </div>

            <div class="inline bw3" >
              <?php echo $ELEMENT->inputWbfsysUserSettingSearchMRoleChange?>
              <?php echo $ELEMENT->inputWbfsysUserSettingSearchMTimeChangedBefore?>
              <?php echo $ELEMENT->inputWbfsysUserSettingSearchMTimeChangedAfter?>
            </div>

            <div class="left bw3" >&nbsp;</div>

            <div class="inline bw3" >
              <?php echo $ELEMENT->inputWbfsysUserSettingSearchMUuid?>
              <?php echo $ELEMENT->inputWbfsysUserSettingSearchMRowid?>
            </div>

          </div>

        </div>

      </div>

      <div class="wgt-clear medium">&nbsp;</div>

    </div>
    

  </form>



<p class="wgt-box info" >
  To assign a User Setting press the connect button on the right side in the table.
</p>

<?php echo $ELEMENT->selectionWbfsysUserSetting?>

<div class="wgt-clear xsmall">&nbsp;</div>


<?php $this->addJsCode( <<<JS

self.find(".wgtac_search").click(function() {
  \$R.form('{$ELEMENT->selectionWbfsysUserSetting->searchForm}', null, {search:true});
});

JS
); ?>
    
