<?php if( $ELEMENT->tableCategories ){ ?>

  <form
    method="get"
    action="<?php echo $VAR->searchFormActionCategories.$ELEMENT->tableCategories->getAccessPath(); ?>"
    id="<?php echo $VAR->searchFormIdCategories?>" >

     <input
      type="hidden"
      name="search_categories[id_entity]"
      value="<?php echo $VAR->refIdCategories?>"  />
      <?php // pre save ?>
  </form>

  <div class="wgt-clear xxsmall" ></div>

  <?php echo $ELEMENT->tableCategories?>

    <form
      method="post"
      action="ajax.php?c=Wbfsys.Entity_Ref_Categories.append<?php echo $ELEMENT->tableCategories->getAccessPath();?>"
      id="wgt_append_form_wbfsys_entity_categories" >

      <input
        type="hidden" name="wbfsys_entity_category[id_entity]"
        value="<?php echo $VAR->refIdCategories?>" />

    </form>

    <script type="text/javascript" >
      function append_wbfsys_entity_categories_<?php echo $VAR->refIdCategories?>( targetId ){
        $R.form( 'wgt_append_form_wbfsys_entity_categories' , '&amp;objid='+target_id, {append:true} );
      }
    </script>


<?php }else{ ?>

  <p class="wgt-box error" >Sorry, an internal Error occured. This Resource is not loadable.</p>

<?php } ?>
