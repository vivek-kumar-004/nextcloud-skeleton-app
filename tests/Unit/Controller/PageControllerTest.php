<?php
namespace OCA\SkeletonApp\Controller;

use PHPUnit\Framework\TestCase;
use PHPUnit_Framework_TestCase;

use OCP\AppFramework\Http\TemplateResponse;

class PageControllerTest extends TestCase {

	private $controller;

	public function setUp(): void {
		$request = $this->getMockBuilder('OCP\IRequest')->getMock();
		$this->controller = new PageController('skeleton_app', $request);
	}


	public function testIndex() {
		$result = $this->controller->index();

		$this->assertEquals('main', $result->getTemplateName());
		$this->assertTrue($result instanceof TemplateResponse);
	}

}
