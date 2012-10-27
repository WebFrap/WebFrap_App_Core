<?php if( $ELEMENT->tableNodes ){ ?>

  <form
    method="get"
    action="<?php echo $VAR->searchFormActionNodes.$ELEMENT->tableNodes->getAccessPath(); ?>"
    id="<?php echo $VAR->searchFormIdNodes?>" >

     <input
      type="hidden"
      name="search_nodes[id_process]"
      value="<?php echo $VAR->refIdNodes?>"  />
      <?php // pre save ?>
  </form>

  <div class="wgt-clear xxsmall" ></div>

  <?php echo $ELEMENT->tableNodes?>

    <form
      method="post"
      action="ajax.php?c=Wbfsys.Process_Ref_Nodes.append<?php echo $ELEMENT->tableNodes->getAccessPath();?>"
      id="wgt_append_form_wbfsys_process_nodes" >

      <input
        type="hidden" name="wbfsys_process_node[id_process]"
        value="<?php echo $VAR->refIdNodes?>" />

    </form>

    <script type="text/javascript" >
      function append_wbfsys_process_nodes_<?php echo $VAR->refIdNodes?>( targetId ){
        $R.form( 'wgt_append_form_wbfsys_process_nodes' , '&amp;objid='+target_id, {append:true} );
      }
    </script>


<?php }else{ ?>

  <p class="wgt-box error" >Sorry, an internal Error occured. This Resource is not loadable.</p>

<?php } ?>
