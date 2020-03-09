<?php
namespace OCA\SkeletonApp\Tests\Unit\Controller;

use OCA\SkeletonApp\Controller\NoteApiController;

class NoteApiControllerTest extends NoteControllerTest {

    public function setUp(): void {
        parent::setUp();
        $this->controller = new NoteApiController(
            'skeleton_app', $this->request, $this->service, $this->userId
        );
    }

}
