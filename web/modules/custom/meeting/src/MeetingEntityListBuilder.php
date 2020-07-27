<?php

namespace Drupal\meeting;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;
use Drupal\Core\Link;

/**
 * Defines a class to build a listing of Meeting entities.
 *
 * @ingroup meeting
 */
class MeetingEntityListBuilder extends EntityListBuilder {


	/**
	* {@inheritdoc}
	*/
	public function buildHeader() {
		$header['id'] = $this->t('ID');
		$header['title'] = $this->t('Title');
		$header['start_date'] = $this->t('Start Date');
		$header['end_date'] = $this->t('End Date');
		$header['venue'] = $this->t('Venue');
		$header['description'] = $this->t('Description');
		return $header + parent::buildHeader();
	}

	/**
	* {@inheritdoc}
	*/
	public function buildRow(EntityInterface $entity) {
    /* @var $entity \Drupal\meeting\Entity\MeetingEntity */    
		$row['id'] = $entity->id();
		$row['title'] = $entity->name->value;
		$row['start_date'] = $entity->start_date->value;
		$row['end_date'] = $entity->end_date->value;
		$row['venue'] = $entity->venue->value;
		$row['description'] = $entity->description->value;
		return $row + parent::buildRow($entity);
	}

}
