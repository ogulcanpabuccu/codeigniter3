<?php
class kullanici_model extends CI_Model
{
    public function kullanicilar($data = [])
    {
        $query = $this->db->get('kullanici');
        return $query->result();
    }
    public function sorular()
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

    public function cevapbul($id = 0)
    {

        $this->db->select('*');
        $this->db->from('cevap c');
        $this->db->join('kullanici k', 'k.kullanici_id = c.cevaplayan_id', 'left');
        $this->db->where("c.soru_id", $id);
        return $this->db->get()->result();
    }

    public function sorudetay($id = 0)
    {

        return $this->db->where("id", $id)->get("soru")->row();
    }

    public function cevapsayi()
    {


        $this->db->select * ',' ("SELECT COUNT (*) from cevap c where s.id=c.soru_id")' as cevapsayi',
       ("SELECT cevaplama_zamanı from cevap ct where s.id=ct.soru_id order cevaplama_zamanı DESC LIMIT 1") 'as soncevapzamani';
        $this->db->from('soru s');

        return $this->db->get()->result();

    }
}
