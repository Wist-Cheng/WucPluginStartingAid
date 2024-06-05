<?php declare(strict_types=1);

namespace WucPluginStartingAid\Migration;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Log\Package;
use Shopware\Core\Framework\Migration\MigrationStep;

/**
 * @internal
 */
#[Package('core')]
class Migration1717511229StartingAid extends MigrationStep
{
    public function getCreationTimestamp(): int
    {
        return 1717511229;
    }

    public function update(Connection $connection): void
    {
        $sql = <<<SQL
CREATE TABLE IF NOT EXISTS `starting_aid_extension` (
    `id` BINARY(16) NOT NULL,
    `product_id` BINARY(16) NOT NULL,
    `headline` VARCHAR(255) COLLATE utf8mb4_unicode_ci,
    `created_at` DATETIME(3) NOT NULL,
    `updated_at` DATETIME(3),
    PRIMARY KEY (`id`),
    KEY `fk.starting_aid_extension.product_id` (`product_id`),
    CONSTRAINT `fk.starting_aid_extension.product_id` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
SQL;

        // Execute the SQL statement
        $connection->executeStatement($sql);
    }
}
