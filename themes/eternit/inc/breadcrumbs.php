        <div class="breadcrumbs linh" >
                    <a href="<?php echo MAIN_URL; ?>">Home</a>
<?php
foreach($Bread as $Row) { ?>
                    &gt; 
                    <a href="<?php echo ($Row['ref'] === "#") ? "#" : MAIN_URL.$Row['ref'] ; ?>">
						<?php 
                        if($Row == end($Bread)){echo "<b>";}
                        	echo $Row['label']; 
                        if($Row == end($Bread)){echo "</b>";}
                        ?>
                    </a>
<? } ?>
        </div>