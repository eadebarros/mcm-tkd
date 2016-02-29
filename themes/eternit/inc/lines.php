<?php
$i = 0;
foreach($ProductLines as $Row) {
    if($attrs[1]['ref'] == "metais-sanitarios") {
        $Products = $Product->getAll($Product->Table.".status = '1' AND {$Product->Table}.line_id = '".$Row->id."' AND product_subcategory_id = '".$attrs[2]['id']."'", "ORDER BY display_order ASC");
    } else {
        $Products = $Product->getAll($Product->Table.".status = '1' AND {$Product->Table}.line_id = '".$Row->id."' AND product_category_id = '".$attrs[1]['id']."'", "ORDER BY display_order ASC");
    }
    if($Products) {
        if($i > 0) {
            // começa uma nova linha e separa a row
            ?>
                </div>
                <div class="clearfix line-sep fix-line-sep"></div>
                <hr class="line-sep" />
<?php
            $i = 0;
        } ?>
                <div class="the-line line-<?php echo $Row->ref; ?>">
                    <div class="<?php echo $attrs[1]['ref']; ?> line-title"><?php echo $Row->name; ?></div><br />
                    <div class="clearfix"></div>
                    <div class="line-description"><?php echo $Row->description ;?></div>
                    <div class="clearfix"></div>
<?php
        foreach($Products as $pRow) {
            if($i == 4) {
                //separa a row
                ?>
                    </div>
                    <div class="clearfix row-sep"></div>
                    <hr class="row-sep" />
<?php
                $i = 0;
            }
            
            
            if($i === 0 ){ ?>
                    <div class="row">
<?php } ?>
                        <div class="span3 ein-produkt the-ambient ambient-<?php echo $pRow->ambient; ?>">
                            <div class="product-title <?php echo $attrs[1]['ref']; ?>"><?php echo $pRow->name; ?></div>
                            <div class="product-image-div">
                                <a href="<?php echo MAIN_URL.$attrs[0]['ref'].'/'.$attrs[1]['ref'].'/'.$attrs[2]['ref'].'/'.$pRow->ref; ?>">
                                    <img src="<?php echo MAIN_URL.'images/products/listing/'.$pRow->listing_image;?>" />
                                </a>
                            </div>
                            <a href="<?php echo MAIN_URL.$attrs[0]['ref'].'/'.$attrs[1]['ref'].'/'.$attrs[2]['ref'].'/'.$pRow->ref; ?>"><img src="<?php echo MAIN_URL.'images/vejamais.png'; ?>" /></a>
                        </div>
<?php
            $i++;
        }
        ?>
                    </div>
<?php
    }
}
if($i > 0) {
    echo "</div>";
}
?>