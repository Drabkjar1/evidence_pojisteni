<?php
/**
 * Kontroler pro výpis pojištěnce nebo jejich seznamu
 */

class PojistenecKontroler extends Kontroler
{
        public function zpracuj(array $parametry) :void
        {
                
                // Vytvoření instance modelu, který nám umožní pracovat s pojistenci
                $spravcePojistencu = new SpravcePojistencu();
                $spravceUzivatelu = new SpravceUzivatelu();                                 
                $uzivatel = $spravceUzivatelu->vratUzivatele();
                $this->data['admin'] = $uzivatel && $uzivatel['admin'];
                
                // Je zadán pojistenec ke smazání
        if (!empty($parametry[1]) && $parametry[1] == 'odstranit')
        {
                $this->overUzivatele(true);
                $spravcePojistencu->odstranPojistence($parametry[0]);
                $this->pridejZpravu('Pojištěnec byl úspěšně odstraněn');
                $this->presmeruj('pojistenec');
        }                
                
                // Je zadán pojistenec
        if (!empty($parametry[0]))
            {
                // Získání pojistence
                $pojistenec = $spravcePojistencu->vratJednohoPojistence($parametry[0]);
                // Pokud nebyl pojistenec nalezen, přesměrujeme na ChybaKontroler
                if (!$pojistenec)
                        $this->presmeruj('chyba'); 
                
                // Naplnění proměnných pro šablonu 
                $this->data['jmeno'] = $pojistenec['jmeno'];
                $this->data['prijmeni'] = $pojistenec['prijmeni'];
                $this->data['vek'] = $pojistenec['vek'];
                $this->data['tel_cislo'] = $pojistenec['tel_cislo'];
               
                // Nastavení šablony
                $this->pohled = 'pojistenec';
            }
        else
        // Není zadán pojištěnec, vypíšeme všechny
            {
                $pojistenci = $spravcePojistencu->vratVsechnyPojistence();
                $this->data['pojistenci'] = $pojistenci;
                $this->pohled = 'pojistenec';
            }
        }    
}
