<?php

namespace Drupal\meeting_form\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;
use Drupal\user\Controller;
use Drupal\user\Entity\User;
use Drupal\Core\Datetime\DrupalDateTime;
use Drupal\meeting\Entity\MeetingEntity;

use Drupal\Core\Session\AccountProxyInterface;
use Drupal\rest\ModifiedResourceResponse;
use Drupal\rest\Plugin\ResourceBase;
use Drupal\rest\ResourceResponse;
use Psr\Log\LoggerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Drupal\user_webservice\Controller\WebservicesController;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class MeetingAdd.
 */
class MeetingAdd extends FormBase {

	/**
	* {@inheritdoc}
	*/
	public function getFormId() {
		return 'meeting_form';
	}

	/**
	* {@inheritdoc}
	*/
	public function buildForm(array $form, FormStateInterface $form_state) {
	
	$form['#theme'] = 'meeting_form';
	
	$form['title'] = [
      '#type' => 'textfield',
	  '#required' => TRUE,
	  '#attributes' => array('class' => array('form-control'))	 
    ];
    $form['start_date'] = [
      '#type' => 'textfield',
	  '#default_value' => date("d-m-Y"),
	  '#required' => TRUE,
	  '#attributes' => array('class' => array('form-control')),
    ];
	
	$form['end_date'] = [
      '#type' => 'textfield',
	  '#default_value' => date("d-m-Y"),
	  '#required' => TRUE,
	  '#attributes' => array('class' => array('form-control')),
    ];
		
    $form['venue'] = [
      '#type' => 'textfield',
	  '#required' => TRUE,
	  '#attributes' => array('class' => array('form-control'))	 
    ];
	$form['description'] = [
      '#type' => 'textfield',
	  '#required' => TRUE,
	  '#attributes' => array('class' => array('form-control'))	 
    ];
    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
	  '#attributes' => array('class' => array('btn button_wh'))
    ];	
    return $form;
	}


	/**
	* {@call the theme}
	*/
	public function meeting_form(){

	return theme("meeting_form", array());
	}
	
	/**
	* {@inheritdoc}
	*/
	public function validateForm(array &$form, FormStateInterface $form_state) {
		parent::validateForm($form, $form_state);		
	}

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // save content.
	
    $start_date = strtotime($form_state->getValue('start_date'));
	//$start_time = $form_state->getValue('start_time');
	$start_dt = date('Y-m-d\TH:i:s',(int)$start_date);
	
	$end_date = strtotime($form_state->getValue('end_date'));
	//$end_time = $form_state->getValue('end_time');
	$end_dt = date('Y-m-d\TH:i:s',(int)$end_date);
		
	$title = $form_state->getValue('title');
	$venue = $form_state->getValue('venue');
	$description = $form_state->getValue('description');
	
	$content = MeetingEntity::create(['type'=>'meeting_example']);
	$content->set('name', $title);
	$content->set('start_date', $start_dt);
	$content->set('end_date', $end_dt);
	$content->set('venue', $venue);
	$content->set('description', $description);
	$content->setPublished(true);	
	$content->enforceIsNew();
	$content->save();
	drupal_set_message("Meeting data added successfully");
	if($form_state->getValue('op') == 'Submit'){
		$response = Url::fromUserInput('/meeting-list');			
		$form_state->setRedirectUrl($response);
	}	
  }
  
}
