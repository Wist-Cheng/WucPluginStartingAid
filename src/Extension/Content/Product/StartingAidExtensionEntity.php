<?php declare(strict_types=1);

namespace WucPluginStartingAid\Extension\Content\Product;

use Shopware\Core\Content\Product\ProductEntity;
use Shopware\Core\Framework\DataAbstractionLayer\Entity;
use Shopware\Core\Framework\DataAbstractionLayer\EntityIdTrait;

class StartingAidExtensionEntity extends Entity
{

    use EntityIdTrait;

    /**
     * @var string|null
     */
    protected $headline;

    /**
     * @var string|null
     */
    protected $productId;

    protected ?ProductEntity $product = null;


    /**
     * @return string|null
     */
    public function getHeadline(): ?string
    {
        return $this->headline;
    }

    /**
     * @param string|null $headline
     */
    public function setHeadline(?string $headline): void
    {
        $this->headline = $headline;
    }

    /**
     * @return string|null
     */
    public function getProductId(): ?string
    {
        return $this->productId;
    }

    /**
     * @param string|null $productId
     */
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
}
