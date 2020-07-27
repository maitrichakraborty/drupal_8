<?php

namespace Drupal\meeting_form\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\JsonResponse;
use Drupal\taxonomy\Entity\Term;
use \Drupal\Core\Routing\TrustedRedirectResponse;
use Drupal\meeting\Entity\MeetingEntity;
/**
 * Class MeetingDelete.
 */
class MeetingDelete extends ControllerBase {

  /**
   * MeetingDelete.
   *
   * @return string
   *   Return Hello string.
   */
	public function meetingDelete() {
		$current_path = \Drupal::service('path.current')->getPath();
		$path_args = explode('/', $current_path);
		if($path_args[2] == 'meeting_delete')
		{
			$nid = $path_args[3];
			$contet = MeetingEntity::load($nid);
			if ($contet) {
			  $contet->delete();
			}
			
			drupal_set_message("Meeting data deleted successfully");
			return new TrustedRedirectResponse('/meeting_list');
		}
	} 	
}
