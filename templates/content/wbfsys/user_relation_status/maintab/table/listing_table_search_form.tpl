  <form
    method="get"
    accept-charset="utf-8"
    class="<?php echo $VAR->searchFormClass?>"
    id="<?php echo $VAR->searchFormId?>"
    action="<?php echo $VAR->searchFormAction?>" >

    <div id="wgt-search-table-wbfsys_user_relation_status-advanced"  style="display:none" >

      <div id="wgt_tab-table-wbfsys_user_relation_status-search" class=""  >
        <div 
        	id="wgt_tab-table-wbfsys_user_relation_status-search-head" 
        	class="wcm wcm_ui_tab_head wgt-tab-head al"
        	wgt_body="wgt_tab-table-wbfsys_user_relation_status-search-content" >
        	
          <div class="inner left" style="width:200px" >
            <h2><?php echo $I18N->l( 'Extended Search', 'wbf.label' )?></h2>
          </div>
          
          <!-- tab heads -->
          <div class="tab_head inline" >
          </div>
          
          <div class="wgt-dropdownbox" id="wgt_tab-table-wbfsys_user_relation_status-search-overflow-cruddropbox" >
            <ul id="wgt_tab-table-wbfsys_user_relation_status-search-overflow-menu"  >
            </ul>
            <var id="wgt_tab-table-wbfsys_user_relation_status-search-overflow-cntrl-cfg-dropmenu"  >{"triggerEvent":"click","align":"right"}</var>
          </div>
        </div>

        <div id="wgt_tab-table-wbfsys_user_relation_status-search-content" class="wgt-content-box" >

          <div
          class="container"
          id="wgt_tab-table-wbfsys_user_relation_status-search-content-default"
          title="Default"
          wgt_key="default" >
           <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysUserRelationStatusSearchName;?>
          <?php echo $ELEMENT->inputWbfsysUserRelationStatusSearchAccessKey;?>
        </div>

          <div class="wgt-clear xxsmall">&nbsp;</div>
        </div>
        <div
          class="container"
          id="wgt_tab-table-wbfsys_user_relation_status-search-content-description"
          title="Description"
          wgt_key="description" >
           <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysUserRelationStatusSearchDescription;?>
        </div>

          <div class="wgt-clear xxsmall">&nbsp;</div>
        </div>


          <div
            class="container"
            id="wgt_tab-table-wbfsys_user_relation_status-search-content-meta"
            wgt_key="meta"
            title="Meta" >

            <div class="left bw3" >
              <?php echo $ELEMENT->inputWbfsysUserRelationStatusSearchMRoleCreate?>
              <?php echo $ELEMENT->inputWbfsysUserRelationStatusSearchMTimeCreatedBefore?>
              <?php echo $ELEMENT->inputWbfsysUserRelationStatusSearchMTimeCreatedAfter?>
              <div class="box_border" >&nbsp;</div>
            </div>

            <div class="inline bw3" >
              <?php echo $ELEMENT->inputWbfsysUserRelationStatusSearchMRoleChange?>
              <?php echo $ELEMENT->inputWbfsysUserRelationStatusSearchMTimeChangedBefore?>
              <?php echo $ELEMENT->inputWbfsysUserRelationStatusSearchMTimeChangedAfter?>
            </div>

            <div class="left bw3" >&nbsp;</div>

            <div class="inline bw3" >
              <?php echo $ELEMENT->inputWbfsysUserRelationStatusSearchMUuid?>
              <?php echo $ELEMENT->inputWbfsysUserRelationStatusSearchMRowid?>
            </div>

          </div>

        </div>

      </div>

      <div class="wgt-clear medium">&nbsp;</div>

    </div>
    

  </form>

