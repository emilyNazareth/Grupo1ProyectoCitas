<?php

class TestController {

    public function testRegisterProfessional() {
        require 'test/RegisterProfessionalTest.php';
        $registerProfessionalTest = new RegisterProfessionalTest();
        $registerProfessionalTest->testRegisterProfessionalModel();
    }

    public function testSearchProfessional() {
        require 'test/SearchProfessionalTest.php';
        $SearchProfessionalTest = new SearchProfessionalTest();
        $SearchProfessionalTest->testSearchProfessionalModel();
    }

    public function testDeleteProfessional() {
        require 'test/DeleteProfessionalTest.php';
        $registerProfessionalTest = new DeleteProfessionalTest();
        $registerProfessionalTest->testDeleteProfessionalModel();
    }

    public function testModifyProfessional() {
        require 'test/ModifyProfessionalTest.php';
        $modifyProfessionalTest = new $modifyProfessionalTest();
        $modifyProfessionalTest->testModifyProfessionalModel();
    }

    public function testObtainInfo() {
        require 'test/RegisterProfessionalTest.php';
        $registerProfessionalTest = new RegisterProfessionalTest();
        $registerProfessionalTest->testObtainInfoModel();
    }

    public function testRegisterAppointment() {
        require 'test/RegisterAppointmentTest.php';
        $registerProfessionalTest = new RegisterAppointmentTest();
        $registerProfessionalTest->testRegisterFunctionaryModel();
        $registerProfessionalTest->testRegisterAppointmentModel();
    }
    public function testSearchAppointment() {
        require 'test/SearchAppointmentTest.php';
        $searchProfessionalTest = new RegisterAppointmentTest();
        $searchProfessionalTest->testSearchAppointmentModel();
        $searchProfessionalTest->testSearchAppointmentModelTwo();
    }

}
