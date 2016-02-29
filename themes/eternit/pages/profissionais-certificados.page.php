<!--page-->
<section id="page" class="post-menu">
    <div class="container text-center">
        <div class="row">
            <div class="span12">
                <h1 class="title text-left hr-bottom">
                    <?php echo $Page->title; ?>
                    <div class="pull-right second-menu">
                        <?php menu("cursos-e-treinamentos", $Controller); ?>
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
                    <div class="clearfix"></div>
                    <div>
                        <span style="color:#686767;font-family: verdana;font-size: 12px;font-weight: bold;">Certifica&ccedil;&atilde;o</span>
                        <select name="select-certi" id="s-certi" class="filter-cp">
                            <option value="">Selecione...</option>
<?php
$CertifiedProfessional = new CertifiedProfessional();
foreach($CertifiedProfessional->getCertifications() as $Row) { ?>
                            <option value="ce-<?php echo md5($Row->certification); ?>"><?php echo $Row->certification; ?></option>
<?php } ?>
                            <option value="">Todos</option>
                        </select>
                        
                        <span style="color:#686767;font-family: verdana;font-size: 12px;font-weight: bold;">Estado:</span>
                        <select name="select-state" id="s-state" class="filter-cp">
                            <option value="">Selecione...</option>
<?php
foreach($CertifiedProfessional->getStates() as $Row) { ?>
                            <option value="st-<?php echo md5($Row->state); ?>"><?php echo $Row->state; ?></option>
<?php } ?>
                            <option value="">Todos</option>
                        </select>
                                                
                        <span style="color:#686767;font-family: verdana;font-size: 12px;font-weight: bold;">Cidade:</span>
                        <select name="select-city" id="s-city" class="filter-cp">
                            <option value="">Selecione...</option>
<?php
foreach($CertifiedProfessional->getCities() as $Row) { ?>
                            <option value="ci-<?php echo md5($Row->city); ?>"><?php echo $Row->city; ?></option>
<?php } ?>
                            <option value="">Todos</option>
                        </select>
                        <br />
                    </div>
                    <div class="clearfix"></div>
                    <div class="le-grid">
                        <table id="profissionais">
                            <thead>
                                <tr>
                                    <th style="width: 15%;">
                                        NOME
                                    </th>
                                    <th style="width: 35%;">
                                        TELEFONE
                                    </th>
                                    <th style="width: 35%;">
                                        EMAIL
                                    </th>
                                    <th style="width: 10%;">
                                        BAIRRO
                                    </th>
                                    <th style="width: 10%;">
                                        CIDADE
                                    </th>
                                    <th style="width: 20%;">
                                        UF
                                    </th>
                                    <th style="width: 10%;">
                                        CERTIFICA&Ccedil;&Atilde;O
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
<?php
$CertifiedProfessionals = $CertifiedProfessional->getAll("status = '1'");
foreach($CertifiedProfessionals as $Row) { ?>
                                <tr class="ce-<?php echo md5($Row->certification); ?> st-<?php echo md5($Row->state); ?> ci-<?php echo md5($Row->city); ?>">
                                    <td>
                                        <?php echo $Row->name; ?>
                                    </td>
                                    <td>
                                        <?php echo $Row->telephone; ?>
                                    </td>
                                    <td>
                                        <?php echo $Row->email; ?>
                                    </td>
                                    <td>
                                        <?php echo $Row->region; ?>
                                    </td>
                                    <td>
                                        <?php echo $Row->city; ?>
                                    </td>
                                    <td>
                                        <?php echo $Row->state; ?>
                                    </td>
                                    <td>
                                        <?php echo $Row->certification; ?>
                                    </td>
                                </tr>
<?php } ?>
                                <tr class="default-row" style="display: none;">
                                    <td colspan="7">
                                        N&atilde;o existem profissionais cadastrados
                                    </td>
                                </tr>
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
