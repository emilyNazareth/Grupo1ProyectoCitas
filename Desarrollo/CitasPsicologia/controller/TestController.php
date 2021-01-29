<?php

class TestController {

    public function testRegisterProfessional() {
        require 'test/RegisterProfessionalTest.php';
        $registerProfessionalTest=new RegisterProfessionalTest();
        $registerProfessionalTest->testRegisterProfessionalModel();
    }

    public function testSearchProfessional() {
            require 'test/SearchProfessionalTest.php';
            $SearchProfessionalTest = new SearchProfessionalTest();
            $SearchProfessionalTest->testSearchProfessionalModel();
        }

    public function testDeleteProfessional() {
        require 'test/RegisterProfessionalTest.php';
        $registerProfessionalTest=new RegisterProfessionalTest();
        $registerProfessionalTest->testDeleteProfessionalModel();
    }
    
        public function testUpdateProfessional() {
        require 'test/RegisterProfessionalTest.php';
        $registerProfessionalTest=new RegisterProfessionalTest();
        $registerProfessionalTest->testUpdateProfessionalModel();
    }

            public function testObtainInfo() {
        require 'test/RegisterProfessionalTest.php';
        $registerProfessionalTest=new RegisterProfessionalTest();
        $registerProfessionalTest->testObtainInfoModel();
    }
}