<?php

/**
 * Třída poskytuje metody pro správu pojištěnců
 */

class SpravcePojistencu
{
         
        /**
         * Vrátí pojištěnce z databáze podle jeho id
         * @param string $pojistenec_id id pojištěnce k zobrazení
         * @return array Data pojištěnce z databáze jako asociativní pole
         */
        public function vratJednohoPojistence($pojistenec_id)  : array
        {
            return Db::dotazJeden('
                SELECT *
                FROM `pojistenci`
                WHERE `pojistenec_id` = ?
                ', array($pojistenec_id));
        }

        /**
         * Vrátí seznam pojištěnců v databázi
         * @return array Základní informace o všech pojištěncích jako numerické pole asociativních polí
         */
        public function vratVsechnyPojistence() : array
        {
            return Db::dotazVsechny('
                SELECT *
                FROM `pojistenci`
                ORDER BY `pojistenec_id` DESC
                ');
        }
        
        /**
         * Uloží pojištěnce do systému. Pokud je ID false, vloží nového, jinak provede editaci.
         * @param int|bool $pojistenec_id ID pojištěnce k editaci, FALSE pro vložení nového pojištěnce
         * @param array $pojistenec Asociativní pole s informacemi o pojištěnci
         * @return void
         */
        public function ulozPojistence($pojistenec_id, $pojistenec) :void
        {    
            if (!$pojistenec_id)
                Db::vloz('pojistenci', $pojistenec);
            else
                Db::zmen('pojistenci', $pojistenec, 'WHERE `pojistenec_id` = ?', array($pojistenec_id));
        }

        /**
         * Odstraní pojištěnce
         * @param string $pojistenec_id id pojištěnce k odstranění
         * @return void
         */
        public function odstranPojistence($pojistenec_id) : void
        {
            Db::dotaz('
                DELETE FROM `pojistenci`
                WHERE `pojistenec_id` = ?
            ', array($pojistenec_id));
        }
}
