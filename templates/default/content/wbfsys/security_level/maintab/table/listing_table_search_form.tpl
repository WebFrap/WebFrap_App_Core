  <form
    method="get"
    accept-charset="utf-8"
    class="<?php echo $VAR->searchFormClass?>"
    id="<?php echo $VAR->searchFormId?>"
    action="<?php echo $VAR->searchFormAction?>" >

    <div id="wgt-search-table-wbfsys_security_level-advanced"  style="display:none" >

      <div id="wgt_tab-table-wbfsys_security_level-search" class=""  >
        <div 
        	id="wgt_tab-table-wbfsys_security_level-search-head" 
        	class="wcm wcm_ui_tab_head wgt-tab-head al"
        	wgt_body="wgt_tab-table-wbfsys_security_level-search-content" >
        	
          <div class="inner left" style="width:200px" >
            <h2><?php echo $I18N->l( 'Extended Search', 'wbf.label' )?></h2>
          </div>
          
          <!-- tab heads -->
          <div class="tab_head inline" >
          </div>
          
          <div class="wgt-dropdownbox" id="wgt_tab-table-wbfsys_security_level-search-overflow-cruddropbox" >
            <ul id="wgt_tab-table-wbfsys_security_level-search-overflow-menu"  >
            </ul>
            <var id="wgt_tab-table-wbfsys_security_level-search-overflow-cntrl-cfg-dropmenu"  >{"triggerEvent":"click","align":"right"}</var>
          </div>
        </div>

        <div id="wgt_tab-table-wbfsys_security_level-search-content" class="wgt-content-box" >

          <div
          class="container"
          id="wgt_tab-table-wbfsys_security_level-search-content-default"
          title="Default"
          wgt_key="default" >
           <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysSecurityLevelSearchLabel;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysSecurityLevelSearchAccessKey;?>
        </div>

          <div class="wgt-clear xxsmall">&nbsp;</div>
        </div>


          <div
            class="container"
            id="wgt_tab-table-wbfsys_security_level-search-content-meta"
            wgt_key="meta"
            title="Meta" >

            <div class="left bw3" >
              <?php echo $ELEMENT->inputWbfsysSecurityLevelSearchMRoleCreate?>
              <?php echo $ELEMENT->inputWbfsysSecurityLevelSearchMTimeCreatedBefore?>
              <?php echo $ELEMENT->inputWbfsysSecurityLevelSearchMTimeCreatedAfter?>
              <div class="box_border" >&nbsp;</div>
            </div>

            <div class="inline bw3" >
              <?php echo $ELEMENT->inputWbfsysSecurityLevelSearchMRoleChange?>
              <?php echo $ELEMENT->inputWbfsysSecurityLevelSearchMTimeChangedBefore?>
              <?php echo $ELEMENT->inputWbfsysSecurityLevelSearchMTimeChangedAfter?>
            </div>

            <div class="left bw3" >&nbsp;</div>

            <div class="inline bw3" >
              <?php echo $ELEMENT->inputWbfsysSecurityLevelSearchMUuid?>
              <?php echo $ELEMENT->inputWbfsysSecurityLevelSearchMRowid?>
            </div>

          </div>

        </div>

      </div>

      <div class="wgt-clear medium">&nbsp;</div>

    </div>
    

  </form>

