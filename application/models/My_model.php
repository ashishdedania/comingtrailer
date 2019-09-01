<?php

class My_model extends CI_Model
{


    function __construct()
    {
        parent::__construct();
        $this->load->database();

    }

    /**
     * insertdata
     *
     * insert record into table.
     *
     * @param Data Array
     * @param Table Name
     */
    function insertdata($data, $tbname)
    {
        $this->db->trans_start();
        $this->db->insert($tbname, $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }

    /**
     * getmax
     *
     * get max value from table.
     *
     * @param Table Name
     * @param Parameter Array
     * @return array
     */
    function getmax($tbname, $param)
    {
        $query = 'select max(' . $param . ') as cnt from ' . $tbname;
        $Q = $this->db->query($query);
        $row = $Q->row_array();
        $id = $row['cnt'];
        if ($id == 0) {
            return $id = 1;
        } else {
            return $id += 1;
        }
    }

    /**
     * getall
     *
     * Get all Rrecord form table.
     *
     * @param Table Name
     */
    function getall($tbname)
    {
        $result = $this->db->get($tbname);
        return $result->result_array();
    }


    /**
     * getbyid
     *
     * Get record from table using parameter
     *
     * @param Table Name
     * @param Parameter Array
     */
    function getbyid($tbname, $prm)
    {

        $result = $this->db->get_where($tbname, $prm);

        return $result->result_array();
    }

    /**
     * deletedata
     *
     * Delete record from table using Parameter.
     *
     * @param Table name
     * @param Parameter for delete recored Like id=1
     */
    function deletedata($tbname, $prm)
    {

        $result = $this->db->delete($tbname, $prm);
        return $result;
    }

    /**
     * updatedata
     *
     * Update record into table.
     *
     * @param Table name
     * @param data array
     * @param Parameter array
     */

    function updatedata($tbname, $data, $parm)
    {

        $this->db->update($tbname, $data, $parm);
    }


    /**
     * getresult
     *
     * get query result in array.
     *
     * @param query
     */
    function getresult($query)
    {
        $result = $this->db->query($query);
        return $result->result_array();
    }


    function update_mapping() {
        // $map_data = $this->getresult('select video_map_music.*,music.music_name from video_map_music 
        // inner join music on music.id = video_map_music.music_id  
        // where video_map_music.personality_id is null');
        
        // foreach($map_data as $value) {
            
        //     $data = $this->getresult('select * from personality where personality.personality_name = "'.$value['music_name'].'"');
        //     $this->updatedata('video_map_music', array('personality_id' => $data[0]['id']), array('id' => $value['id']));
        // }
    }

}
