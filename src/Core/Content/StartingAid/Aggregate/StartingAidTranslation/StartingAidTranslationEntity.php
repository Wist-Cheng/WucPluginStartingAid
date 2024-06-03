<?php declare(strict_types=1);

namespace WucPluginStartingAid\Core\Content\StartingAid\Aggregate\StartingAidTranslation;

use Shopware\Core\Framework\DataAbstractionLayer\TranslationEntity;
use WucPluginStartingAid\Extension\Content\Product\StartingAidExtensionEntity;

class StartingAidTranslationEntity extends TranslationEntity
{
    protected string $wucStartingAidExtensionId;

    protected ?string $headline;

    protected StartingAidExtensionEntity $startingAidExtension;

    public function getWucStartingAidExtensionId(): string
    {
        return $this->wucStartingAidExtensionId;
    }

    public function setWucStartingAidExtensionId(string $wucStartingAidExtensionId): void
    {
        $this->wucStartingAidExtensionId = $wucStartingAidExtensionId;
    }

    public function getHeadline(): ?string
    {
        return $this->headline;
    }

    public function setHeadline(string $headline): void
    {
        $this->headline = $headline;
    }

    public function getStartingAidExtension(): StartingAidExtensionEntity
    {
        return $this->startingAidExtension;
    }

    public function setStartingAidExtension(StartingAidExtensionEntity $startingAidExtension): void
    {
        $this->startingAidExtension = $startingAidExtension;
    }
}
