<?php
class CuentaBancaria {
    // Atributos
    private $titular;
    private $saldo;

    // Constructor
    public function __construct($titular, $saldoInicial) {
        $this->titular = $titular;
        $this->saldo = $saldoInicial;
    }

    // Métodos y uso de $this
    public function depositar($monto) {
        $this->saldo += $monto;
        return "Depósito de $$monto exitoso. Saldo actual: $" . $this->saldo;
    }
}

// Procesamiento del formulario (Ejemplo)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['titular'];
    $deposito = $_POST['monto'];
    
    // Creación del Objeto
    $miCuenta = new CuentaBancaria($nombre, 0);
    $resultado = $miCuenta->depositar($deposito);
    echo "<h3>Resultado: " . $resultado . "</h3>";
}
?>