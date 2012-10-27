<?php if( $ELEMENT->tableManagements ){ ?>

  <form
    method="get"
    action="<?php echo $VAR->searchFormActionManagements.$ELEMENT->tableManagements->getAccessPath(); ?>"
    id="<?php echo $VAR->searchFormIdManagements?>" >

     <input
      type="hidden"
      name="search_managements[id_entity]"
      value="<?php echo $VAR->refIdManagements?>"  />
      <?php // pre save ?>
  </form>

  <div class="wgt-clear xxsmall" ></div>

  <?php echo $ELEMENT->tableManagements?>

    <form
      method="post"
      action="ajax.php?c=Wbfsys.Entity_Ref_Managements.append<?php echo $ELEMENT->tableManagements->getAccessPath();?>"
      id="wgt_append_form_wbfsys_entity_managements" >

      <input
        type="hidden" name="wbfsys_management[id_entity]"
        value="<?php echo $VAR->refIdManagements?>" />

    </form>

    <script type="text/javascript" >
      function append_wbfsys_entity_managements_<?php echo $VAR->refIdManagements?>( targetId ){
        $R.form( 'wgt_append_form_wbfsys_entity_managements' , '&amp;objid='+target_id, {append:true} );
      }
    </script>


<?php }else{ ?>

  <p class="wgt-box error" >Sorry, an internal Error occured. This Resource is not loadable.</p>

<?php } ?>
