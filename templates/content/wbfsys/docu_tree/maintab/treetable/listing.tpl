
  <form
    method="get"
    accept-charset="utf-8"
    class="<?php echo $VAR->searchFormClass?>"
    id="<?php echo $VAR->searchFormId?>"
    action="<?php echo $VAR->searchFormAction?>" >

    <div id="wgt-search-treetable-wbfsys_docu_tree-advanced"  style="display:none" >

      <div id="wgt_tab-treetable-wbfsys_docu_tree-search" class=""  >
        <div 
        	id="wgt_tab-treetable-wbfsys_docu_tree-search-head" 
        	class="wcm wcm_ui_tab_head wgt-tab-head al"
        	wgt_body="wgt_tab-treetable-wbfsys_docu_tree-search-content" >
        	
          <div class="inner left" style="width:200px" >
            <h2><?php echo $I18N->l( 'Extended Search', 'wbf.label' )?></h2>
          </div>
          
          <!-- tab heads -->
          <div class="tab_head inline" >
          </div>
          
          <div class="wgt-dropdownbox" id="wgt_tab-treetable-wbfsys_docu_tree-search-overflow-cruddropbox" >
            <ul id="wgt_tab-treetable-wbfsys_docu_tree-search-overflow-menu"  >
            </ul>
            <var id="wgt_tab-treetable-wbfsys_docu_tree-search-overflow-cntrl-cfg-dropmenu"  >{"triggerEvent":"click","align":"right"}</var>
          </div>
        </div>

        <div id="wgt_tab-treetable-wbfsys_docu_tree-search-content" class="wgt-content-box" >

          <div
          class="container"
          id="wgt_tab-treetable-wbfsys_docu_tree-search-content-default"
          title="Default"
          wgt_key="default" >
           <div class="full" >
          <?php echo $ELEMENT->inputWbfsysDocuTreeSearchTitle;?>
        </div>
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysDocuTreeSearchAccessKey;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysDocuTreeSearchTemplate;?>
          <?php echo $ELEMENT->inputWbfsysDocuTreeSearchShortDesc;?>
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysDocuTreeSearchContent;?>
        </div>

          <div class="wgt-clear xxsmall">&nbsp;</div>
        </div>


          <div
            class="container"
            id="wgt_tab-treetable-wbfsys_docu_tree-search-content-meta"
            wgt_key="meta"
            title="Meta" >

            <div class="left bw3" >
              <?php echo $ELEMENT->inputWbfsysDocuTreeSearchMRoleCreate?>
              <?php echo $ELEMENT->inputWbfsysDocuTreeSearchMTimeCreatedBefore?>
              <?php echo $ELEMENT->inputWbfsysDocuTreeSearchMTimeCreatedAfter?>
              <div class="box_border" >&nbsp;</div>
            </div>

            <div class="inline bw3" >
              <?php echo $ELEMENT->inputWbfsysDocuTreeSearchMRoleChange?>
              <?php echo $ELEMENT->inputWbfsysDocuTreeSearchMTimeChangedBefore?>
              <?php echo $ELEMENT->inputWbfsysDocuTreeSearchMTimeChangedAfter?>
            </div>

            <div class="left bw3" >&nbsp;</div>

            <div class="inline bw3" >
              <?php echo $ELEMENT->inputWbfsysDocuTreeSearchMUuid?>
              <?php echo $ELEMENT->inputWbfsysDocuTreeSearchMRowid?>
            </div>

          </div>

        </div>

      </div>

      <div class="wgt-clear medium">&nbsp;</div>

    </div>
    

  </form>




  <?php echo $ELEMENT->treetableWbfsysDocuTree; ?>

  <div class="wgt-clear xxsmall">&nbsp;</div>

<script type="application/javascript">
<?php foreach( $this->jsItems as $jsItem ){ ?>
  <?php echo $ELEMENT->$jsItem->jsCode?>
<?php } ?>
</script>
