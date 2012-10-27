<?php if( $ELEMENT->tableReferences ){ ?>

  <form
    method="get"
    action="<?php echo $VAR->searchFormActionReferences.$ELEMENT->tableReferences->getAccessPath(); ?>"
    id="<?php echo $VAR->searchFormIdReferences?>" >

     <input
      type="hidden"
      name="search_references[id_from]"
      value="<?php echo $VAR->refIdReferences?>"  />
      <?php // pre save ?>
  </form>

  <div class="wgt-clear xxsmall" ></div>

  <?php echo $ELEMENT->tableReferences?>

    <form
      method="post"
      action="ajax.php?c=Wbfsys.Entity_Ref_References.append<?php echo $ELEMENT->tableReferences->getAccessPath();?>"
      id="wgt_append_form_wbfsys_entity_references" >

      <input
        type="hidden" name="wbfsys_entity_reference[id_from]"
        value="<?php echo $VAR->refIdReferences?>" />

    </form>

    <script type="text/javascript" >
      function append_wbfsys_entity_references_<?php echo $VAR->refIdReferences?>( targetId ){
        $R.form( 'wgt_append_form_wbfsys_entity_references' , '&amp;objid='+target_id, {append:true} );
      }
    </script>


<?php }else{ ?>

  <p class="wgt-box error" >Sorry, an internal Error occured. This Resource is not loadable.</p>

<?php } ?>
