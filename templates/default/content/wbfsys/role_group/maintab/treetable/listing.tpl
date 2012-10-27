
  <form
    method="get"
    accept-charset="utf-8"
    class="<?php echo $VAR->searchFormClass?>"
    id="<?php echo $VAR->searchFormId?>"
    action="<?php echo $VAR->searchFormAction?>" >

    <div id="wgt-search-treetable-wbfsys_role_group-advanced"  style="display:none" >

      <div id="wgt_tab-treetable-wbfsys_role_group-search" class=""  >
        <div 
        	id="wgt_tab-treetable-wbfsys_role_group-search-head" 
        	class="wcm wcm_ui_tab_head wgt-tab-head al"
        	wgt_body="wgt_tab-treetable-wbfsys_role_group-search-content" >
        	
          <div class="inner left" style="width:200px" >
            <h2><?php echo $I18N->l( 'Extended Search', 'wbf.label' )?></h2>
          </div>
          
          <!-- tab heads -->
          <div class="tab_head inline" >
          </div>
          
          <div class="wgt-dropdownbox" id="wgt_tab-treetable-wbfsys_role_group-search-overflow-cruddropbox" >
            <ul id="wgt_tab-treetable-wbfsys_role_group-search-overflow-menu"  >
            </ul>
            <var id="wgt_tab-treetable-wbfsys_role_group-search-overflow-cntrl-cfg-dropmenu"  >{"triggerEvent":"click","align":"right"}</var>
          </div>
        </div>

        <div id="wgt_tab-treetable-wbfsys_role_group-search-content" class="wgt-content-box" >

          <div
          class="container"
          id="wgt_tab-treetable-wbfsys_role_group-search-content-default"
          title="Default"
          wgt_key="default" >
           <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysRoleGroupSearchName;?>
          <?php echo $ELEMENT->inputWbfsysRoleGroupSearchLevel;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysRoleGroupSearchAccessKey;?>
          <?php echo $ELEMENT->inputWbfsysRoleGroupSearchIdType;?>
        </div>

          <div class="wgt-clear xxsmall">&nbsp;</div>
        </div>


          <div
            class="container"
            id="wgt_tab-treetable-wbfsys_role_group-search-content-meta"
            wgt_key="meta"
            title="Meta" >

            <div class="left bw3" >
              <?php echo $ELEMENT->inputWbfsysRoleGroupSearchMRoleCreate?>
              <?php echo $ELEMENT->inputWbfsysRoleGroupSearchMTimeCreatedBefore?>
              <?php echo $ELEMENT->inputWbfsysRoleGroupSearchMTimeCreatedAfter?>
              <div class="box_border" >&nbsp;</div>
            </div>

            <div class="inline bw3" >
              <?php echo $ELEMENT->inputWbfsysRoleGroupSearchMRoleChange?>
              <?php echo $ELEMENT->inputWbfsysRoleGroupSearchMTimeChangedBefore?>
              <?php echo $ELEMENT->inputWbfsysRoleGroupSearchMTimeChangedAfter?>
            </div>

            <div class="left bw3" >&nbsp;</div>

            <div class="inline bw3" >
              <?php echo $ELEMENT->inputWbfsysRoleGroupSearchMUuid?>
              <?php echo $ELEMENT->inputWbfsysRoleGroupSearchMRowid?>
            </div>

          </div>

        </div>

      </div>

      <div class="wgt-clear medium">&nbsp;</div>

    </div>
    

  </form>




  <?php echo $ELEMENT->treetableWbfsysRoleGroup; ?>

  <div class="wgt-clear xxsmall">&nbsp;</div>

<script type="text/javascript">
<?php foreach( $this->jsItems as $jsItem ){ ?>
  <?php echo $ELEMENT->$jsItem->jsCode?>
<?php } ?>
</script>
