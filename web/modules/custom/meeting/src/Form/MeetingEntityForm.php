<?php

namespace Drupal\meeting\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Form controller for Meeting edit forms.
 *
 * @ingroup meeting
 */
class MeetingEntityForm extends ContentEntityForm {

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    /* @var $entity \Drupal\meeting\Entity\MeetingEntity */
    $form = parent::buildForm($form, $form_state);

    $entity = $this->entity;
	/* $form['langcode'] = [
      '#title' => $this->t('Language'),
      '#type' => 'language_select',
      '#default_value' => $entity->getUntranslated()->language()->getId(),
      '#languages' => Language::STATE_ALL,
    ]; */
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $entity = $this->entity;
	$form_state->setRedirect('entity.meeting_entity.collection');
	$entity = $this->getEntity();
    $entity->save();
    /* $status = parent::save($form, $form_state);

    switch ($status) {
      case SAVED_NEW:
        drupal_set_message($this->t('Created the %label Meeting.', [
          '%label' => $entity->label(),
        ]));
        break;

      default:
        drupal_set_message($this->t('Saved the %label Meeting.', [
          '%label' => $entity->label(),
        ]));
    }
    $form_state->setRedirect('entity.meeting_entity.canonical', ['meeting_entity' => $entity->id()]); */
  }

}
