<?php

class HighestGradingStrategy extends GradingStrategy {
    /**
     * Returns highest result in passed exams.
     * 
     * @author Alberto Miranda <alberto.php@gmail.com>
     * @param array $exams
     * @return int
     */
    public function grade($exams) {
        if (empty($exams)) return 0;
        
        //get and return highest result
        $bestExam = $this->getHighest($exams);
        $bestResult = $bestExam['result'];
        return $bestResult;
    }
    
    /**
     * Returns exam with highest result.
     * 
     * @author Alberto Miranda <alberto.php@gmail.com>
     * @param array $exams
     * @return array The exam with highest result
     */
    private function getHighest($exams) {
        $highestKey = null;
        $highestResult = null;
        foreach($exams as $key => $exam) {
            //check if we already have a highest result
            $currentResult = $exam['result'];
            if ($highestResult === null){
                //no previous result, set current one as highest
                $highestResult = $currentResult;
                $highestKey = $key;
            } else {
                //check if current result is higher than higher
                if ($currentResult > $highestResult) {
                    //yup, set new highest
                    $highestResult = $currentResult;
                    $highestKey = $key;
                }
            }
        }
        
        $highestResultExam = $exams[$highestKey];
        return $highestResultExam;
    }
}
