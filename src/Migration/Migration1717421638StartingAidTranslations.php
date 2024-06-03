<?php declare(strict_types=1);

namespace WucPluginStartingAid\Migration;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Log\Package;
use Shopware\Core\Framework\Migration\MigrationStep;

/**
 * @internal
 */
#[Package('core')]
class Migration1717421638StartingAidTranslations extends MigrationStep
{
    public function getCreationTimestamp(): int
    {
        return 1717421638;
    }

    public function update(Connection $connection): void
    {
        $query = <<<SQL
CREATE TABLE IF NOT EXISTS `wuc_plugin_starting_aid_extension_translation` (
    `wuc_plugin_starting_aid_extension_id` BINARY(16) NOT NULL,
    `language_id` BINARY(16) NOT NULL,
    `headline` VARCHAR(255),
    `created_at` DATETIME(3) NOT NULL,
    `updated_at` DATETIME(3) NULL,
    PRIMARY KEY (`wuc_plugin_starting_aid_extension_id`, `language_id`),
    CONSTRAINT `fk_starting_aid_ext_trans_ext_id` FOREIGN KEY (`wuc_plugin_starting_aid_extension_id`)
        REFERENCES `wuc_plugin_starting_aid_extension` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `fk_starting_aid_ext_trans_lang_id` FOREIGN KEY (`language_id`)
        REFERENCES `language` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
)
    ENGINE = InnoDB
    DEFAULT CHARSET = utf8mb4
    COLLATE = utf8mb4_unicode_ci;
SQL;
        $connection->executeStatement($query);
    }

    public function updateDestructive(Connection $connection): void
    {
        // No destructive updates for this migration
    }
}
