<?php
class kullanici_model extends CI_Model
{
    public function kullanicilar($data = [])
    {
        $query = $this->db->get('kullanici');
        return $query->result();
    }

    public function userCheck($email = '', $sifre = '')
    {
        $this->db->where('kullanici_mail', $email);
        $this->db->where('kullanici_password', $sifre);
        //$this->db->from('kullanici'); query kısmında da tabloyu kontrol edebiliyormuşuz.
        $query = $this->db->get('kullanici');
        return $query->result();
    }

    public function sorukaydet($insert=[])
    {


        

    }
}
