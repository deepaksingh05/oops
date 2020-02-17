<?php

namespace Drupal\student;

use Drupal\classes\Classes;

/**
 * Student class.
 */
class Student extends Classes {
  /**
   * Get the value of studentId.
   */
  protected $studentId = 0;

  /**
   * Get the value of subjectId.
   */
  protected $subjectId = 0;

  /**
   * Get get the value of studentId.
   */
  public function getStudentId() {
    return $this->studentId;
  }

  /**
   * Set get the value of studentId.
   *
   * @return self
   */
  public function setStudentId($studentId) {
    $this->studentId = $studentId;

    return $this;
  }

  /**
   * Get get the value of subjectId.
   */
  public function getSubjectId() {
    return $this->subjectId;
  }

  /**
   * Set get the value of subjectId.
   *
   * @return self
   */
  public function setSubjectId($subjectId) {
    $this->subjectId = $subjectId;

    return $this;
  }

  public function getStudentClass() {
    $query = database()->select('user__field_school', 'ufs');
    $query->fields('ufs', ['field_school_target_id']);
    $query->join('taxonomy_term_field_data', 'ttfd', 'ttfd.tid = ufs.field_school_target_id');
    $query->addExpression('ttfd.name', 'schoolName');
    $query->condition('ufs.entity_id', $this->studentId);
    $userSchool = $query->execute()->fetchAll();
    return $userSchool;
  }

  public function getStudentBySubject() {
    $query = database()->select('user__field_school', 'ufs');
    $query->fields('ufs', ['field_school_target_id']);
    $query->join('taxonomy_term_field_data', 'ttfd', 'ttfd.tid = ufs.field_school_target_id');
    $query->addExpression('ttfd.name', 'schoolName');
    $query->condition('ufs.entity_id', $this->subjectId);
    $studentBySubject = $query->execute()->fetchAll();
    return $studentBySubject;
  }

}
