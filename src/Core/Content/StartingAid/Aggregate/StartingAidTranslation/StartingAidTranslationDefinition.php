<?php declare(strict_types=1);

namespace WucPluginStartingAid\Core\Content\StartingAid\Aggregate\StartingAidTranslation;

use Shopware\Core\Framework\DataAbstractionLayer\EntityTranslationDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Field\StringField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use WucPluginStartingAid\Extension\Content\Product\StartingAidExtensionDefinition;

class StartingAidTranslationDefinition extends EntityTranslationDefinition
{
    public const ENTITY_NAME = 'wuc_plugin_starting_aid_translation';

    public function getEntityName(): string
    {
        return self::ENTITY_NAME;
    }

    public function getEntityClass(): string
    {
        return StartingAidTranslationEntity::class;
    }

    public function getParentDefinitionClass(): string
    {
        return StartingAidExtensionDefinition::class;
    }

    protected function defineFields(): FieldCollection
    {
        return new FieldCollection([
            (new StringField('headline', 'headline'))->addFlags(new Required()),
        ]);
    }
}
