<?php

namespace Drupal\Tests\meeting;

use Drupal\meeting\Entity\MeetingEntity;
//use Drupal\KernelTests\KernelTestBase;
use PHPUnit\Framework\TestCase;

/**
 * Test basic CRUD operations for our Meeting entity type.
 *
 * @group meeting
 * @group examples
 *
 * @ingroup content_entity_example
 */
class MeetingTest extends TestCase {

  protected static $modules = ['meeting'];

  /**
   * Basic CRUD operations on a Meeting entity.
   */
  public function testEntity() {
    $this->installEntitySchema('meeting');
    $entity = MeetingEntity::create([
      'name' => 'Title',
      'venue' => 'Venue',
	  'description' => 'Description',
      'start_date' => '2020-07-27',
      'end_date' => '2020-07-27',
    ]);
    $this->assertNotNull($entity);
    $this->assertEquals(SAVED_NEW, $entity->save());
    $this->assertEquals(SAVED_UPDATED, $entity->set('venue', 'kolkata')->save());
    $entity_id = $entity->id();
    $this->assertNotEmpty($entity_id);
    $entity->delete();
    $this->assertNull(MeetingEntity::load($entity_id));
  }
}
