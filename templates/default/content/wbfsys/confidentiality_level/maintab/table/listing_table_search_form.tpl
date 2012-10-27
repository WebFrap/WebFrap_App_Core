  <form
    method="get"
    accept-charset="utf-8"
    class="<?php echo $VAR->searchFormClass?>"
    id="<?php echo $VAR->searchFormId?>"
    action="<?php echo $VAR->searchFormAction?>" >

    <div id="wgt-search-table-wbfsys_confidentiality_level-advanced"  style="display:none" >

      <div id="wgt_tab-table-wbfsys_confidentiality_level-search" class=""  >
        <div 
        	id="wgt_tab-table-wbfsys_confidentiality_level-search-head" 
        	class="wcm wcm_ui_tab_head wgt-tab-head al"
        	wgt_body="wgt_tab-table-wbfsys_confidentiality_level-search-content" >
        	
          <div class="inner left" style="width:200px" >
            <h2><?php echo $I18N->l( 'Extended Search', 'wbf.label' )?></h2>
          </div>
          
          <!-- tab heads -->
          <div class="tab_head inline" >
          </div>
          
          <div class="wgt-dropdownbox" id="wgt_tab-table-wbfsys_confidentiality_level-search-overflow-cruddropbox" >
            <ul id="wgt_tab-table-wbfsys_confidentiality_level-search-overflow-menu"  >
            </ul>
            <var id="wgt_tab-table-wbfsys_confidentiality_level-search-overflow-cntrl-cfg-dropmenu"  >{"triggerEvent":"click","align":"right"}</var>
          </div>
        </div>

        <div id="wgt_tab-table-wbfsys_confidentiality_level-search-content" class="wgt-content-box" >

          <div
          class="container"
          id="wgt_tab-table-wbfsys_confidentiality_level-search-content-default"
          title="Default"
          wgt_key="default" >
           <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysConfidentialityLevelSearchLabel;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysConfidentialityLevelSearchAccessKey;?>
        </div>

          <div class="wgt-clear xxsmall">&nbsp;</div>
        </div>


          <div
            class="container"
            id="wgt_tab-table-wbfsys_confidentiality_level-search-content-meta"
            wgt_key="meta"
            title="Meta" >

            <div class="left bw3" >
              <?php echo $ELEMENT->inputWbfsysConfidentialityLevelSearchMRoleCreate?>
              <?php echo $ELEMENT->inputWbfsysConfidentialityLevelSearchMTimeCreatedBefore?>
              <?php echo $ELEMENT->inputWbfsysConfidentialityLevelSearchMTimeCreatedAfter?>
              <div class="box_border" >&nbsp;</div>
            </div>

            <div class="inline bw3" >
              <?php echo $ELEMENT->inputWbfsysConfidentialityLevelSearchMRoleChange?>
              <?php echo $ELEMENT->inputWbfsysConfidentialityLevelSearchMTimeChangedBefore?>
              <?php echo $ELEMENT->inputWbfsysConfidentialityLevelSearchMTimeChangedAfter?>
            </div>

            <div class="left bw3" >&nbsp;</div>

            <div class="inline bw3" >
              <?php echo $ELEMENT->inputWbfsysConfidentialityLevelSearchMUuid?>
              <?php echo $ELEMENT->inputWbfsysConfidentialityLevelSearchMRowid?>
            </div>

          </div>

        </div>

      </div>

      <div class="wgt-clear medium">&nbsp;</div>

    </div>
    

  </form>

