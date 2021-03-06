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

        public function testRegisterAppointmentFromOutside() {
        require 'test/RegisterAppointmentTest.php';
        $registerProfessionalTest = new RegisterAppointmentOutsideTest();
        $registerProfessionalTest->testRegisterFunctionaryOutside();
        $registerProfessionalTest->testRegisterAppointmentOutside();
    }
    
    public function testSearchAppointment() {
        require 'test/SearchAppointmentTest.php';
        $searchProfessionalTest = new SearchAppointmentTest();
        $searchProfessionalTest->testSearchAppointmentModel();
        $searchProfessionalTest->testSearchAppointmentModelTwo();
    }
    
    public function testReports() {
        require 'test/ReportsTest.php';
        $reportTest = new ReportsTest();
        $reportTest->testReportModel();
        
    }
    public function testModifyAppointment() {
        require 'test/ModifyAppointmentTest.php';
        $modifyAppointmentTest = new ModifyAppointmentTest();
        $modifyAppointmentTest->testModifyAppointmentModel();
        $modifyAppointmentTest->testModifyAppointmentModel2();
    }

    public function testCancelAppointment() {
        require 'test/CancelAppointmentTest.php';
        $cancelTest = new CancelAppointmentTest();
        $cancelTest->testCancelAppointmentModel();
    }

    public function testSearchAppointmentByIdAndIdentification(){
        require 'test/SearchAppointmentByIdAndIdentificationTest.php';
        $searchAppointmentByIdAndIdentificationTest = new SearchAppointmentByIdAndIdentificationTest();
        $searchAppointmentByIdAndIdentificationTest->testSearchAppointmentByIdAndIdentificationModel();
    }
    
    public function testAppointmentDetail(){
        require 'test/AppointmentDetailTest.php';
        $appointmetDetailTest = new AppointmentDetailTest();
        $appointmetDetailTest->testAppointmentDetailModel();
    }
    
    public function test_get_appointments_by_filter_professional(){
        require 'test/GetAppointmentByFilterProfessionalTest.php';
        $test = new GetAppointmentByFilterProfessionalTest();
        $test->test_get_appointments_by_filter_professional_Model();
    }
    
}
