<?php declare(strict_types=1);

namespace WucPluginStartingAid\Migration;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Log\Package;
use Shopware\Core\Framework\Migration\MigrationStep;

/**
 * @internal
 */
#[Package('core')]
class Migration1717511236StartingAidTranslation extends MigrationStep
{
    public function getCreationTimestamp(): int
    {
        return 1717511236;
    }

    public function update(Connection $connection): void
    {
        $query = <<<SQL
    CREATE TABLE IF NOT EXISTS `starting_aid_extension_translation` (
        `starting_aid_extension_id` BINARY(16) NOT NULL,
        `language_id` BINARY(16) NOT NULL,
        `headline` VARCHAR(255),
        `created_at` DATETIME(3) NOT NULL,
        `updated_at` DATETIME(3),
        PRIMARY KEY (`starting_aid_extension_id`, `language_id`),
        CONSTRAINT `fk.starting_aid_extension_translation.starting_aid_extension_id` FOREIGN KEY (`starting_aid_extension_id`)
            REFERENCES `starting_aid_extension` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
        CONSTRAINT `fk.starting_aid_extension_translation.language_id` FOREIGN KEY (`language_id`)
            REFERENCES `language` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
    )
        ENGINE = InnoDB
        DEFAULT CHARSET = utf8mb4
        COLLATE = utf8mb4_unicode_ci;
    SQL;
        $connection->executeStatement($query);
    }
}
