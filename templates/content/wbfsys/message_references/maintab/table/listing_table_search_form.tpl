  <form
    method="get"
    accept-charset="utf-8"
    class="<?php echo $VAR->searchFormClass?>"
    id="<?php echo $VAR->searchFormId?>"
    action="<?php echo $VAR->searchFormAction?>" >

    <div id="wgt-search-table-wbfsys_message_references-advanced"  style="display:none" >

      <div id="wgt_tab-table-wbfsys_message_references-search" class=""  >
        <div 
        	id="wgt_tab-table-wbfsys_message_references-search-head" 
        	class="wcm wcm_ui_tab_head wgt-tab-head al"
        	wgt_body="wgt_tab-table-wbfsys_message_references-search-content" >
        	
          <div class="inner left" style="width:200px" >
            <h2><?php echo $I18N->l( 'Extended Search', 'wbf.label' )?></h2>
          </div>
          
          <!-- tab heads -->
          <div class="tab_head inline" >
          </div>
          
          <div class="wgt-dropdownbox" id="wgt_tab-table-wbfsys_message_references-search-overflow-cruddropbox" >
            <ul id="wgt_tab-table-wbfsys_message_references-search-overflow-menu"  >
            </ul>
            <var id="wgt_tab-table-wbfsys_message_references-search-overflow-cntrl-cfg-dropmenu"  >{"triggerEvent":"click","align":"right"}</var>
          </div>
        </div>

        <div id="wgt_tab-table-wbfsys_message_references-search-content" class="wgt-content-box" >

  

          <div
            class="container"
            id="wgt_tab-table-wbfsys_message_references-search-content-meta"
            wgt_key="meta"
            title="Meta" >

            <div class="left bw3" >
              <?php echo $ELEMENT->inputWbfsysMessageReferencesSearchMRoleCreate?>
              <?php echo $ELEMENT->inputWbfsysMessageReferencesSearchMTimeCreatedBefore?>
              <?php echo $ELEMENT->inputWbfsysMessageReferencesSearchMTimeCreatedAfter?>
              <div class="box_border" >&nbsp;</div>
            </div>

            <div class="inline bw3" >
              <?php echo $ELEMENT->inputWbfsysMessageReferencesSearchMRoleChange?>
              <?php echo $ELEMENT->inputWbfsysMessageReferencesSearchMTimeChangedBefore?>
              <?php echo $ELEMENT->inputWbfsysMessageReferencesSearchMTimeChangedAfter?>
            </div>

            <div class="left bw3" >&nbsp;</div>

            <div class="inline bw3" >
              <?php echo $ELEMENT->inputWbfsysMessageReferencesSearchMUuid?>
              <?php echo $ELEMENT->inputWbfsysMessageReferencesSearchMRowid?>
            </div>

          </div>

        </div>

      </div>

      <div class="wgt-clear medium">&nbsp;</div>

    </div>
    

  </form>

