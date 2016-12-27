<?php


namespace Base\Navigation;

use Zend\Navigation\Service\DefaultNavigationFactory;

class NavigationMenu extends DefaultNavigationFactory {

    /**
     * @return string
     */
    protected function getName() {
        return 'navigationMenu';
    }

}
