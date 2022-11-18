<?php

/**
 * Kontroler pro výpis pojištěnců
 */

class EditaceKontroler extends Kontroler
{
        
    public function zpracuj(array $parametry) :void
    {           
                // Editor je pouze pro administrátory
                $this->overUzivatele(true);
                // Hlavička stránky
                $this->hlavicka['titulek'] = 'Editace pojištěnců';
                // Vytvoření instance modelu
                $spravcePojistencu = new SpravcePojistencu();
                // Příprava prázdného pojištěnce                  
                $pojistenec = [
                        'pojistenec_id' => '',
                        'jmeno' => '',
                        'prijmeni' => '',
                        'vek' => '',
                        'tel_cislo' => '',                         
    ];
                    
                // Je odeslán formulář
                if ($_POST)
                {        
                        // Získání pojistence z $_POST
                        $klice = array('jmeno', 'prijmeni', 'vek', 'tel_cislo');
                        $pojistenec = array_intersect_key($_POST, array_flip($klice));                         
                        $pojistenec['vek']=$pojistenec['vek']; 
                        // Uložení pojistence do DB
                        $spravcePojistencu->ulozPojistence($_POST['pojistenec_id'], $pojistenec);
                        $this->pridejZpravu('Pojištěnec byl úspěšně uložen.');
                        $this->presmeruj('pojistenec');
                }
                // Je zadaný pojistenec k editaci
                else if (!empty($parametry[0]))
                {       
                        $nactenyPojistenec = $spravcePojistencu->vratJednohoPojistence($parametry[0]);
                        if ($nactenyPojistenec)
                                $pojistenec = $nactenyPojistenec;
                        else
                                $this->pridejZpravu('Pojištěnec nebyl nalezen');   
                }                                                               
                 
                $this->data['pojistenec'] = $pojistenec;
                $this->pohled = 'editace';
    }
} 
