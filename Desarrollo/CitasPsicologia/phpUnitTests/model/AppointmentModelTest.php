<?php 

use PHPUnit\Framework\TestCase;
//test merge
include_once __DIR__ . '/../../model/AppointmentModel.php';

class AppointmentModelTest extends TestCase {

    /**
     * @var AppointmentModel
     */
    protected $object;

    protected function setUp(): void {
        include_once __DIR__ . '/../../libs/configuration.php';
        $this->object = AppointmentModel::singleton();
    }

    public function testRegister_appointment() { // 1 ------------------------------------- 

        /* $response = $this->object->register_appointment( 302900456, "2021-12-06", 
          "10:00am", "300000888", 'UnitTest', "pendiente",
          "UnitTest", "UnitTest");*/
        
        $response = [];

        // Se espera respuesta vacía
        $this->assertEmpty($response);
    }

    public function testRegister_functionary() { // 2 ------------------------------------- 

        /* $response = $this->object->register_functionary(
          302900456, 'Username', "Lastname", "Second Lastname",
          "85858585", "89898989", "1999-12-06", 'M', "Tecnico",
          "Cartago", "Turrialba", "La Suiza", "Viudo(a)", "absd", "87878787",
          "example@gmail.com", "321", "2022-12-06", "nada", "robos",
          "central", "2019-12-06");*/

        $response = [];
        
        // Se espera respuesta vacía
        $this->assertEmpty($response);
    }

    public function testGet_appointments_by_filter() { // 3 ------------------------------------- 
        $response1 = $this->object->get_appointments_by_filter(302900101, 1023, "2021-02-22", "2021-02-24", 308880182, "M");

        // Se espera vacío
        $this->assertEmpty($response1);

        $response2 = $this->object->get_appointments_by_filter('', '', '', '', '', '');

        // Se espera una lista de resultados 
        $this->assertGreaterThanOrEqual(1, count($response2));
    }

    public function testGet_appointment_by_id_and_identification() { // 4 ------------------------------------- 
        // Remove the following lines when you implement this test.
        $response1 = $this->object->
                get_appointment_by_id_and_identification(1, 108490156);

        // Se espera vacío
        //$this->assertEmpty($response1);

        $response2 = $this->object->
                get_appointment_by_id_and_identification(28, 306240197);

        // Se espera un resultado 
        $this->assertEquals(28, $response2[0]['pk_id_cita']);
        $this->assertEquals(306240197, $response2[0]['pk_cedula_usuario']);
    }

    public function testGet_appointment_detail() {
        $response1 = $this->object->get_appointment_detail(0);

        // Se espera vacío
        $this->assertEmpty($response1);

        $response2 = $this->object->get_appointment_detail(4);

        // Se espera un resultado 
        $this->assertEquals(4, $response2[0]['pk_id_cita']);
    }

}
