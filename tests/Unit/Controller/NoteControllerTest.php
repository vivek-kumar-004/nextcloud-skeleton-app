<?php
namespace OCA\SkeletonApp\Tests\Unit\Controller;

use PHPUnit\Framework\TestCase;
use PHPUnit_Framework_TestCase;

use OCP\AppFramework\Http;
use OCP\AppFramework\Http\DataResponse;
use OCP\IRequest;

use OCA\SkeletonApp\Service\NoteNotFound;
use OCA\SkeletonApp\Service\NoteService;
use OCA\SkeletonApp\Controller\NoteController;


class NoteControllerTest extends TestCase {

    protected $controller;
    protected $service;
    protected $userId = 'john';
    protected $request;

    public function setUp(): void {
        $this->request = $this->getMockBuilder(IRequest::class)->getMock();
        $this->service = $this->getMockBuilder(NoteService::class)
            ->disableOriginalConstructor()
            ->getMock();
        $this->controller = new NoteController(
            'skeleton_app', $this->request, $this->service, $this->userId
        );
    }

    public function testUpdate() {
        $note = 'just check if this value is returned correctly';
        $this->service->expects($this->once())
            ->method('update')
            ->with($this->equalTo(3),
                    $this->equalTo('title'),
                    $this->equalTo('content'),
                   $this->equalTo($this->userId))
            ->will($this->returnValue($note));

        $result = $this->controller->update(3, 'title', 'content');

        $this->assertEquals($note, $result->getData());
    }


    public function testUpdateNotFound() {
        // test the correct status code if no note is found
        $this->service->expects($this->once())
            ->method('update')
            ->will($this->throwException(new NoteNotFound()));

        $result = $this->controller->update(3, 'title', 'content');

        $this->assertEquals(Http::STATUS_NOT_FOUND, $result->getStatus());
    }

}
