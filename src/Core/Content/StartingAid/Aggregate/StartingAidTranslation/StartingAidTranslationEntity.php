<?php declare(strict_types=1);

namespace WucPluginStartingAid\Core\Content\StartingAid\Aggregate\StartingAidTranslation;

use Shopware\Core\Framework\DataAbstractionLayer\TranslationEntity;
use WucPluginStartingAid\Extension\Content\Product\StartingAidExtensionEntity;

class StartingAidTranslationEntity extends TranslationEntity
{
    protected string $startingAidExtensionId;

    protected ?string $headline;

    protected StartingAidExtensionEntity $startingAidExtension;

    public function getStartingAidExtensionId(): string
    {
        return $this->startingAidExtensionId;
    }

    public function setStartingAidExtensionId(string $startingAidExtensionId): void
    {
        $this->startingAidExtensionId = $startingAidExtensionId;
    }

    public function getHeadline(): ?string
    {
        return $this->headline;
    }

    public function setHeadline(string $headline): void
    {
        $this->headline = $headline;
    }

    public function getStartingAidExtension(): ?StartingAidExtensionEntity
    {
        return $this->startingAidExtension;
    }

    public function setStartingAidExtension(StartingAidExtensionEntity $startingAidExtension): void
    {
        $this->startingAidExtension = $startingAidExtension;
    }
}
