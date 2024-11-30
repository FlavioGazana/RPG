<?php

require_once("Inventario.php");

class Jogador {
    
    private string $nickname;
    private int $nivel;
    private Inventario $inventario;

    public function __construct(string $nickname, int $nivel) {
        
        $this->setNickname($nickname);
        $this->setNivel($nivel);
        $this->inventario = new Inventario();
        $this->inventario->setCapacidadeMaxima($this->nivel);
    }

    public function getNickname(): string {

        return $this->nickname;
    }

    public function setNickname(string $nickname): void {

        if (empty($nickname)) {

            $this->nickname = "Jogador sem nome";

        } else{

            $this->nickname = $nickname;
        }
    }

    public function getNivel(): int {

        return $this->nivel;
    }

    public function setNivel(int $nivel): void {

        if ($nivel < 0) {

            $this->nivel = 0;

        } else{

            $this->nivel = $nivel;
            $this->inventario->setCapacidadeMaxima($this->nivel);
        }
    }

    public function coletarItem(Item $item): void {

        if ($this->nivel > 0) {

            $this->inventario->adicionarItem($item);
            
        } else{

            echo "Jogador ainda não tem nível suficiente para coletar itens.<br>";
        }
    }

    public function removerItem(Item $item): void {
        
        $this->inventario->removerItem($item);
    }

    public function subirNivel(): void {

        $this->setNivel($this->nivel + 1);
        echo "Jogador {$this->nickname} subiu para o nível {$this->nivel}!<br>";
    }

    public function getInventario(): Inventario {
        
        return $this->inventario;
    }
}