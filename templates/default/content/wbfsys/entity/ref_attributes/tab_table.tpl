<?php if( $ELEMENT->tableAttributes ){ ?>

  <form
    method="get"
    action="<?php echo $VAR->searchFormActionAttributes.$ELEMENT->tableAttributes->getAccessPath(); ?>"
    id="<?php echo $VAR->searchFormIdAttributes?>" >

     <input
      type="hidden"
      name="search_attributes[id_entity]"
      value="<?php echo $VAR->refIdAttributes?>"  />
      <?php // pre save ?>
  </form>

  <div class="wgt-clear xxsmall" ></div>

  <?php echo $ELEMENT->tableAttributes?>

    <form
      method="post"
      action="ajax.php?c=Wbfsys.Entity_Ref_Attributes.append<?php echo $ELEMENT->tableAttributes->getAccessPath();?>"
      id="wgt_append_form_wbfsys_entity_attributes" >

      <input
        type="hidden" name="wbfsys_entity_attribute[id_entity]"
        value="<?php echo $VAR->refIdAttributes?>" />

    </form>

    <script type="text/javascript" >
      function append_wbfsys_entity_attributes_<?php echo $VAR->refIdAttributes?>( targetId ){
        $R.form( 'wgt_append_form_wbfsys_entity_attributes' , '&amp;objid='+target_id, {append:true} );
      }
    </script>


<?php }else{ ?>

  <p class="wgt-box error" >Sorry, an internal Error occured. This Resource is not loadable.</p>

<?php } ?>
