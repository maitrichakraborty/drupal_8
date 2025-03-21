<?php

namespace Drupal\meeting;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Access controller for the Meeting entity.
 *
 * @see \Drupal\meeting\Entity\MeetingEntity.
 */
class MeetingEntityAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    /** @var \Drupal\meeting\Entity\MeetingEntityInterface $entity */
    switch ($operation) {
      case 'view':
        if (!$entity->isPublished()) {
          return AccessResult::allowedIfHasPermission($account, 'view unpublished meeting entities');
        }
        return AccessResult::allowedIfHasPermission($account, 'view published meeting entities');

      case 'update':
        return AccessResult::allowedIfHasPermission($account, 'edit meeting entities');

      case 'delete':
        return AccessResult::allowedIfHasPermission($account, 'delete meeting entities');
    }

    // Unknown operation, no opinion.
    return AccessResult::neutral();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add meeting entities');
  }

}
