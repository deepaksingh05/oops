<?php

namespace Drupal\user_data;

use Drupal\school\School;
use Drupal\classes\Classes;
use Drupal\student\Student;

/**
 * User Student Data.
 */
class UserStudentData {


  /**
   * Get All School Data.
   */
  public function getAllSchoolStudentData() {
    // Get affiliates ID/Language.
    $schoolId = $this->currentSchoolId->id();
    $new_user_object = new School($schoolId);
    $new_user_object->setSchoolId();
    $result['all_school'] = $new_user_object->getAllSchool();
    $result['all_student_school'] = $new_user_object->getAllStudentInSchool();

    return $result;
  }

  /**
   * Get All Class Student Data.
   */
  public function getAllClassStudentData() {
    //Current School Id.
    $schoolId = $this->currentSchoolId->id();
    // Current Class Id .
    $classId = $this->currentClassId->id();
    $new_user_object = new Classes($classId);
    $new_user_object->setClassId();
    $result['all_class_in_school'] = $new_user_object->getAllClasses($schoolId);
    $result['all_student_in_class'] = $new_user_object->getAllStudentInClass();

    return $result;
  }

  /**
   * Get All Student By Subject.
   */
  public function getAllStudentBySubjectData() {
    // Current Subject Id.
    $subjectId = $this->currentSubjectId->id();
    $new_user_object = new Student($subjectId);
    $new_user_object->setSubjectId();
    $result['all_student_in_subject'] = $new_user_object->getStudentBySubject();

    return $result;
  }

  /**
   * Get All Student By Subject.
   */
  public function getCurrentStudentSchool() {
    // Current Student Id.
    $studentId = $this->currentStudentId->id();
    $school_obj = new School();
    $school_obj->studentId = $studentId;
    $result['all_student_in_subject'] = $school_obj->getStudentSchool();

    return $result;
  }

}
