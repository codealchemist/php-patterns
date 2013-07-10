<?php

/**
 * Decorates Student for HTML output.
 */
class StudentTextDecorator extends Student {
    
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
     * Decorates and returns exams.
     * 
     * @return string
     */
    public function getExams() {
        //get data
        $data = parent::getExams();
        
        //decorate and return
        $decorated = '';
        foreach($data as $item) {
            if (!empty($decorated)) $decorated.= "\n    ";
            $line = '';
            foreach($item as $key => $value) {
                if (!empty($line)) $line.=',';
                $line.=$value;
            }
            $decorated.=$line;
        }
        return $decorated;
    }
}
