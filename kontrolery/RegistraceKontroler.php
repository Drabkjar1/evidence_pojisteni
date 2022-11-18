<?php

/**
 * Kontroler pro registraci
 */
class RegistraceKontroler extends Kontroler
{
    public function zpracuj(array $parametry) :void
    {
                // Hlavička stránky
                $this->hlavicka['titulek'] = 'Registrace pojištěnce';
                if ($_POST)
                {
                        try
                        {
                                $spravceUzivatelu = new SpravceUzivatelu();
                                $spravceUzivatelu->registruj($_POST['jmeno'], $_POST['heslo'], $_POST['heslo_znovu'], $_POST['rok']);
                                $spravceUzivatelu->prihlas($_POST['jmeno'], $_POST['heslo']);

                                $this->pridejZpravu('Registrace byla úspěšná');
                                $this->presmeruj('administrace');
                        }
                        catch (ChybaUzivatele $chyba)
                        {
                                $this->pridejZpravu($chyba->getMessage());
                        }
                }
                // Nastavení šablony
                $this->pohled = 'registrace';
    }
}
?>
