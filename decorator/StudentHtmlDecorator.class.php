<?php

/**
 * Decorates Student for HTML output.
 */
class StudentHtmlDecorator extends Student {
    
    /**
     * 
     * @param mixed $student
     */
    public function __construct($studentData) {
        if (!empty($studentData)) {
            if (is_object($studentData)){
                /* @var $studentData Student */
                $studentData = array(
                    'name' => $studentData->getName(),
                    'email' => $studentData->getEmail(),
                    'exams' => $studentData->getExams()
                );
            }
            
            parent::__construct($studentData);
        }
    }
    
    /**
     * Decorates and returns email.
     * 
     * @return string
     */
    public function getEmail() {
        //get data
        $data = parent::getEmail();
        
        //decorate and return
        $decorated = "<a href='mailto:$data'>&lt;$data&gt;</a>";
        return $decorated;
    }

    /**
     * Decorates and returns exams.
     * 
     * @return string
     */
    public function getExams() {
        //get data
        $data = parent::getExams();
        
        //decorate and return
        $decorated = '<table style="border:3px solid gray; border-collapse:collapse; border-spacing:0;">';
        foreach($data as $item) {
            $decorated.= '<tr>';
            foreach($item as $key => $value) {
                $decorated.="<td style='border:1px solid #ddd; padding:10px;'>$value</td>";
            }
            $decorated.= '</tr>';
        }
        $decorated.='</table>';
        return $decorated;
    }

    /**
     * Decorates and returns name.
     * 
     * @return string
     */
    public function getName() {
        //get data
        $data = parent::getName();
        
        //decorate and return
        $decorated = "<span style='color:orange; font-weight: bold'>$data</span>";
        return $decorated;
    }
}
