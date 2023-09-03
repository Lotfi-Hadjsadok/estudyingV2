<?php
/**
 * Course CPT Class
 */

class Course{
    protected $id;

    function __construct($id)
    {
        $this->id = $id; 
    }


    /**
     * Get Course ID
     */
    public function get_id(){
        return $this->id;
    }

    /**
     * Get Course Title
     */
    public function get_title(){
        return get_the_title($this->id);
    }

    /**
     * Get Course Content ( Wordpres Editor )
     */
    public function get_content(){
        return get_the_content(null,null,$this->id);
    }

    /**
     * Get Course Carbon Field Data
     */
    private function get_course_field($field){
        return carbon_get_the_post_meta($field);
    }

    /**
     * Get Course Module
     */
    public function get_module(){
        return $this->get_course_field('course_module');
    }

    /**
     * Get Course Files
     */
    public function get_files(){
        return array_map(function($repeater) {
            return  wp_get_attachment_url($repeater['course_file']);
        }, $this->get_course_field('course_data'));
    }
}