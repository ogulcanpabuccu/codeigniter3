<?php
class kullanici_model extends CI_Model
{
    public function kullanicilar($data = [])
    {
        $query = $this->db->get('kullanici');
        return $query->result();
    }
    public function sorular($sorular = [])
    {

        $query = $this->db->get('soru');
        return $query->result();
    }
    public function userCheck($email = '', $sifre = '')
    {
        $this->db->where('kullanici_mail', $email);
        $this->db->where('kullanici_password', $sifre);
        $query = $this->db->get('kullanici');
        return $query->result();
    }

    public function sorukaydet($sorudata = [])
    {

        $this->db->trans_start();

        $this->db->insert("soru", $sorudata);
        $soruId = $this->db->insert_id();

        $this->db->trans_complete();
        if ($this->db->trans_status()) {
            return $soruId;
        } else {
            return false;
        }
    }

    public function cevapkaydet($cevapdata = [])
    {



        $this->db->trans_start();
        $this->db->insert("cevap", $cevapdata);
        $cevapId = $this->db->insert_id();
        $this->db->trans_complete();
        if ($this->db->trans_status()) {
            return $cevapId;
        } else {
            return false;
        }
    }

    public function cevapbul($id=0)
    {
       
        $this->db->select('*');
        $this->db->from('kullanici k');
        $this->db->join('cevap c', 'k.kullanici_id = c.cevaplayan_id');
        $this->db->where("soru_id",$id)->get("c")->result();
        return $query = $this->db->get()->result();

       
       
       
       
       
              
       
       //return 



    }

    public function sorudetay($id = 0)
    {

        return $this->db->where("id", $id)->get("soru")->row();
    }
}
