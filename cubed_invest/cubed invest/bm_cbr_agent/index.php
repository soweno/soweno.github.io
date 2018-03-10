<?php
    /**

     */
    class CBRAgent
    {
        protected $list = array();
     
        public function load()
        {
            $xml = new DOMDocument();

     
            if (@$xml->load($url))
            {
     
                $root = $xml->documentElement;
                $items = $root->getElementsByTagName('Valute');
     
                foreach ($items as $item)
                {
                    $code = $item->getElementsByTagName('CharCode')->item(0)->nodeValue;
                    $curs = $item->getElementsByTagName('Value')->item(0)->nodeValue;
                    $this->list[$code] = floatval(str_replace(',', '.', $curs));
                }
     
                return true;
            } 
            else
                return false;
        }
     
        public function get($cur)
        {
            return isset($this->list[$cur]) ? $this->list[$cur] : false;
        }
    }

$cbr = new CBRAgent();
$cbr->load();

function bm_usd_2_rub() {
    global $cbr;
    $res = $cbr->get('USD');
    if (!$res) {
        return false;
    }
    return (float)$res;
}

function bm_rub_2_usd() {
    $res = bm_usd_2_rub();
    if (!$res) {
        return false;
    }
    return (float)1.0/$res;
}

function bm_convert_usd_2_rub($sum) {
        $res = bm_usd_2_rub();
        if (!$res) {
            return false;
        }        
        return (float)$res * $sum;
}

function bm_convert_rub_2_usd($sum) {
        $res = bm_rub_2_usd();
        if (!$res) {
            return false;
        }        
        return (float)$res * $sum;
}

// var_dump(bm_usd_2_rub());
// var_dump(bm_rub_2_usd());

// var_dump(bm_convert_usd_2_rub(10.0));
// var_dump(bm_convert_rub_2_usd(10.0));