  <form
    method="get"
    accept-charset="utf-8"
    class="<?php echo $VAR->searchFormClass?>"
    id="<?php echo $VAR->searchFormId?>"
    action="<?php echo $VAR->searchFormAction?>" >

    <div id="wgt-search-table-wbfsys_acl_action-advanced"  style="display:none" >

      <div id="wgt_tab-table-wbfsys_acl_action-search" class=""  >
        <div 
        	id="wgt_tab-table-wbfsys_acl_action-search-head" 
        	class="wcm wcm_ui_tab_head wgt-tab-head al"
        	wgt_body="wgt_tab-table-wbfsys_acl_action-search-content" >
        	
          <div class="inner left" style="width:200px" >
            <h2><?php echo $I18N->l( 'Extended Search', 'wbf.label' )?></h2>
          </div>
          
          <!-- tab heads -->
          <div class="tab_head inline" >
          </div>
          
          <div class="wgt-dropdownbox" id="wgt_tab-table-wbfsys_acl_action-search-overflow-cruddropbox" >
            <ul id="wgt_tab-table-wbfsys_acl_action-search-overflow-menu"  >
            </ul>
            <var id="wgt_tab-table-wbfsys_acl_action-search-overflow-cntrl-cfg-dropmenu"  >{"triggerEvent":"click","align":"right"}</var>
          </div>
        </div>

        <div id="wgt_tab-table-wbfsys_acl_action-search-content" class="wgt-content-box" >

  

          <div
            class="container"
            id="wgt_tab-table-wbfsys_acl_action-search-content-meta"
            wgt_key="meta"
            title="Meta" >

            <div class="left bw3" >
              <?php echo $ELEMENT->inputWbfsysAclActionSearchMRoleCreate?>
              <?php echo $ELEMENT->inputWbfsysAclActionSearchMTimeCreatedBefore?>
              <?php echo $ELEMENT->inputWbfsysAclActionSearchMTimeCreatedAfter?>
              <div class="box_border" >&nbsp;</div>
            </div>

            <div class="inline bw3" >
              <?php echo $ELEMENT->inputWbfsysAclActionSearchMRoleChange?>
              <?php echo $ELEMENT->inputWbfsysAclActionSearchMTimeChangedBefore?>
              <?php echo $ELEMENT->inputWbfsysAclActionSearchMTimeChangedAfter?>
            </div>

            <div class="left bw3" >&nbsp;</div>

            <div class="inline bw3" >
              <?php echo $ELEMENT->inputWbfsysAclActionSearchMUuid?>
              <?php echo $ELEMENT->inputWbfsysAclActionSearchMRowid?>
            </div>

          </div>

        </div>

      </div>

      <div class="wgt-clear medium">&nbsp;</div>

    </div>
    

  </form>

