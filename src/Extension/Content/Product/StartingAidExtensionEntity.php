<?php declare(strict_types=1);

namespace WucPluginStartingAid\Extension\Content\Product;

use Shopware\Core\Content\Product\ProductEntity;
use Shopware\Core\Framework\DataAbstractionLayer\Entity;
use Shopware\Core\Framework\DataAbstractionLayer\EntityIdTrait;
use WucPluginStartingAid\Core\Content\StartingAid\Aggregate\StartingAidTranslation\StartingAidTranslationCollection as Translations;

class StartingAidExtensionEntity extends Entity
{

    use EntityIdTrait;

    protected $headline;

    protected $productId;

    protected $translations;

    protected ?ProductEntity $product = null;

    public function getHeadline(): ?string
    {
        return $this->headline;
    }

    public function setHeadline(?string $headline): void
    {
        $this->headline = $headline;
    }

    public function getProductId(): ?string
    {
        return $this->productId;
    }

    public function setProductId(?string $productId): void
    {
        $this->productId = $productId;
    }

    public function getProduct(): ?ProductEntity
    {
        return $this->product;
    }

    public function setProduct(ProductEntity $product): void
    {
        $this->product = $product;
    }

    public function getTranslations(): ?Translations
    {
        return $this->translations;
    }

    public function setTranslations(Translations $translations): void
    {
        $this->translations = $translations;
    }
}
