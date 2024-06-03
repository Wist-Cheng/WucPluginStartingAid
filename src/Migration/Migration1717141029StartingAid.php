<?php declare(strict_types=1);

namespace WucPluginStartingAid\Migration;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Migration\MigrationStep;

/**
 * @internal
 */
class Migration1717141029StartingAid extends MigrationStep
{
    public function getCreationTimestamp(): int
    {
        return 1717141029;
    }

    public function update(Connection $connection): void
    {
        $sql = <<<SQL
CREATE TABLE IF NOT EXISTS `wuc_plugin_starting_aid_extension` (
    `id` BINARY(16) NOT NULL,
    `product_id` BINARY(16) NOT NULL,
    `headline` VARCHAR(255) COLLATE utf8mb4_unicode_ci,
    `created_at` DATETIME(3) NOT NULL,
    `updated_at` DATETIME(3),
    PRIMARY KEY (`id`),
    KEY `fk.wuc_plugin_starting_aid_extension.product_id` (`product_id`),
    CONSTRAINT `fk.wuc_plugin_starting_aid_extension.product_id` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
SQL;

        // Execute the SQL statement
        $connection->executeStatement($sql);
    }

    public function updateDestructive(Connection $connection): void
    {
        // No destructive updates for this migration
    }
}
