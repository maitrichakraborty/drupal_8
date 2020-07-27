<?php

namespace Drupal\meeting\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining Meeting entities.
 *
 * @ingroup meeting
 */
interface MeetingEntityInterface extends ContentEntityInterface, EntityChangedInterface, EntityOwnerInterface {

  // Add get/set methods for your configuration properties here.

 
  public function getCreatedTime();

  /**
   * Sets the Meeting creation timestamp.
   *
   * @param int $timestamp
   *   The Meeting creation timestamp.
   *
   * @return \Drupal\meeting\Entity\MeetingEntityInterface
   *   The called Meeting entity.
   */
  public function setCreatedTime($timestamp);

  /**
   * Returns the Meeting published status indicator.
   *
   * Unpublished Meeting are only visible to restricted users.
   *
   * @return bool
   *   TRUE if the Meeting is published.
   */
  public function isPublished();

  /**
   * Sets the published status of a Meeting.
   *
   * @param bool $published
   *   TRUE to set this Meeting to published, FALSE to set it to unpublished.
   *
   * @return \Drupal\meeting\Entity\MeetingEntityInterface
   *   The called Meeting entity.
   */
  public function setPublished($published);

}
