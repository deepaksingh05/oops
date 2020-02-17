<?php

namespace Drupal\teacher;

use Drupal\classes\Classes;

/**
 * Teacher class.
 */
class Teacher extends Classes {

  /**
   * Get the value of teacherId.
   */
  protected $teacherId = 0;

  /**
   * Get the value of designationId.
   */
  protected $designationId = '';

  /**
   * Get the value of subjectId.
   */
  protected $subject = '';

  /**
   * Get get the value of teacherId.
   */
  public function getTeacherId() {
    return $this->teacherId;
  }

  /**
   * Set get the value of teacherId.
   *
   * @return self
   */
  public function setTeacherId($teacherId) {
    $this->teacherId = $teacherId;

    return $this;
  }

  /**
   * Get get the value of designationId.
   */
  public function getDesignationId() {
    return $this->designationId;
  }

  /**
   * Set get the value of designationId.
   *
   * @return self
   */
  public function setDesignationId($designationId) {
    $this->designationId = $designationId;

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

  public function getAllTeacher() {
    $query = database()->select('taxonomy_term_field_data', 'ttfd');
    $query->fields('ttfd', ['teacher']);
    $query->condition('ttfd.vid', $this->classId);
    $allTeacher = $query->execute()->fetchAll();
    return $allTeacher;
  }

  public function getTeacherClass() {
    $query = database()->select('taxonomy_term_field_data', 'ttfd');
    $query->fields('ttfd', ['class']);
    $query->condition('ttfd.vid', $this->teacherId);
    $teacherClass = $query->execute()->fetchAll();
    return $teacherClass;
  }

  public function getTeacherByDesignation() {
    $query = database()->select('taxonomy_term_field_data', 'ttfd');
    $query->fields('ttfd', ['designation']);
    $query->condition('ttfd.vid', $this->designationId);
    $teacherDesignation = $query->execute()->fetchAll();
    return $teacherDesignation;
  }

  public function getTeachersBySubject() {
    $query = database()->select('taxonomy_term_field_data', 'ttfd');
    $query->fields('ttfd', ['subject']);
    $query->condition('ttfd.vid', $this->subjectId);
    $teachersBySubject = $query->execute()->fetchAll();
    return $teachersBySubject;
  }

}
