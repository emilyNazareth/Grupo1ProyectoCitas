<?php 

use PHPUnit\Framework\TestCase;

include_once __DIR__ . '/../../model/UserModel.php';

class UserModelTest extends TestCase {

    /**
     * @var UserModel
     */
    protected $object;

    protected function setUp(): void {
        include_once __DIR__ . '/../../libs/configuration.php';
        $this->object = UserModel::singleton();
    }

    public function testRegister_professional() { // 1 ------------------------------------- 
        // Insertar un profesional con datos invalidos
        $response1 = $this->object->register_professional("", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "");
        // Se espera un resultado vacío
        $this->assertEmpty($response1); 
        
        // Insertar un profesional con cedula ya registrada
        $response2 = $this->object->register_professional(1234, 123, "Yer", "Leal", "TEST", '25348790', '25678743', '1995-03-30', 'F', 'soltera', 456, 1, 'A', 88888888, 'secundaria', 'psicologa', 'CPH78', 'Cartago', 'Alvarado', 'Pacayas', '800 metros este del BN');
        // Se espera un resultado vacío
        $this->assertEmpty($response2); 
    }

    public function testSearchProfessional() { // 2 ------------------------------------- 
        $response1 =  $this->object->searchProfessional("", "", "");
        // Se espera vacío
        $this->assertEmpty($response1);
    
        $response2 =  $this->object->searchProfessional(304970397, "Kevin", ""); 
        // Se espera un resultado 
        $this->assertEquals(304970397, $response2[0]['cedula']);
    }

    public function testUpdate_professional() { // 3 ------------------------------------- 
        // Insertar un profesional con datos invalidos
        $response1 = $this->object->update_professional("", "", "", "", "", "", "",
                "", "", "", "", "", "", "", "", "", "");
        // Se espera un resultado vacío
        $this->assertEmpty($response1); 
        
        // Insertar un profesional con cedula ya registrada
        $response2 = $this->object->update_professional(1234, 123, "Yer editado", "Leal", "TEST", '25348790', '25678743', '1995-03-30', 'F', 'soltera', 456, 1, 'A', 88888888, 'secundaria', 'psicologa', 'CPH78', 'Cartago', 'Alvarado', 'Pacayas', '800 metros este del BN');
        // Se espera un resultado vacío
        $this->assertEmpty($response2); 
    }
    
    public function testDelete_professional() { // 4 ------------------------------------- 
        $response1 = $this->object->delete_professional("000000000");
        // Se espera un 0
        $this->assertEquals(0, $response1);
 
        $response2 = $this->object->delete_professional(1234);
        $this->assertEquals(0, $response2);
    }

}
