<?php

class DropLowestGradingStrategy extends GradingStrategy {
    /**
     * Returns final grade using passed exams.
     * Drops lowest exam result and then calculates the average between the rest
     * of them.
     * 
     * @author Alberto Miranda <alberto.php@gmail.com>
     * @param array $exams
     * @return int
     */
    public function grade($exams) {
        if (empty($exams)) return 0;
        
        //drop exam with lowest result
        $exams = $this->dropLowest($exams);
        
        $grade = parent::grade($exams);
        return $grade;
    }
    
    /**
     * Removes exam with lowest result and returns the rest.
     * 
     * @author Alberto Miranda <alberto.php@gmail.com>
     * @param array $exams
     * @return array
     */
    private function dropLowest($exams) {
        $lowestKey = null;
        $lowestResult = null; //lowest real result is 1
        foreach($exams as $key => $exam) {
            //check if we already have a lowest result
            $currentResult = $exam['result'];
            if ($lowestResult === null){
                //no previous result, set current one as lowest
                $lowestResult = $currentResult;
                $lowestKey = $key;
            } else {
                //check if current result is lower than lowest
                if ($currentResult < $lowestResult) {
                    //yup, set new lowest
                    $lowestResult = $currentResult;
                    $lowestKey = $key;
                }
            }
        }
        
        //remove lowest
        if ($lowestKey) {
            unset($exams[$lowestKey]);
        }
        
        return $exams;
    }
}
