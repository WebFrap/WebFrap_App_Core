  <form
    method="get"
    accept-charset="utf-8"
    class="<?php echo $VAR->searchFormClass?>"
    id="<?php echo $VAR->searchFormId?>"
    action="<?php echo $VAR->searchFormAction?>" >

    <div id="wgt-search-table-wbfsys_know_how_node-advanced"  style="display:none" >

      <div id="wgt_tab-table-wbfsys_know_how_node-search" class=""  >
        <div 
        	id="wgt_tab-table-wbfsys_know_how_node-search-head" 
        	class="wcm wcm_ui_tab_head wgt-tab-head al"
        	wgt_body="wgt_tab-table-wbfsys_know_how_node-search-content" >
        	
          <div class="inner left" style="width:200px" >
            <h2><?php echo $I18N->l( 'Extended Search', 'wbf.label' )?></h2>
          </div>
          
          <!-- tab heads -->
          <div class="tab_head inline" >
          </div>
          
          <div class="wgt-dropdownbox" id="wgt_tab-table-wbfsys_know_how_node-search-overflow-cruddropbox" >
            <ul id="wgt_tab-table-wbfsys_know_how_node-search-overflow-menu"  >
            </ul>
            <var id="wgt_tab-table-wbfsys_know_how_node-search-overflow-cntrl-cfg-dropmenu"  >{"triggerEvent":"click","align":"right"}</var>
          </div>
        </div>

        <div id="wgt_tab-table-wbfsys_know_how_node-search-content" class="wgt-content-box" >

          <div
          class="container"
          id="wgt_tab-table-wbfsys_know_how_node-search-content-default"
          title="Default"
          wgt_key="default" >
           <div class="full" >
          <?php echo $ELEMENT->inputWbfsysKnowHowNodeSearchTitle;?>
        </div>
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysKnowHowNodeSearchAccessKey;?>
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysKnowHowNodeSearchRawContent;?>
        </div>

          <div class="wgt-clear xxsmall">&nbsp;</div>
        </div>


          <div
            class="container"
            id="wgt_tab-table-wbfsys_know_how_node-search-content-meta"
            wgt_key="meta"
            title="Meta" >

            <div class="left bw3" >
              <?php echo $ELEMENT->inputWbfsysKnowHowNodeSearchMRoleCreate?>
              <?php echo $ELEMENT->inputWbfsysKnowHowNodeSearchMTimeCreatedBefore?>
              <?php echo $ELEMENT->inputWbfsysKnowHowNodeSearchMTimeCreatedAfter?>
              <div class="box_border" >&nbsp;</div>
            </div>

            <div class="inline bw3" >
              <?php echo $ELEMENT->inputWbfsysKnowHowNodeSearchMRoleChange?>
              <?php echo $ELEMENT->inputWbfsysKnowHowNodeSearchMTimeChangedBefore?>
              <?php echo $ELEMENT->inputWbfsysKnowHowNodeSearchMTimeChangedAfter?>
            </div>

            <div class="left bw3" >&nbsp;</div>

            <div class="inline bw3" >
              <?php echo $ELEMENT->inputWbfsysKnowHowNodeSearchMUuid?>
              <?php echo $ELEMENT->inputWbfsysKnowHowNodeSearchMRowid?>
            </div>

          </div>

        </div>

      </div>

      <div class="wgt-clear medium">&nbsp;</div>

    </div>
    

  </form>

