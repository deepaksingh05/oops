<?php

namespace Drupal\school;


/**
 * School class.
 */
class School {
  /**
   * Get the value of schoolId.
   */
  protected $schoolId = 0;

  /**
   * Get studentId.
   */
  protected $studentId = 0;

  /**
   * Get teacherId.
   */
  protected $teacherId = 0;

  /**
   * Get schoolId.
   */
  public function getSchoolId() {
    return $this->schoolId;
  }

  /**
   * Set schoolId.
   *
   * @return self
   */
  public function setSchoolId($schoolId) {
    $this->schoolId = $schoolId;

    return $this;
  }

  /**
   * Get All School.
   */
  public function getAllSchool() {
    $query = database()->select('taxonomy_term_field_data', 'ttfd');
    $query->fields('ttfd', ['name']);
    $query->condition('ttfd.vid', 'school');
    $allSchools = $query->execute()->fetchAll();
    return $allSchools;
  }

  /**
   * Get All Student In School.
   */
  public function getAllStudentInSchool() {
    $query = database()->select('user__field_school', 'ufs');
    $query->fields('ufs', ['field_school_target_id']);
    $query->condition('ufs.entity_id', $this->schoolId);
    $allStudent = $query->execute()->fetchAll();
    return $allStudent;
  }

  /**
   * Get All Teacher In School.
   */
  public function getAllTeacherInSchool() {
    $query = database()->select('user__field_school', 'ufs');
    $query->fields('ufs', ['field_school_target_id']);
    $query->condition('ufs.entity_id', $this->schoolId);
    $allTeacher = $query->execute()->fetchAll();
    return $allTeacher;
  }

  /**
   * Get Teacher's School.
   */
  public function getTeacherSchool() {
    $query = database()->select('user__field_school', 'ufs');
    $query->fields('ufs', ['field_school_target_id']);
    $query->join('taxonomy_term_field_data', 'ttfd', 'ttfd.tid = ufs.field_school_target_id');
    $query->addExpression('ttfd.name', 'schoolName');
    $query->condition('ufs.entity_id', $this->teacherId);
    $teacherSchool = $query->execute()->fetchAll();
    return $teacherSchool;
  }

  /**
   * Get Student's School.
   */
  public function getStudentSchool() {
    $query = database()->select('user__field_school', 'ufs');
    $query->fields('ufs', ['field_school_target_id']);
    $query->join('taxonomy_term_field_data', 'ttfd', 'ttfd.tid = ufs.field_school_target_id');
    $query->addExpression('ttfd.name', 'schoolName');
    $query->condition('ufs.entity_id', $this->studentId);
    $studentSchool = $query->execute()->fetchAll();
    return $studentSchool;
  }

}
