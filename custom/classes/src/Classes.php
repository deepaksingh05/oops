<?php

namespace Drupal\classes;

use Drupal\school\School;

/**
 * Classes class.
 */
class Classes extends School {

  /**
   * Get classId.
   */
  private $classId = 0;

  /**
   * Get classId.
   */
  public function getClassId() {
    return $this->classId;
  }

  /**
   * Set classId.
   *
   * @return self
   */
  public function setClassId($classId) {
    $this->classId = $classId;

    return $this;
  }

  /**
   * Get all classes in school.
   */
  public function getAllClasses(School $schoolId) {
    $query = database()->select('taxonomy_term_field_data', 'ttfd');
    $query->fields('ttfd', ['name']);
    $query->condition('ttfd.vid', $schoolId);
    $allClasses = $query->execute()->fetchAll();
    return $allClasses;
  }

  /**
   * Get all student in class.
   */
  public function getAllStudentInClass() {
    $query = database()->select('taxonomy_term_field_data', 'ttfd');
    $query->fields('ttfd', ['name']);
    $query->condition('ttfd.vid', $this->classId);
    $allStudentInClasses = $query->execute()->fetchAll();
    return $allStudentInClasses;
  }

  /**
   * Get all teacher in class.
   */
  public function getAllTeacherInClass() {
    $query = database()->select('taxonomy_term_field_data', 'ttfd');
    $query->fields('ttfd', ['name']);
    $query->condition('ttfd.vid', $this->classId);
    $allTeacherInClasses = $query->execute()->fetchAll();
    return $allTeacherInClasses;
  }

}
