<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Product extends CI_Controller {


    private $postFields = array('name', 'description', 'enabled');
    private $putFields = array('name', 'description', 'enabled');
    private $deleteFields = array('id');


    public function index() {

        $query = $this->db->query(' SELECT * FROM Product ');
        $results = array();

        foreach ($query->result() as $row) {
            $results['products'][] = (object) $row;
        }

        $results['enabledOptions'] = array('Enabled' => 1, 'Disabled' => 0);

        $this->load->template('product_index', $results);
    }


    public function create() {
        $this->load->template('product_create');
    }


    public function update() {

        // this isnt hugely reliable or secure, but I'm a CI newb
        $id = (int) end($this->uri->segments);

        // if post is empty then we error
        if (empty($_POST)) {
            return $this->index();
        // post isnt empty, so try and save it
        } else {
            // create an empty save fields array
            $saveFields = array();
            foreach ($this->postFields as $postField) {
                if (isset($_POST[$postField])) {
                    $saveFields[$postField] = $_POST[$postField];
                }
            }

            $this->db->where('id', $id);
            if ($this->db->update('Product', $saveFields)) {
                return $this->load->template('product_update_success');
            } else {
                $this->load->template('product_update_success');
            }
            exit;
        }
    }


    public function delete() {
        echo 'delete';
        exit;
    }


}