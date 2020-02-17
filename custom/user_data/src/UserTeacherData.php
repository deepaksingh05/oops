<?php

namespace Drupal\user_data;

use Drupal\school\School;
use Drupal\classes\Classes;
use Drupal\teacher\Teacher;

/**
 * User Teacher Data.
 */
class UserTeacherData {


  /**
   * Get All School Data.
   */
  public function getAllSchoolTeacherData() {
    // Current School Id.
    $schoolId = $this->currentSchoolId->id();
    $new_user_object = new School($schoolId);
    $new_user_object->setSchoolId();
    $result['all_school'] = $new_user_object->getAllSchool();
    $result['all_student_school'] = $new_user_object->getAllTeacherInSchool();

    return $result;
  }

  /**
   * Get All Class Data.
   */
  public function getAllClassTeacherData() {
    // Current School Id.
    $schoolId = $this->currentSchoolId->id();
    // Current Class Id.
    $classId = $this->currentClassId->id();
    $new_user_object = new Classes($classId);
    $new_user_object->setClassId();
    $result['all_class_in_school'] = $new_user_object->getAllClasses($schoolId);
    $result['all_student_class'] = $new_user_object->getAllStudentInClass();

    return $result;
  }

  /**
   * Get All Teacher By Subject.
   */
  public function getAllTeacherBySubjectData() {
    // Current Subject Id.
    $subjectId = $this->currentSubjectId->id();
    $new_user_object = new Teacher($subjectId);
    $new_user_object->setSubjectId();
    $result['all_teacher_in_subject'] = $new_user_object->getTeachersBySubject();

    return $result;
  }

  /**
   * Get All Teacher By Designation.
   */
  public function getAllTeacherByDesignationData() {
    // Current Designation Id.
    $designationId = $this->currentDesignationId->id();
    $new_user_object = new Teacher($designationId);
    $new_user_object->setDesignationId();
    $result['all_teacher_by_designation'] = $new_user_object->getTeacherByDesignation();

    return $result;
  }

  /**
   * Get All Student By Subject.
   */
  public function getCurrentStudentSchool() {
    // Current Teacher Id.
    $teacherId = $this->currentTeacherId->id();
    $school_obj = new School();
    $school_obj->teacherId = $teacherId;
    $result['all_student_in_subject'] = $school_obj->getStudentSchool();

    return $result;
  }

}
