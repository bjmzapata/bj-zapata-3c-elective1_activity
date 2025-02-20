<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculateController extends Controller
{
    public function calculate($operation, $num1, $num2) //gumawa ako ng function na ang pangalan ay calculate na nagpapasa ng 3 na parameter. operation, num1 at num2
    {
    //dito chinecheck if number ba yung ininput ng user
      if (!is_numeric($num1) || !is_numeric($num2)) {
        return "Invalid input. Please enter numeric values only.";//ito ang lalabas kapag hindi number ang tinype sa url
    }
    
    //dito chiinecheck kung anong operation ang gagamti at dito icocompute yung result
    switch ($operation) {
        case 'add': 
            $result = $num1 + $num2; //ito ang naghahandle ng pag add
            break;
        case 'subtract': 
            $result = $num1 - $num2; //ito ang naghahandle ng pag minus
            break;
        case 'multiply': 
            $result = $num1 * $num2; //ito ang naghahandle ng pag multiply
            break;
        case 'divide': 
            if ($num2 == 0) {
                return "Cannot be divided by zero."; //ito ang lalabas pag di madidivide ag number sa 0
            }
            $result = $num1 / $num2; //ito ang naghahandle ng pag divide
            break;
        default:
            return "Invalid operation. Please use 'add', 'subtract', 'multiply', or 'divide'.";//ito ang lalabas pag hindi tama yung nilagay na operation
    }

   
    $boxColor = ($result % 2 == 0) ? 'GREEN' : 'green'; //ito na line is para sa background color ng box para sa result
    $resultText  = ($result % 2 == 0) ? 'GREEN' : 'green'; // ito ay para sa color ng text na RESULT
    
    $inputColor1 = ($num1 % 2 == 0) ? 'orange' : 'blue'; //ito naman para sa ininput na number kapag magiging color blue pag even color orange
    $inputColor2 = ($num2 % 2 == 0) ? 'orange' : 'blue'; // pareho lang din dito pero para ito sa pangalawang number na ininput

    // dito naman irereturn yung magiging output niya. Una ay yung sa mga ininput na number. Gumamit ako mh $inputColor1 and $inputColor2 para sa magiging kulay ng ininput na number
    // na nakdepende kung odd man or even. Next ay yung operation na nagamit. normal na pag output lag ang ginawa ko dito. Sunod naman ay para sa result. Gumamit din ako ng $resultText at
    //$boxColor para sa magiging kulay nila at yug text naman sa loob ng box ay ginawa kong white.
    return "
    <h2>Value 1: <span style='color: $inputColor1;'>$num1</span></h2> 
    <h2>Value 2: <span style='color: $inputColor2;'>$num2</span></h2>
    <h2>Operator: $operation</h2>
    <div style='display: flex; align-items: center;'>
        <h2 style='margin-right: 10px; color: $resultText;'>Result:</h2>
        <div style='background-color: $boxColor; padding: 20px; width: 250px; text-align: center;'>
            <h2 style='color: white;'>$result</h2>
        </div>
    </div>
"; 

    }
}


