<?php declare(strict_types=1);

namespace WucPluginStartingAid\Extension\Content\Product;

use Shopware\Core\Content\Product\ProductDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\EntityExtension;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\ApiAware;
use Shopware\Core\Framework\DataAbstractionLayer\Field\OneToOneAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;

class StartingAidExtension extends EntityExtension
{
    public const EXTENSION_NAME = 'wucPluginStartingAidExtension';

    public function extendFields(FieldCollection $collection): void
    {
        $collection->add(
            (new OneToOneAssociationField(
                self::EXTENSION_NAME,
                'id',
                'product_id',
                StartingAidExtensionDefinition::class,
                true))->addFlags(new ApiAware()),
        );
    }

    public function getDefinitionClass(): string
    {
        return ProductDefinition::class;
    }
}
