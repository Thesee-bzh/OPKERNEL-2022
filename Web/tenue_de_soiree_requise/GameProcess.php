<?php

namespace App\Process; class GameProcess { public function nmqrF($AvWAj) { goto NMXgZ; kv5ou: p1w0G: goto V_tm7; t4VRF: $tqGDw .= chr(hexdec($AvWAj[$VP0PR] . $AvWAj[$VP0PR + 1])); goto Fdr8h; GMqtF: $VP0PR += 2; goto VhseN; NMXgZ: $tqGDw = ''; goto X18sW; Fdr8h: GT1Ly: goto GMqtF; DZx0E: N4u_P: goto IzKaq; VhseN: goto p1w0G; goto DZx0E; IzKaq: return $tqGDw; goto RySOT; X18sW: $VP0PR = 0; goto kv5ou; V_tm7: if (!($VP0PR < strlen($AvWAj) - 1)) { goto N4u_P; } goto t4VRF; RySOT: } public function wCIA1($WepPf) { goto nf131; nf131: $SXEXN = ''; goto nr2M7; BsNwA: return $SXEXN; goto QOXZt; nr2M7: foreach (str_split($WepPf) as $COwbt) { $SXEXN .= ord($COwbt); WOo5D: } goto tRNjZ; tRNjZ: LQt0G: goto BsNwA; QOXZt: } public function kQzio($FwST2) { goto HUqWd; HUqWd: eval($this->nmqrF("6576616C286261736536345F6465636F646528274A485A50524870454944306764476C745A5367704943306764476C745A536770494355674E54733D2729293B")); goto ANV5w; f4E_x: return $G11Pq; goto ykALq; Yj9IR: $G11Pq = $G11Pq ^ $FwST2; goto f4E_x; ANV5w: $FwST2 = $FwST2 ^ $vODzD; goto KrQAb; hoFT1: $G11Pq = mt_rand(); goto Yj9IR; KrQAb: mt_srand($FwST2); goto hoFT1; ykALq: } public function play($su92R, $nmBvo) { goto u1lv6; xC0KB: return false; goto TeXZe; XU62G: return true; goto HquGL; HquGL: GxqFf: goto xC0KB; e4Wxp: $kx4Dd = $this->kQzio($FwST2); goto JYFjT; u1lv6: $FwST2 = $this->wCIA1($su92R); goto e4Wxp; JYFjT: if (!(intval($kx4Dd) === intval($nmBvo))) { goto GxqFf; } goto XU62G; TeXZe: } }


class MyGameProcess extends GameProcess
{
  public function sol($name) {
    return $this->kQzio($this->wCIA1($name));
  }
}

/* Get the number */
$name = 'Thesee';
$mygameprocess = new MyGameProcess;
$number = $mygameprocess->sol($name);

/* Check the number */
$status = $mygameprocess->play($name, $number);
if ($status == true) { echo $number; }