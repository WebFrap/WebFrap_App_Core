<?php if( $ELEMENT->tableAliases ){ ?>

  <form
    method="get"
    action="<?php echo $VAR->searchFormActionAliases.$ELEMENT->tableAliases->getAccessPath(); ?>"
    id="<?php echo $VAR->searchFormIdAliases?>" >

     <input
      type="hidden"
      name="search_aliases[id_entity]"
      value="<?php echo $VAR->refIdAliases?>"  />
      <?php // pre save ?>
  </form>

  <div class="wgt-clear xxsmall" ></div>

  <?php echo $ELEMENT->tableAliases?>

    <form
      method="post"
      action="ajax.php?c=Wbfsys.Entity_Ref_Aliases.append<?php echo $ELEMENT->tableAliases->getAccessPath();?>"
      id="wgt_append_form_wbfsys_entity_aliases" >

      <input
        type="hidden" name="wbfsys_entity_alias[id_entity]"
        value="<?php echo $VAR->refIdAliases?>" />

    </form>

    <script type="application/javascript" >
      function append_wbfsys_entity_aliases_<?php echo $VAR->refIdAliases?>( targetId ){
        $R.form( 'wgt_append_form_wbfsys_entity_aliases' , '&amp;objid='+target_id, {append:true} );
      }
    </script>


<?php }else{ ?>

  <p class="wgt-box error" >Sorry, an internal Error occured. This Resource is not loadable.</p>

<?php } ?>
