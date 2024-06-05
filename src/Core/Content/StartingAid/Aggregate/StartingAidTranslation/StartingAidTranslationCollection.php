<?php declare(strict_types=1);

namespace WucPluginStartingAid\Core\Content\StartingAid\Aggregate\StartingAidTranslation;

use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;


/**
 * @method void                          add(StartingAidTranslationEntity $entity)
 * @method void                          set(string $key, StartingAidTranslationEntity $entity)
 * @method StartingAidTranslationEntity[]    getIterator()
 * @method StartingAidTranslationEntity[]    getElements()
 * @method StartingAidTranslationEntity|null get(string $key)
 * @method StartingAidTranslationEntity|null first()
 * @method StartingAidTranslationEntity|null last()
 */
class StartingAidTranslationCollection extends EntityCollection
{
    protected function getExpectedClass(): string
    {
        return StartingAidTranslationEntity::class;
    }
}
