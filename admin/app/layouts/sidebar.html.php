        <!-- sidebar start -->
        <div class="sidebar-background">
            <div class="primary-sidebar-background"></div>
        </div>
        <div class="primary-sidebar">
            <!-- Main nav -->
            <ul class="nav nav-collapse collapse nav-collapse-primary">
                <li<?php if($ServusController === "home") echo ' class="active"';?>>
                    <span class="glow"></span>
                    <a href="<?php echo ADMIN_URL; ?>">
                        <i class="icon-dashboard icon-2x"></i>
                        <span> Home</span>
                    </a>
                </li>
<?php
$controllers = get_controllers();
if($controllers) {
    foreach ($controllers as $controller) {
        $ThisController = Inflector::camelize($controller);
        $ThisController = new $ThisController();
        $link = $ThisController->Conf['mode'] == "G" ? $controller : Inflector::pluralize($controller);
        if($ThisController->Conf['mode'] === "G" || $Admin->can("list", $controller)) {
            $menuItems[$controller]['label'] = __($link);
            $menuItems[$controller]['link'] = "?a=".$link;
            $menuItems[$controller]['icon'] = $ThisController->Conf['icon'];
            if($ThisController->Conf['parent']) {
                $menuItems[$ThisController->Conf['parent']]['hasSubmenu'] = true;
                $menuItems[$ThisController->Conf['parent']]['dark-nav'] = " dark-nav";
                $menuItems[$ThisController->Conf['parent']]['collapse'] = "collapse";
                if($ServusController === $controller) {
                    $menuItems[$ThisController->Conf['parent']]['in'] = " in";
                    $menuItems[$ThisController->Conf['parent']]['active'] = " active";
                    $menuItems[$controller]['active'] = " active";
                }
            } else {
                if($ServusController === $controller) {
                    $menuItems[$controller]['active'] = " active";
                    if($menuItems[$controller]['hasSubmenu'] === true) {
                        $menuItems[$controller]['in'] = " in";
                    }
                }
            }

            if($ThisController->Conf['parent']) {
                $menuItems[$ThisController->Conf['parent']]['submenu'][$controller] = $menuItems[$controller];
                unset($menuItems[$controller]);
            }
        }
    }
    foreach($menuItems as $key => $item) {
        if($item['hasSubmenu'] && !$item['collapse']) {
            $menuItems[$key]['collapsed'] = " collapsed";
        }
    }

    foreach($menuItems as $key => $item) {
        if(is_array($item['submenu'])) {
            if(!$item['active']) $item['collapsed'] = " collapsed";
            if($item['active'] && $key === $ServusController) $item['sActive'] = " active";
            $menuHTML .= '                <li class="'.$item['active'].$item['dark-nav'].'">
                    <span class="glow"></span>
                    <a href="#submenu-'.$key.'" class="accordion-toggle'.$item['collapsed'].'" data-toggle="collapse">
                        <i class="'.$item['icon'].' icon-2x"></i>
                        <span>'.(empty($item['label']) ? __($key) : $item['label']).'</span>
                        <i class="icon-caret-down"></i>
                    </a>
                    <ul id="submenu-'.$key.'" class="'.$item['collapse'].' '.$item['in'].'">
                        <li class="'.$item['sActive'].'">
                            <a href="'.$item['link'].'">
                                <i class="icon-caret-right"></i>
                                 '.(empty($item['label']) ? __($key) : $item['label']).'
                            </a>
                        </li>
';
            foreach($item['submenu'] as $sKey => $sItem) {
                 $menuHTML .= '                        <li class="'.$sItem['active'].'">
                            <a href="'.$sItem['link'].'">
                                <i class="icon-caret-right"></i>
                                '.(empty($sItem['label']) ? __($key) : $sItem['label']).'
                            </a>
                        </li>';
            }
$menuHTML .= '                    </ul>
                </li>
';
            
        } else {
            $menuHTML .= '                <li class="'.$item['active'].'">
                    <span class="glow"></span>
                    <a href="'.$item['link'].'">
                        <i class="'.$item['icon'].' icon-2x"></i>
                        <span>'.(empty($item['label']) ? __($key) : $item['label']).'</span>
                    </a>
                </li>
';
        }
    }
    echo $menuHTML;
}

?>
            </ul>
        </div>
        <!-- sidebar end -->
