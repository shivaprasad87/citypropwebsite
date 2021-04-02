<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Blogs_model extends MY_Model {

    function __construct() {
        parent::__construct();
    }

    public function loadBlogCategories($perpage, $page, $count, $content = "") {
        $data = array();
        $this->db->select('*')
                ->from('blog_category');

        if ($content != NULL) {
            $this->db->or_like('name', trim($content));
        }
        $this->db->where('status', 1);
        $this->db->order_by("id", "DESC");
        if ($perpage != 0 || $page != 0) {
            $this->db->limit($perpage, (($page - 1) * $perpage));
        }
        $data = $this->db->get();
        if ($count) {
            return $data->num_rows();
        }
        return $data->result();
    }
    public function loadBlogslimit($limit=null) {
        $data = array();
        $this->db->select('b.*, bc.name as category_name')
                ->from('blog b')
                ->join('blog_category bc', 'b.category_id = bc.id');

        $this->db->where('bc.status', 1);
        $this->db->order_by("b.id", "DESC"); 
        $this->db->limit(3);
        $data = $this->db->get(); 
        return $data->result();
    }
     public function loadBlogTypes($perpage, $page, $count, $content = "") {
        $data = array();
        $this->db->select('*')
                ->from('blog_type');

        if ($content != NULL) {
            $this->db->or_like('name', trim($content));
        }
        $this->db->where('status', 1);
        $this->db->order_by("id", "DESC");
        // if ($perpage != 0 || $page != 0) {
        //     $this->db->limit($perpage, (($page - 1) * $perpage));
        // }
        $data = $this->db->get();
        if ($count) {
            return $data->num_rows();
        }
        return $data->result();
    }

    public function getBlog($blog_id) {
        return $this->db->select('b.*, bc.name as category_name')
                        ->from('blog b')
                        ->join('blog_category bc', 'b.category_id = bc.id')
                        ->where('b.id', $blog_id)
                        ->get()
                        ->row();
    }
     public function getBlogType($blog_type) {
        return $this->db->select('*')
                        ->from('blog') 
                        ->where($blog_type)
                        ->get()
                        ->result();
    }

    public function checkIfSlugExists($str, $id) {
        return $this->db->select('*')
                        ->from('blog')
                        ->where('slug', $str)
                        ->where('id !=', $id)
                        ->get()
                        ->row();
    }

    public function getTags($blog_id) {
        return $this->db->select('t.*')
                        ->from('tags t')
                        ->join('blog_tag_relation btr', 'btr.tag_id = t.id')
                        ->where('btr.blog_id', $blog_id)
                        ->get()
                        ->result();
    }

    public function loadBlogs($perpage, $page, $count, $content = "") {
        $data = array();
        $this->db->select('b.*, bc.name as category_name')
                ->from('blog b')
                ->join('blog_category bc', 'b.category_id = bc.id');

        if ($content != NULL) {
            $this->db->group_start();
            $this->db->or_like('b.title', trim($content));
            $this->db->or_like('bc.name', trim($content));
            $this->db->group_end();
        }
        $this->db->where('bc.status', 1);
        $this->db->order_by("b.id", "DESC");
        if ($perpage != 0 || $page != 0) {
            $this->db->limit($perpage, (($page - 1) * $perpage));
        }
        $data = $this->db->get();
        if ($count) {
            return $data->num_rows();
        }
        return $data->result();
    }

    public function checkIfCategSlugExists($str, $id) {
        return $this->db->select('*')
                        ->from('blog_category')
                        ->where('slug', $str)
                        ->where('id !=', $id)
                        ->get()
                        ->row();
    }

    public function getNextBlog($id)
    {
        return $this->db->order_by('id', 'asc')->where('id >', $id)->get('blog')->row();
    }
    public function getPrevBlog($id)
    {
        return $this->db->order_by('id', 'asc')->where('id <', $id)->get('blog')->row();
    }

}
