<!--page-->
<section id="page" class="post-menu">
    <div class="container text-center">
        <div class="row">
            <div class="span12">
                <h1 class="title text-left hr-bottom">
                    <?php echo $Page->title; ?>
                    <div class="pull-right second-menu">
                        <?php menu("onde-encontrar", $Controller); ?>
                    </div>
                </h1>
            </div>
        </div>
        <?php include $ThemePath . 'inc/breadcrumbs.php'; ?>
        <div class="row">
            <div class="span12 page-cover">
                <?php if ($Page->cover != "") { ?>
                    <img src="images/cover/<?php echo $Page->cover; ?>" />
                <?php } ?>
            </div>
        </div>
        <div class="row">
            <div class="span12 text-left">
                <div class="the-content">
                    <?php echo $Page->content; ?>
                    <br />
                    <div style="float:left;">
                        <label>
                            <input type="radio" name="type" value="t-ms" id="tipo_assistencia_0" class="type-at filter-at" style="float:left; margin-top:15px;" />
                            <div style="float:left; ">
                                <img src="images/1.png" width="15" height="50" style="float:left;" />
                                <div  style="float:left; background:URL(images/3.png); height:50px; line-height:50px;font-weight: bold;">Metais Sanit&aacute;rios</div>
                                <img src="images/2.png" width="15" height="50"  style="float:left;" />
                            </div>
                        </label>
                    </div>
                    <div style="float:left;margin-left: 10px;">
                        <label>
                            <input type="radio" name="type" value="t-ls" id="tipo_assistencia_1" class="type-at filter-at" style="float:left; margin-top:15px;" />
                            <div style="float:left;">
                                <img src="images/1.png" width="15" height="50" style="float:left;" />
                                <div  style="float:left; background:URL(images/3.png); height:50px; line-height:50px;font-weight: bold;">Lou&ccedil;as Sanit&aacute;rias</div>
                                <img src="images/2.png" width="15" height="50"  style="float:left;" />
                            </div>
                        </label>
                    </div>
                    <div class="clearfix"></div>
                    <div>
                        <br />
                        <span style="color:#686767;font-family: verdana;font-size: 12px;font-weight: bold;">Regional:</span>
                        <select name="region" id="select-region" class="filter-at">
                            <option value="">Selecione</option>
<?php
$TechnicalAssistance = new TechnicalAssistance();
foreach($TechnicalAssistance->getRegions() as $Row) { ?>
                            <option value="r-<?php echo md5($Row->region); ?>"><?php echo $Row->region; ?></option>
<?php } ?>
                        </select>
                        <br />
                    </div>
                    <div class="clearfix"></div>
                    <div class="le-grid">
                        <table id="assistencias">
                            <thead>
                                <tr>
                                    <th style="width: 15%;">
                                        PRESTADORA
                                    </th>
                                    <th style="width: 35%;">
                                        ENDERE&Ccedil;O
                                    </th>
                                    <th style="width: 10%;">
                                        UF
                                    </th>
                                    <th style="width: 20%;">
                                        CIDADE
                                    </th>
                                    <th style="width: 10%;">
                                        CEP
                                    </th>
                                    <th style="width: 10%;">
                                        TELEFONE
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
<?php
$TechnicalAssistances = $TechnicalAssistance->getAll("status = '1'");
foreach($TechnicalAssistances as $Row) { ?>
                                <tr class="r-<?php echo md5($Row->region); ?> t-<?php echo $Row->type; ?>">
                                    <td>
                                        <?php echo $Row->name; ?>
                                    </td>
                                    <td>
                                        <?php echo $Row->address; ?>
                                    </td>
                                    <td>
                                        <?php echo $Row->state; ?>
                                    </td>
                                    <td>
                                        <?php echo $Row->city; ?>
                                    </td>
                                    <td>
                                        <?php echo $Row->cep; ?>
                                    </td>
                                    <td>
                                        <?php echo $Row->telephone; ?>
                                    </td>
                                </tr>
<?php } ?>
                            </tbody>
                        </table>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
        <?php include $ThemePath . "inc/share.php"; ?>
    </div>
</section>
