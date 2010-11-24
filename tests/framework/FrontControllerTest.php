<?php
require_once 'fixture/TestController.php';
require_once 'fixture/TestView.php';

class FrontControllerTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers FrontController::__construct
     * @covers FrontController::dispatch
     * @covers ControllerFactory::getController
     */
    public function testDispatchingWorksCorrectly()
    {
        $request  = new Request(array('REQUEST_URI' => '/'));
        $response = new Response;
        $front    = new FrontController($request, $response);
        $router   = new Router(new ControllerFactory);

        $router->addRoute('/', 'TestController');

        $this->assertType('TestView', $front->dispatch($router));
    }
}