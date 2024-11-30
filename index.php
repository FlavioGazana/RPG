<?php

require_once("Jogador.php");
require_once("Item.php");
require_once("Ataque.php");
require_once("Defesa.php");
require_once("Magia.php")



$item1 = new Ataque("Espada Grandona");
$item2 = new Defesa("Escudo Gordo");
$item3 = new Magia("Bolas");
$item4 = new Magia("Relâmpago macqueen");


$jogador1 = new Jogador("Flavio", 1);
$jogador2 = new Jogador("Mendonca", 2);


$jogador1->coletarItem($item1);
$jogador1->coletarItem($item2);
$jogador1->coletarItem($item3);
$jogador1->coletarItem($item4);


$jogador1->coletarItem(new Ataque("Machado de Assis"));


$jogador1->removerItem($item3);


$jogador1->subirNivel();
$jogador1->coletarItem(new Ataque("Machado"));

$jogador2->coletarItem($item2);
$jogador2->removerItem($item2);