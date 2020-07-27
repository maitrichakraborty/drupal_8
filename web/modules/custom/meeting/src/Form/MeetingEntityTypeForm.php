<?php

namespace Drupal\meeting\Form;

use Drupal\Core\Entity\EntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class MeetingEntityTypeForm.
 */
class MeetingEntityTypeForm extends EntityForm {

  /**
   * {@inheritdoc}
   */
  public function form(array $form, FormStateInterface $form_state) {
    $form = parent::form($form, $form_state);

    $meeting_entity_type = $this->entity;
    $form['label'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Label'),
      '#maxlength' => 255,
      '#default_value' => $meeting_entity_type->label(),
      '#description' => $this->t("Label for the Meeting type."),
      '#required' => TRUE,
    ];

    $form['id'] = [
      '#type' => 'machine_name',
      '#default_value' => $meeting_entity_type->id(),
      '#machine_name' => [
        'exists' => '\Drupal\meeting\Entity\MeetingEntityType::load',
      ],
      '#disabled' => !$meeting_entity_type->isNew(),
    ];

    /* You will need additional form elements for your custom properties. */

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $meeting_entity_type = $this->entity;
    $status = $meeting_entity_type->save();

    switch ($status) {
      case SAVED_NEW:
        drupal_set_message($this->t('Created the %label Meeting type.', [
          '%label' => $meeting_entity_type->label(),
        ]));
        break;

      default:
        drupal_set_message($this->t('Saved the %label Meeting type.', [
          '%label' => $meeting_entity_type->label(),
        ]));
    }
    $form_state->setRedirectUrl($meeting_entity_type->toUrl('collection'));
  }

}
