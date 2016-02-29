<?php
/**
 * @author Brian Sandes
 * brian.sandes@gmail.com
 * Servus! Open-Source Development Framework
 *
 */

$ParentProductCategory = new ProductCategory();
$ProductCategory = new ProductCategory();
$ProductLine = new ProductLine();
$ProductImage = new ProductImage();
$Product = new Product();

$ProductCategory->get((int)$Id);
$ParentProductCategory->get((int)$ProductCategory->parent);

if($attrs[2]['ref'] == "linhas" || $attrs[2]['ref'] == "duchas" || $attrs[2]['ref'] == "misturadores" || $attrs[2]['ref'] == "monocomandos" || $attrs[2]['ref'] == "torneiras" || $attrs[2]['ref'] == "complementos") {
    $ProductLines = $ProductLine->getAll(null, "ORDER BY display_order ASC");
    if($ProductLines) {
        $View = 'product_lines.php';
    }
} else {
    $View = 'product_category.php';
    $Product = new Product();
    $Products = $Product->getAll($Product->Table.".status = '1' AND {$Product->Table}.product_category_id = '".$Id."'", "ORDER BY display_order ASC");
	
}

$Bread[0]['ref'] = "produtos";
$Bread[0]['label'] = "Produtos";

$Bread[1]['ref'] = "produtos/".$ParentProductCategory->ref."/".$ProductCategory->ref."#";
$Bread[1]['label'] = $ParentProductCategory->name;

$Bread[1]['ref'] = "produtos/".$ParentProductCategory->ref."".$ProductCategory->ref;
$Bread[1]['label'] = $ProductCategory->name;




$am = $_GET['am'];
$li = $_GET['li'];
if($_GET['getall'] == "1") {
    if($_GET['chg'] == "1") {
    $AvaiableLines = $Product->getLinesByAmbient("product_subcategory_id = '$Id'", "ORDER BY line ASC"); ?>
<script type="text/javascript">
    <?php
if($AvaiableLines) {
    echo '$("#busca-linha").html(\'<option value="0">Selecione...</option>';
    foreach($AvaiableLines as $Row){
        echo '<option value="'.$Row->the_line_id.'">'.$Row->line.'</option>';
    }
    echo '\');';
}
?>
</script>
<?php
    }
    include $ThemePath.'inc/lines.php';
    die();
} else
if($am != "" && $li != "") {
    if($_GET['chg'] == "1") {
    $AvaiableLines = $Product->getLinesByAmbient("product_subcategory_id = '$Id' AND ambient = '$am'", "ORDER BY line ASC"); ?>
<script type="text/javascript">
    <?php
if($AvaiableLines) {
    echo '$("#busca-linha").html(\'<option value="0">Selecione...</option>';
    foreach($AvaiableLines as $Row){
        echo '<option value="'.$Row->the_line_id.'">'.$Row->line.'</option>';
    }
    echo '\');';
}
?>
</script>
<?php
    }
    $ProductLines = $ProductLine->getAll($ProductLine->Table.".id = '$li'", "ORDER BY display_order ASC");
    include $ThemePath.'inc/line.php';
    die();
} else 
if($am != "") {
    if($_GET['chg'] == "1") {
    $AvaiableLines = $Product->getLinesByAmbient("product_subcategory_id = '$Id' AND ambient = '$am'", "ORDER BY line ASC"); ?>
<script type="text/javascript">
    <?php
if($AvaiableLines) {
    echo '$("#busca-linha").html(\'<option value="0">Selecione...</option>';
    foreach($AvaiableLines as $Row){
        echo '<option value="'.$Row->the_line_id.'">'.$Row->line.'</option>';
    }
    echo '\');';
}
?>
</script>
<?php
    }
    include $ThemePath.'inc/ambient.php';
    die();
} else
if($li != "") {
    $ProductLines = $ProductLine->getAll($ProductLine->Table.".id = '$li'", "ORDER BY display_order ASC");
    include $ThemePath.'inc/lines.php';
    die();
}


include $ThemePath.'index.html.php';
?>