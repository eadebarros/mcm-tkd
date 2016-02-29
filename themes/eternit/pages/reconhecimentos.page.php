                            <!--page-->
                            <section id="page" class="post-menu">
                                <div class="container text-center">
                                    <div class="row">
                                        <div class="span12">
                                            <h1 class="title text-left hr-bottom">
                                                <?php echo $Page->title; ?>
                                                <div class="pull-right second-menu">
<?php menu("sobre-a-eternit", $Controller); ?>
                                                </div>
                                            </h1>
                                        </div>
                                    </div>
<?php include $ThemePath.'inc/breadcrumbs.php'; ?>
                                    <div class="row">
                                        <div class="span12 page-cover">
<?php if($Page->cover != "") { ?>
                                            <img src="images/cover/<?php echo $Page->cover; ?>" />
<?php } ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="span12 text-left">
                                            <div class="the-content">
                                                <?php echo $Page->content; ?>
                                                <p style="color:red;font-size: 16px;font-family: verdana;">
                                                    Busca por ano:
                                                    <select id="filter-prizes">
                                                        <option value="">Todos</option>
<?php
$Prize = new Prize();
foreach($Prize->getYears() as $Row) { ?>
                                                        <option value="<?php echo $Row->year; ?>"><?php echo $Row->year; ?></option>
<?php } ?>
                                                    </select>
                                                </p>
                                                <div class="le-grid">
                                                    <div style="width:75%;float:left;">
                                                        <table id="prizes">
                                                            <thead>
                                                                <tr>
                                                                    <th style="width: 5%;">
                                                                        ANO
                                                                    </th>
                                                                    <th style="width: 30%;">
                                                                        PR&Ecirc;MIO
                                                                    </th>
                                                                    <th style="width: 20%;">
                                                                        ENTIDADE
                                                                    </th>
                                                                    <th style="width: 35%;">
                                                                        CATEGORIA
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
<?php
$Prizes = $Prize->getAll("status = '1'");
foreach($Prizes as $Row) { ?>
                                                                <tr class="y-<?php echo $Row->year; ?>">
                                                                    <td>
                                                                        <strong><?php echo $Row->year; ?></strong>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $Row->prize; ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $Row->entity; ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $Row->category; ?>
                                                                    </td>
                                                                </tr>
<?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div>
                                                        <img src="<?php echo MAIN_URL."images/prizes.png"; ?>" style="width:23%;margin-left: 2%;"/>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
<?php include $ThemePath."inc/share.php"; ?>
                                </div>
                            </section>
