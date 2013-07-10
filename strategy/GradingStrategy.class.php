<?php

class GradingStrategy {
    /**
     * Default grading.
     * Returns final grade using passed exams.
     * Uses average.
     * 
     * @author Alberto Miranda <alberto.php@gmail.com>
     * @param array $exams
     * @return int
     */
    public function grade($exams) {
        $sum = 0;
        $totalExams = count($exams);
        if (!$totalExams) return 0;
        
        foreach($exams as $exam) {
            $sum += $exam['result'];
        }
        
        //calculate final grade as the AVERAGE result for all exams
        $finalGrade = $sum / $totalExams;
        return $finalGrade;
    }
}