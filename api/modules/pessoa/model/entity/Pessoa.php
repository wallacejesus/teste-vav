<?php
class Pessoa{
	private $nome;
	private $sobrenome;
	private $dt_aniversario;
	private $telefone;


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
    public function setNome(String $nome)
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
    public function setSobrenome(String $sobrenome)
    {
        $this->sobrenome = $sobrenome;

        return $this;
    }

    /**
     * Gets the value of dt_aniversario.
     *
     * @return mixed
     */
    public function getDt_aniversario()
    {
        return $this->dt_aniversario;
    }

    /**
     * Sets the value of dt_aniversario.
     *
     * @param mixed $dt_aniversario the dt_aniversario
     *
     * @return self
     */
    public function setDt_aniversario(String $dt_aniversario)
    {
        $this->dt_aniversario = $dt_aniversario;

        return $this;
    }

    /**
     * Gets the value of telefone.
     *
     * @return mixed
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * Sets the value of telefone.
     *
     * @param mixed $telefone the telefone
     *
     * @return self
     */
    public function setTelefone(Array $telefone)
    {
        $this->telefone = $telefone;

        return $this;
    }
}
?>