<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories_model extends CI_Model {

    var $table = 'categories';

    //set column field database for datatable orderable
    var $column_order = array('category_name','slug_category','order_category','category_description','created','modified',null);
    
    //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $column_search = array('category_name'); 
    
    // default order 
    var $order = array('category_id' => 'desc');

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    private function _get_datatables_query()
    {
        
        $this->db->from($this->table);

        $i = 0;
    
        // loop column 
        foreach ($this->column_search as $item) 
        {
            // if datatable send POST for search
            if($_POST['search']['value']) 
            {

                // first loop
                if($i===0) 
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
        
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function get_by_id($id)
    {
        $this->db->from($this->table);
        $this->db->where('category_id',$id);
        $query = $this->db->get();

        return $query->row();
    }

    public function save($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }

    public function delete_by_id($id)
    {
        $this->db->where('category_id', $id);
        $this->db->delete($this->table);
    }

    // Listing Category
    public function listCategories() {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->order_by('category_id','ASC');
        $query = $this->db->get();
        return $query->result_array();
    }      

    // Slug
    public function slug($slug_category) {
        $this->db->select('*'); 
        $this->db->from('categories');
        $this->db->where(array('status' => 'active','slug_category' => $slug_category));
        $this->db->order_by('category_id','DESC');
        $query = $this->db->get();
        return $query->row_array();
    }  

}
