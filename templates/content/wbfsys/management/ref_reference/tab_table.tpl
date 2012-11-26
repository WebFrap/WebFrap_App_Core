<?php if( $ELEMENT->tableReference ){ ?>

  <form
    method="get"
    action="<?php echo $VAR->searchFormActionReference.$ELEMENT->tableReference->getAccessPath(); ?>"
    id="<?php echo $VAR->searchFormIdReference?>" >

     <input
      type="hidden"
      name="search_reference[id_from]"
      value="<?php echo $VAR->refIdReference?>"  />
      <?php // pre save ?>
  </form>

  <div class="wgt-clear xxsmall" ></div>

  <?php echo $ELEMENT->tableReference?>

    <form
      method="post"
      action="ajax.php?c=Wbfsys.Management_Ref_Reference.append<?php echo $ELEMENT->tableReference->getAccessPath();?>"
      id="wgt_append_form_wbfsys_management_reference" >

      <input
        type="hidden" name="wbfsys_management_reference[id_from]"
        value="<?php echo $VAR->refIdReference?>" />

    </form>

    <script type="application/javascript" >
      function append_wbfsys_management_reference_<?php echo $VAR->refIdReference?>( targetId ){
        $R.form( 'wgt_append_form_wbfsys_management_reference' , '&amp;objid='+target_id, {append:true} );
      }
    </script>


<?php }else{ ?>

  <p class="wgt-box error" >Sorry, an internal Error occured. This Resource is not loadable.</p>

<?php } ?>
