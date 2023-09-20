<?php
/**
 * Speciality CPT Class
 */

class Speciality{
    protected $id;

    function __construct($id)
    {
        $this->id = $id; 
    }


    /**
     * Get Speciality ID
     */
    public function get_id(){
        return $this->id;
    }

    /**
     * Get Speciality Title
     */
    public function get_title(){
        return get_the_title($this->id);
    }

    /**
     * Get Speciality Content ( Wordpres Editor )
     */
    public function get_content(){
        return get_the_content(null,null,$this->id);
    }


    /**
     * Get Speciality Slug
     */
    public function get_slug(){
        return get_post_field('post_name', $this->id);
    }

    /**
     * Get Modules
     */
    public function get_modules(){
        global $wpdb;
        $query = $wpdb->get_results("SELECT pm.post_id FROM {$wpdb->prefix}postmeta pm , {$wpdb->prefix}posts p  WHERE pm.post_id = p.ID AND meta_key = '_module_speciality|||0|value' AND meta_value = 'post:speciality:$this->id'",ARRAY_A);
        return array_map(function($module){
            return $module['post_id'];
        },$query);
    }

    /**
     * Get Speciality Carbon Field Data
     */
    private function get_speciality_field($field){
        return carbon_get_post_meta($this->id,$field);
    }
  
}