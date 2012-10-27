
  <form
    method="get"
    accept-charset="utf-8"
    class="<?php echo $VAR->searchFormClass?>"
    id="<?php echo $VAR->searchFormId?>"
    action="<?php echo $VAR->searchFormAction?>" >

    <div id="wgt-search-selection-wbfsys_entity_attribute-advanced"  style="display:none" >

      <div id="wgt_tab-selection-wbfsys_entity_attribute-search" class=""  >
        <div 
        	id="wgt_tab-selection-wbfsys_entity_attribute-search-head" 
        	class="wcm wcm_ui_tab_head wgt-tab-head al"
        	wgt_body="wgt_tab-selection-wbfsys_entity_attribute-search-content" >
        	
          <div class="inner left" style="width:200px" >
            <h2><?php echo $I18N->l( 'Extended Search', 'wbf.label' )?></h2>
          </div>
          
          <!-- tab heads -->
          <div class="tab_head inline" >
          </div>
          
          <div class="wgt-dropdownbox" id="wgt_tab-selection-wbfsys_entity_attribute-search-overflow-cruddropbox" >
            <ul id="wgt_tab-selection-wbfsys_entity_attribute-search-overflow-menu"  >
            </ul>
            <var id="wgt_tab-selection-wbfsys_entity_attribute-search-overflow-cntrl-cfg-dropmenu"  >{"triggerEvent":"click","align":"right"}</var>
          </div>
        </div>

        <div id="wgt_tab-selection-wbfsys_entity_attribute-search-content" class="wgt-content-box" >

          <div
          class="container"
          id="wgt_tab-selection-wbfsys_entity_attribute-search-content-default"
          title="Default"
          wgt_key="default" >
           <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysEntityAttributeSearchName;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysEntityAttributeSearchAccessKey;?>
          <?php echo $ELEMENT->inputWbfsysEntityAttributeSearchIdType;?>
        </div>

          <div class="wgt-clear xxsmall">&nbsp;</div>
        </div>


          <div
            class="container"
            id="wgt_tab-selection-wbfsys_entity_attribute-search-content-meta"
            wgt_key="meta"
            title="Meta" >

            <div class="left bw3" >
              <?php echo $ELEMENT->inputWbfsysEntityAttributeSearchMRoleCreate?>
              <?php echo $ELEMENT->inputWbfsysEntityAttributeSearchMTimeCreatedBefore?>
              <?php echo $ELEMENT->inputWbfsysEntityAttributeSearchMTimeCreatedAfter?>
              <div class="box_border" >&nbsp;</div>
            </div>

            <div class="inline bw3" >
              <?php echo $ELEMENT->inputWbfsysEntityAttributeSearchMRoleChange?>
              <?php echo $ELEMENT->inputWbfsysEntityAttributeSearchMTimeChangedBefore?>
              <?php echo $ELEMENT->inputWbfsysEntityAttributeSearchMTimeChangedAfter?>
            </div>

            <div class="left bw3" >&nbsp;</div>

            <div class="inline bw3" >
              <?php echo $ELEMENT->inputWbfsysEntityAttributeSearchMUuid?>
              <?php echo $ELEMENT->inputWbfsysEntityAttributeSearchMRowid?>
            </div>

          </div>

        </div>

      </div>

      <div class="wgt-clear medium">&nbsp;</div>

    </div>
    

  </form>



<p class="wgt-box info" >
  To assign a Entity Attribute press the connect button on the right side in the table.
</p>

<?php echo $ELEMENT->selectionWbfsysEntityAttribute?>

<div class="wgt-clear xsmall">&nbsp;</div>


<?php $this->addJsCode( <<<JS

self.find(".wgtac_search").click(function() {
  \$R.form('{$ELEMENT->selectionWbfsysEntityAttribute->searchForm}', null, {search:true});
});

JS
); ?>
    
