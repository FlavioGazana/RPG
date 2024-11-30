<?php

class Inventario {
    private int $capacidade_maxima = 20;
    private array $itens = [];

    public function getCapacidadeMaxima(): int {
        return $this->capacidade_maxima;
    }

    public function setCapacidadeMaxima(int $nivel): void {

        if ($nivel < 0) {

            $this->capacidade_maxima = 20;

        } else{

            $this->capacidade_maxima = 20 + (3 * $nivel);
        }
    }

    public function adicionarItem(Item $item): void {

        $ocupacao_atual = $this->calcularOcupacaoAtual();

        if ($ocupacao_atual + $item->getTamanho() > $this->capacidade_maxima) {

            echo "Capacidade máxima atingida, o item {$item->getNome()} não foi adicionado<br>";

        } else{

            $this->itens[] = $item;
            echo "Item {$item->getNome()} foi adicionado ao inventário!<br>";
        }
    }

    public function removerItem(Item $item): void {

        $encontrado = false;

        foreach ($this->itens as $indice => $item_atual) {

            if ($item_atual->getNome() === $item->getNome()) {

                unset($this->itens[$indice]);
                $this->itens = array_values($this->itens);
                $encontrado = true;
                echo "Item {$item->getNome()} foi removido do inventário!<br>";
                break;
            }
        }

        if (!$encontrado) {

            echo "Item {$item->getNome()} não foi encontrado no inventário!<br>";
        }
    }

    private function calcularOcupacaoAtual(): int {

        $ocupacao = 0;
        foreach ($this->itens as $item) {

            $ocupacao += $item->getTamanho();
        }
        
        return $ocupacao;
    }
}
