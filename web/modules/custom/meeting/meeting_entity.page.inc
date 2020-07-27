<?php

/**
 * @file
 * Contains meeting_entity.page.inc.
 *
 * Page callback for Meeting entities.
 */

use Drupal\Core\Render\Element;

/**
 * Prepares variables for Meeting templates.
 *
 * Default template: meeting_entity.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_meeting_entity(array &$variables) {
  // Fetch MeetingEntity Entity Object.
  $meeting_entity = $variables['elements']['#meeting_entity'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}
