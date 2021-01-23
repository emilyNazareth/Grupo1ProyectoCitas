<?php

class TestController {

    public function testRegisterProfessional() {
        
        require 'test/RegisterProfessionalTest.php';
        $registerProfessionalTest=new RegisterProfessionalTest();
        $registerProfessionalTest->testRegisterProfessionalModel();

        
    }
}