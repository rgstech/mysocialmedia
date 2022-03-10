<?php

/**
 * Description of DataBase
 *
 * @author Rodrigo.Guimaraes
 * 
 */
 // Classe originalmente criada por William Pereira Alves 
//  para o livro Construindo uma Aplicação web Completa com PHP e MySQL
 // Modificada e adaptda por Rodrigo Guimarães (github: rgstech)
 // 
 // Class originally created by William Pereira Alves and modified and adapted by Rodrigo Guimarães (github: rgstech)

class DataBase
{

    protected $ConexaoBanco;
    protected $IdServidor;
    protected $NumeroUltimoErro;
    protected $DescricaoErro;
    protected $ComandoSQL;
    protected $PrevCommSQL; //comando anterior / previous command
    protected $DataSet;
    protected $NumeroRegistros;
    protected $Resultado;

    // Construtor
    function __construct($Servidor = "")
    {
        $this->ConexaoBanco     = NULL;
        $this->NumeroUltimoErro = -1;
        $this->DescricaoErro    = "";
        $this->DataSet          = NULL;
        $this->NumeroRegistros  = 0;

        if ($Servidor == "") {
            $this->IdServidor = "localhost";
        } else {
            $this->IdServidor = $Servidor;
        }
    }

    // Métodos públicos
    public function AbrirConexao()
    {
        //$this->ConexaoBanco = new mysqli($this->IdServidor, "root", "2020", "mysocialmedia"); // use essa linha aon inves a debaixo/ you should use this line instead of below

        $this->ConexaoBanco = new mysqli($this->IdServidor, "root", "2020", "mysocialmedia1"); // mudei para essa linha para funcionar em meu banco de dados local 
                                                                                               // changed to mysocialmedia1 to work in my local data server server

        if (mysqli_connect_errno() != 0) {
            $this->ConexaoBanco = NULL;
            $this->NumeroUltimoErro = mysqli_connect_errno();
            $this->DescricaoErro = mysqli_connect_error();
            return FALSE;
        } else {
            $this->ConexaoBanco->set_charset("utf8");
            return $this->ConexaoBanco;
        }
    }

    public function CodigoErro()
    {
        return $this->NumeroUltimoErro;
    }

    public function MensagemErro()
    {
        return $this->DescricaoErro;
    }

    public function FecharConexao()
    {
        if ($this->ConexaoBanco == NULL) {
            return FALSE;
        }

        $this->ConexaoBanco->close();
    }

    public function SetDELETE($Tabela = "")
    {
        if ($Tabela != "") {
            $this->ComandoSQL = "DELETE FROM " . $Tabela . " ";
        }
    }

    public function SetSELECT($Campos = "", $Tabela = "", $alias = "")
    {
        if (($Campos != "") && ($Tabela != "")) {
            $this->ComandoSQL = "SELECT " . $Campos . " FROM " . $Tabela . "  " . $alias;
        }
    }

    public function SetJOIN($Clausula = "", $side = "INNER")
    {
        if ($Clausula != "") {
            $this->ComandoSQL .= " $side JOIN ";
            $this->ComandoSQL .= $Clausula;
        }
    }

    public function SetWHERE($Clausula = "")
    {
        if ($Clausula != "") {
            $this->ComandoSQL .= " WHERE ";
            $this->ComandoSQL .= $Clausula;
        }
    }

    public function SetORDER($CampoOrdenacao = "")
    {
        if ($CampoOrdenacao != "") {
            $this->ComandoSQL .= " ORDER BY ";
            $this->ComandoSQL .= $CampoOrdenacao;
        }
    }

    public function ExecSELECT()
    {
        if ($this->ComandoSQL != "") {
            $this->DataSet = $this->ConexaoBanco->query($this->ComandoSQL);

            if ($this->DataSet) {
                $this->NumeroRegistros = $this->DataSet->num_rows;
            }

            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function TotalRegistros()
    {
        return $this->NumeroRegistros;
    }

    public function GetDataSet()
    {
        return $this->DataSet;
    }

    public function SetINSERT($Valores, $Tabela = "")
    {
        if (($Tabela != "") && (count($Valores) > 0)) {
            $ListaCampos = "";
            $ListaValores = "";

            foreach ($Valores as $Campo => $Valor) {
                $ListaCampos .= $Campo;
                $ListaValores .= $Valor;
                $arrKeys = array_keys($Valores);
                if ($Campo !== end($arrKeys)) {
                    $ListaCampos .= ",";
                    $ListaValores .= ",";
                }
            }

            $this->ComandoSQL = "INSERT INTO $Tabela($ListaCampos) VALUES($ListaValores)";
        }
    }

    public function ExecINSERT()
    {
        if ($this->ComandoSQL != "") {
            $this->Resultado = $this->ConexaoBanco->query($this->ComandoSQL);

            if ($this->Resultado == FALSE) {
                return FALSE;
            } else {
                if ($this->ConexaoBanco->affected_rows != 1) {
                    return FALSE;
                } else {
                    return TRUE;
                }
            }
        } else {
            return FALSE;
        }
    }

    public function SetUPDATE($Valores, $Tabela = "")
    {
        if (($Tabela != "") && (count($Valores) > 0)) {
            $CamposValores = "";

            foreach ($Valores as $Campo => $Valor) {
               $CamposValores .= $Campo . " = " . $Valor;
               $arrKeys = array_keys($Valores);
                if ($Campo !== end($arrKeys)) {
                    $CamposValores .= ",";
                }
            }

            $this->ComandoSQL = "UPDATE $Tabela SET $CamposValores";
        }
    }

    public function ExecUPDATE()
    {
        if ($this->ComandoSQL != "") {
            $this->Resultado = $this->ConexaoBanco->query($this->ComandoSQL);

            if ($this->Resultado == FALSE) {
                return FALSE;
            } else {
                if ($this->ConexaoBanco->affected_rows == 0) {
                    return FALSE;
                } else {
                    return TRUE;
                }
            }
        } else {
            return FALSE;
        }
    }

    public function ExecDELETE()
    {
        if ($this->ComandoSQL != "") {
            $this->Resultado = $this->ConexaoBanco->query($this->ComandoSQL);

            if ($this->Resultado == FALSE) {
                return FALSE;
            } else {
                if ($this->ConexaoBanco->affected_rows == 0) {
                    return FALSE;
                } else {
                    return TRUE;
                }
            }
        } else {
            return FALSE;
        }
    }

    public function ClearSQL()
    {

        if (!empty($this->ComandoSQL)) {
            $this->PrevCommSQL = $this->ComandoSQL;
            $this->ComandoSQL = "";
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function setComandoSQL($sql)
    {

        $this->ComandoSQL = $sql;
    }

    public function GetPrevSqlComm()
    {

        return $this->PrevCommSQL;
    }

    public function GetComandoSQL()
    {

        return $this->ComandoSQL;
    }
}
