<?php
/**
 * Module CPT Class
 */

class Module{
    protected $id;

    function __construct($id)
    {
        $this->id = $id; 
    }


    /**
     * Get Module ID
     */
    public function get_id(){
        return $this->id;
    }

    /**
     * Get Module Title
     */
    public function get_title(){
        return get_the_title($this->id);
    }

    /**
     * Get Module Content ( Wordpres Editor )
     */
    public function get_content(){
        return get_the_content(null,null,$this->id);
    }


    /**
     * Get Module Slug
     */
    public function get_slug(){
        return get_post_field('post_name', $this->id);
    }

    /**
     * Get Module Courses
     */
    public  function get_courses(){
        global $wpdb;
        $query = $wpdb->get_results("SELECT pm.post_id FROM {$wpdb->prefix}postmeta pm , {$wpdb->prefix}posts p  WHERE pm.post_id = p.ID AND meta_key = '_course_module|||0|value' AND meta_value = 'post:module:$this->id'",ARRAY_A);
        return array_map(function($module){
            return $module['post_id'];
        },$query);
    }




    /**
     * Get Module Carbon Field Data
     */
    private function get_module_field($field){
        return carbon_get_the_post_meta($field);
    }
  
}