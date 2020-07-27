<?php

namespace Drupal\meeting\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBundleBase;

/**
 * Defines the Meeting type entity.
 *
 * @ConfigEntityType(
 *   id = "meeting_entity_type",
 *   label = @Translation("Meeting type"),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\meeting\MeetingEntityTypeListBuilder",
 *     "form" = {
 *       "add" = "Drupal\meeting\Form\MeetingEntityTypeForm",
 *       "edit" = "Drupal\meeting\Form\MeetingEntityTypeForm",
 *       "delete" = "Drupal\meeting\Form\MeetingEntityTypeDeleteForm"
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\meeting\MeetingEntityTypeHtmlRouteProvider",
 *     },
 *   },
 *   config_prefix = "meeting_entity_type",
 *   admin_permission = "administer site configuration",
 *   bundle_of = "meeting_entity",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid"
 *   },
 *   links = {
 *     "canonical" = "/admin/structure/meeting_entity_type/{meeting_entity_type}",
 *     "add-form" = "/admin/structure/meeting_entity_type/add",
 *     "edit-form" = "/admin/structure/meeting_entity_type/{meeting_entity_type}/edit",
 *     "delete-form" = "/admin/structure/meeting_entity_type/{meeting_entity_type}/delete",
 *     "collection" = "/admin/structure/meeting_entity_type"
 *   }
 * )
 */
class MeetingEntityType extends ConfigEntityBundleBase implements MeetingEntityTypeInterface {

  /**
   * The Meeting type ID.
   *
   * @var string
   */
  protected $id;

  /**
   * The Meeting type label.
   *
   * @var string
   */
  protected $label;

}
