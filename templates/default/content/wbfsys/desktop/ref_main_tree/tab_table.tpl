<?php if( $ELEMENT->tableMainTree ){ ?>

  <form
    method="get"
    action="<?php echo $VAR->searchFormActionMainTree.$ELEMENT->tableMainTree->getAccessPath(); ?>"
    id="<?php echo $VAR->searchFormIdMainTree?>" >

     <input
      type="hidden"
      name="search_main_tree[id_menu]"
      value="<?php echo $VAR->refIdMainTree?>"  />
      <?php // pre save ?>
  </form>

  <div class="wgt-clear xxsmall" ></div>

  <?php echo $ELEMENT->tableMainTree?>

    <form
      method="post"
      action="ajax.php?c=Wbfsys.Desktop_Ref_MainTree.append<?php echo $ELEMENT->tableMainTree->getAccessPath();?>"
      id="wgt_append_form_wbfsys_desktop_main_tree" >

      <input
        type="hidden" name="wbfsys_menu_entry[id_menu]"
        value="<?php echo $VAR->refIdMainTree?>" />

    </form>

    <script type="text/javascript" >
      function append_wbfsys_desktop_main_tree_<?php echo $VAR->refIdMainTree?>( targetId ){
        $R.form( 'wgt_append_form_wbfsys_desktop_main_tree' , '&amp;objid='+target_id, {append:true} );
      }
    </script>


<?php }else{ ?>

  <p class="wgt-box error" >Sorry, an internal Error occured. This Resource is not loadable.</p>

<?php } ?>
