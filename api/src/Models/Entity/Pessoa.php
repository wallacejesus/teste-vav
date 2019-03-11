<?php
class Pessoa{
   private $nome;
   private $sobrenome;
   private $dtAniversario;   
 
    /**
     * Gets the value of nome.
     *
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Sets the value of nome.
     *
     * @param mixed $nome the nome
     *
     * @return self
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Gets the value of sobrenome.
     *
     * @return mixed
     */
    public function getSobrenome()
    {
        return $this->sobrenome;
    }

    /**
     * Sets the value of sobrenome.
     *
     * @param mixed $sobrenome the sobrenome
     *
     * @return self
     */
    public function setSobrenome($sobrenome)
    {
        $this->sobrenome = $sobrenome;

        return $this;
    }



    /**
     * Gets the value of dtAniversario.
     *
     * @return mixed
     */
    public function getDtAniversario()
    {
        return $this->dtAniversario;
    }

    /**
     * Sets the value of dtAniversario.
     *
     * @param mixed $dtAniversario the dt aniversario
     *
     * @return self
     */
    public function setDtAniversario($dtAniversario)
    {
        $this->dtAniversario = $dtAniversario;

        return $this;
    }
}
?>