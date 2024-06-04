<?php declare(strict_types=1);

namespace WucPluginStartingAid\Extension\Content\Product;

use Shopware\Core\Content\Product\ProductDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\EntityDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\FkField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\ApiAware;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Field\IdField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\OneToOneAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\TranslatedField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\TranslationsAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use WucPluginStartingAid\Core\Content\StartingAid\Aggregate\StartingAidTranslation\StartingAidTranslationDefinition;

class StartingAidExtensionDefinition extends EntityDefinition
{
    public const ENTITY_NAME = 'wuc_plugin_starting_aid_extension';

    public function getEntityName(): string
    {
        return self::ENTITY_NAME;
    }

    public function getEntityClass(): string
    {
        return StartingAidExtensionEntity::class;
    }

    protected function defineFields(): FieldCollection
    {
        return new FieldCollection([
            (new IdField('id', 'Id'))->addFlags(new Required(), new PrimaryKey(), new ApiAware()),
            (new FkField('product_id', 'productId', ProductDefinition::class))->addFlags(new ApiAware()),
            (new TranslatedField('headline'))->addFlags(new ApiAware(), new Required()),

            new OneToOneAssociationField('product', 'product_id', 'id', ProductDefinition::class, false),
            (new TranslationsAssociationField(
                StartingAidTranslationDefinition::class,
                'wuc_plugin_starting_aid_id'
            ))->addFlags(new ApiAware(), new Required())


        ]);
    }
}
