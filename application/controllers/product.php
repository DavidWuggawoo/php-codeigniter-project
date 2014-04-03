<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Product extends CI_Controller {


    private $postFields = array('name', 'description', 'enabled');
    private $putFields = array('name', 'description', 'enabled');
    private $deleteFields = array('id');
    private $enabledOptions = array('Enabled' => 1, 'Disabled' => 0);


    public function index() {

        $query = $this->db->get('Product');
        $results = array();

        foreach ($query->result() as $row) {
            $results['products'][] = (object) $row;
        }

        $results['enabledOptions'] = $this->enabledOptions;

        $this->load->template('product_index', $results);
    }


    public function create() {

        // if post is empty then we error
        if (!empty($_POST)) {

            // create an empty save fields array
            $saveFields = array();
            foreach ($this->postFields as $postField) {
                if (isset($_POST[$postField])) {
                    $saveFields[$postField] = $_POST[$postField];
                }
            }
            $saveFields['created'] = time();

            // if we are able to insert
            if ($this->db->insert('Product', $saveFields)) {
                //show the user we saved
                $this->load->template('product_save_partial', array('message' => 'create', 'success' => true));
            } else {
                //we were unable to save
                $this->load->template('product_save_partial', array('message' => 'create', 'success' => false));
            }
            return;
        }

        $this->load->template('product_create', array('enabledOptions' => $this->enabledOptions));
    }


    public function update() {

        $this->getId();

        // if post is empty then we error
        if (empty($_POST)) {
            return $this->index();
        // post isnt empty, so try and save it
        } else {
            // create an empty save fields array
            $saveFields = array();
            foreach ($this->putFields as $postField) {
                if (isset($_POST[$postField])) {
                    $saveFields[$postField] = $_POST[$postField];
                }
            }

            // where by id
            $this->db->where('id', $this->id);
            // if we are able to save
            if ($this->db->update('Product', $saveFields)) {
                //show the user we saved
                $this->load->template('product_save_partial', array('message' => 'update', 'success' => true));
            } else {
                //we were unable to save
                $this->load->template('product_save_partial', array('message' => 'update', 'success' => false));
            }
        }
    }


    public function getId() {
        // this isnt hugely reliable or secure, but I'm a CI newb
        $this->id = (int) end($this->uri->segments);
    }


    public function delete() {

        $this->getId();

        if (is_numeric($this->id)) {
            $this->db->where('id', $this->id);
            $this->db->delete('Product');
            $this->load->template('product_save_partial', array('message' => 'delete', 'success' => true));
        } else {
            $this->load->template('product_save_partial', array('message' => 'delete', 'success' => false));
        }


    }


}