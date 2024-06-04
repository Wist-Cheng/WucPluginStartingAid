<?php declare(strict_types=1);

namespace WucPluginStartingAid;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Plugin;
use Shopware\Core\Framework\Plugin\Context\UninstallContext;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Config\Loader\DelegatingLoader;
use Symfony\Component\Config\Loader\LoaderResolver;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\DirectoryLoader;
use Symfony\Component\DependencyInjection\Loader\GlobFileLoader;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class WucPluginStartingAid extends Plugin
{
    public function uninstall(UninstallContext $uninstallContext): void
    {
        if ($uninstallContext->keepUserData()) {
            parent::uninstall($uninstallContext);
            return;
        }

        $connection = $this->container->get(Connection::class);

        $sql = <<<SQL
            DROP TABLE IF EXISTS `wuc_plugin_starting_aid_extension_translation`;
            DROP TABLE IF EXISTS `wuc_plugin_starting_aid_extension`;
        SQL;

        $connection->executeStatement($sql);

        parent::uninstall($uninstallContext);
    }
}
