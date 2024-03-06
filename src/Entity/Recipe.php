<?php

namespace Drupal\my_recipe\Entity;

use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\image\Entity\Image;

/**
 * Defines the Recipe entity.
 *
 * @ingroup recipe
 */
class Recipe extends ContentEntityBase {

  /**
   * {@inheritdoc}
   */
  public static function preCreate(EntityInterface $entity, $clone) {
    parent::preCreate($entity, $clone);
    $entity->setNewRevision();
  }

  /**
   * {@inheritdoc}
   */
  public function getBaseFieldDefinitions() {
    $fields = parent::getBaseFieldDefinitions();

    $fields['name'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Recipe Name'))
      ->setRequired(TRUE);

    $fields['field_ingredients'] = BaseFieldDefinition::create('text_long')
      ->setLabel(t('Ingredients'))
      ->setRequired(TRUE);

    $fields['field_instructions'] = BaseFieldDefinition::create('text_long')
      ->setLabel(t('Instructions'))
      ->setRequired(TRUE);

    $fields['field_images'] = BaseFieldDefinition::create('entity_reference')
      ->setLabel(t('Images'))
      ->setSetting('target_type', 'image')
      ->setSetting('style', 'medium')
      ->setCardinality(FieldInterface::CARDINALITY_UNLIMITED);

    return $fields;
  }

  /**
   * {@inheritdoc}
   */
  public function getEntityType() {
    return $this->entityType;
  }

  /**
   * {@inheritdoc}
   */
  public static function entityTypeLabel() {
    return t('Recipe');
  }
}
