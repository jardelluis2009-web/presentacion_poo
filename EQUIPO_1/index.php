<?php
// ============================================================================
// LÓGICA POO EN PHP (CLASE ESTUDIANTE PARA EL EJEMPLO PRÁCTICO)
// ============================================================================
class Estudiante {
    // Atributos privados (Encapsulamiento)
    private $nombre;
    private $nota1;
    private $nota2;

    // Constructor
    public function __construct($nombre, $nota1, $nota2) {
        $this->nombre = $nombre;
        $this->nota1 = (float)$nota1;
        $this->nota2 = (float)$nota2;
    }

    // Métodos
    public function calcularPromedio() {
        return ($this->nota1 + $this->nota2) / 2;
    }

    public function obtenerEstado() {
        $promedio = $this->calcularPromedio();
        if ($promedio >= 7.0) {
            return array("texto" => "Aprobado 🎉", "clase" => "bg-success text-white");
        } elseif ($promedio >= 5.0) {
            return array("texto" => "Remedial ⚠", "clase" => "bg-warning text-dark");
        } else {
            return array("texto" => "Reprobado ❌", "clase" => "bg-danger text-white");
        }
    }

    // Getters
    public function getNombre() { return $this->nombre; }
    public function getNota1() { return $this->nota1; }
    public function getNota2() { return $this->nota2; }
}

// Procesamiento del Formulario
$estudianteProcesado = null;
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["procesar"])) {
    $nombreInput = trim($_POST["nombre"]);
    $nota1Input = (float)$_POST["nota1"];
    $nota2Input = (float)$_POST["nota2"];

    // Instanciación del Objeto
    $estudianteProcesado = new Estudiante($nombreInput, $nota1Input, $nota2Input);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POO en PHP - Equipo #1</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- HOJA DE ESTILOS EXTERNA -->
    <link rel="stylesheet" href="CSS/estilos.css">
</head>
<body>

    <!-- ENCABEZADO IMPACTANTE -->
    <header class="hero-header text-center mb-4">
        <div class="container">
            <h1 class="mb-2"><i class="fa-solid fa-laptop-code me-2"></i>Programación Orientada a Objetos en PHP</h1>
            <p class="lead mb-0 fs-5">Unidad Educativa Fiscomisional "María Auxiliadora" | 3ro Informática "A"</p>
            <span class="badge bg-light text-dark mt-2 px-3 py-2 fw-bold shadow-sm">Proyecto de Exposición - Equipo #1</span>
        </div>
    </header>

    <!-- MENÚ DE NAVEGACIÓN FIJO (STICKY NAVBAR) -->
    <div class="container sticky-nav-container mb-4">
        <nav>
            <ul class="nav nav-pills nav-justified" id="mainMenu">
                <li class="nav-item"><a class="nav-link active" href="#teoria"><i class="fa-solid fa-book me-1"></i> Teoría POO</a></li>
                <li class="nav-item"><a class="nav-link" href="#elementos"><i class="fa-solid fa-cubes me-1"></i> Elementos</a></li>
                <li class="nav-item"><a class="nav-link" href="#pilares"><i class="fa-solid fa-shield-halved me-1"></i> 4 Pilares</a></li>
                <li class="nav-item"><a class="nav-link" href="#ejemplo-practico"><i class="fa-solid fa-code me-1"></i> Ejemplo Práctico</a></li>
                <li class="nav-item"><a class="nav-link" href="#cuestionario"><i class="fa-solid fa-pen-to-square me-1"></i> Cuestionario</a></li>
            </ul>
        </nav>
    </div>

    <main class="container">

        <!-- SECCIÓN 1: TEORÍA -->
        <section id="teoria" class="card card-custom p-4 mb-4">
            <h2 class="card-header-custom text-primary mb-3"><i class="fa-solid fa-circle-info me-2"></i>¿Qué es la Programación Orientada a Objetos?</h2>
            <p class="fs-6">La <strong>Programación Orientada a Objetos (POO)</strong> es un paradigma de programación que nos permite organizar el código agrupando comportamientos y datos similares dentro de "objetos". En lugar de un código lineal lleno de funciones sueltas, estructuramos nuestro programa imitando el mundo real.</p>
            
            <h4 class="text-indigo mt-3 fw-bold"><i class="fa-solid fa-circle-question me-2"></i>¿Para qué se utiliza?</h4>
            <p>Se utiliza para desarrollar aplicaciones más robustas, ordenadas y escalables. En PHP, la POO nos ayuda a dividir proyectos grandes en piezas independientes, facilitando el trabajo colaborativo y la corrección de errores.</p>

            <h4 class="text-indigo mt-3 fw-bold"><i class="fa-solid fa-star text-warning me-2"></i>Ventajas de trabajar con objetos en PHP:</h4>
            <div class="row g-3 mt-1">
                <div class="col-md-6">
                    <div class="p-3 bg-light rounded border border-success"><i class="fa-solid fa-rotate-right text-success me-2"></i><strong>Reutilización de código:</strong> Una clase puede usarse múltiples veces sin reescribir.</div>
                </div>
                <div class="col-md-6">
                    <div class="p-3 bg-light rounded border border-primary"><i class="fa-solid fa-broom text-primary me-2"></i><strong>Orden y limpieza:</strong> El código queda mucho más estructurado y legible.</div>
                </div>
                <div class="col-md-6">
                    <div class="p-3 bg-light rounded border border-warning"><i class="fa-solid fa-wrench text-warning me-2"></i><strong>Mantenimiento:</strong> Si hay un error, sabemos exactamente en qué objeto corregirlo.</div>
                </div>
                <div class="col-md-6">
                    <div class="p-3 bg-light rounded border border-danger"><i class="fa-solid fa-shield-cat text-danger me-2"></i><strong>Seguridad:</strong> Protege la información sensible mediante el encapsulamiento.</div>
                </div>
            </div>
        </section>

        <!-- SECCIÓN 2: ELEMENTOS DE LA POO -->
        <section id="elementos" class="card card-custom p-4 mb-4">
            <h2 class="card-header-custom text-primary mb-3"><i class="fa-solid fa-layer-group me-2"></i>Elementos Principales de la POO</h2>

            <div class="row g-3">
                <div class="col-md-6">
                    <div class="p-3 border rounded bg-light h-100">
                        <h5 class="text-primary fw-bold"><i class="fa-solid fa-file-code me-2"></i>1. Clase</h5>
                        <p class="small text-muted">Es la plantilla o molde para crear objetos.</p>
                        <div class="code-container">
                            <pre><code><span class="php-keyword">class</span> <span class="php-class">Estudiante</span> {
    <span class="php-comment">// Definición de la clase</span>
}</code></pre>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="p-3 border rounded bg-light h-100">
                        <h5 class="text-primary fw-bold"><i class="fa-solid fa-box-open me-2"></i>2. Objeto</h5>
                        <p class="small text-muted">Es la entidad creada a partir de una clase mediante la palabra clave <code>new</code>.</p>
                        <div class="code-container">
                            <pre><code><span class="php-var">$estudiante1</span> = <span class="php-keyword">new</span> <span class="php-class">Estudiante</span>();</code></pre>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="p-3 border rounded bg-light h-100">
                        <h5 class="text-primary fw-bold"><i class="fa-solid fa-tags me-2"></i>3. Atributos</h5>
                        <p class="small text-muted">Son las variables o características internas de la clase.</p>
                        <div class="code-container">
                            <pre><code><span class="php-keyword">class</span> <span class="php-class">Estudiante</span> {
    <span class="php-keyword">public</span> <span class="php-var">$nombre</span>;
    <span class="php-keyword">public</span> <span class="php-var">$nota</span>;
}</code></pre>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="p-3 border rounded bg-light h-100">
                        <h5 class="text-primary fw-bold"><i class="fa-solid fa-gears me-2"></i>4. Métodos, Constructor y $this</h5>
                        <p class="small text-muted">El constructor se ejecuta automáticamente al instanciar. <code>$this</code> hace referencia al objeto actual.</p>
                        <div class="code-container">
                            <pre><code><span class="php-keyword">public function</span> <span class="php-class">__construct</span>(<span class="php-var">$nombreRecibido</span>) {
    <span class="php-var">$this</span>->nombre = <span class="php-var">$nombreRecibido</span>;
}</code></pre>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- SECCIÓN 3: LOS 4 PILARES CON CÓDIGO EXPLICATIVO -->
        <section id="pilares" class="card card-custom p-4 mb-4">
            <h2 class="card-header-custom text-primary mb-3"><i class="fa-solid fa-shield-halved me-2"></i>Los 4 Pilares de la POO (Con Código)</h2>
            
            <div class="row g-4">
                <!-- PILAR 1 -->
                <div class="col-md-6">
                    <div class="pilar-card pilar-1 p-3 h-100">
                        <h5 class="text-danger fw-bold"><i class="fa-solid fa-lock me-2"></i>1. Encapsulamiento 🔒</h5>
                        <p class="small">Protege los datos restringiendo el acceso directo mediante modificadores como <code>private</code>.</p>
                        <div class="code-container">
                            <pre><code><span class="php-keyword">class</span> <span class="php-class">Cuenta</span> {
    <span class="php-keyword">private</span> <span class="php-var">$saldo</span>; <span class="php-comment">// Dato protegido</span>

    <span class="php-keyword">public function</span> <span class="php-class">getSaldo</span>() {
        <span class="php-keyword">return</span> <span class="php-var">$this</span>->saldo;
    }
}</code></pre>
                        </div>
                    </div>
                </div>

                <!-- PILAR 2 -->
                <div class="col-md-6">
                    <div class="pilar-card pilar-2 p-3 h-100">
                        <h5 class="text-primary fw-bold"><i class="fa-solid fa-sitemap me-2"></i>2. Herencia 🧬</h5>
                        <p class="small">Permite a una clase hija heredar atributos y métodos de una clase padre usando <code>extends</code>.</p>
                        <div class="code-container">
                            <pre><code><span class="php-keyword">class</span> <span class="php-class">Persona</span> { <span class="php-keyword">public</span> <span class="php-var">$nombre</span>; }

<span class="php-keyword">class</span> <span class="php-class">Estudiante</span> <span class="php-keyword">extends</span> <span class="php-class">Persona</span> {
    <span class="php-keyword">public</span> <span class="php-var">$curso</span>; <span class="php-comment">// Hereda $nombre</span>
}</code></pre>
                        </div>
                    </div>
                </div>

                <!-- PILAR 3 -->
                <div class="col-md-6">
                    <div class="pilar-card pilar-3 p-3 h-100">
                        <h5 class="text-success fw-bold"><i class="fa-solid fa-shapes me-2"></i>3. Polimorfismo 🎭</h5>
                        <p class="small">Permite que diferentes clases respondan de manera distinta al mismo método.</p>
                        <div class="code-container">
                            <pre><code><span class="php-keyword">class</span> <span class="php-class">Perro</span> { <span class="php-keyword">public function</span> <span class="php-class">hablar</span>() { <span class="php-keyword">return</span> <span class="php-string">"Guau"</span>; } }
<span class="php-keyword">class</span> <span class="php-class">Gato</span> { <span class="php-keyword">public function</span> <span class="php-class">hablar</span>() { <span class="php-keyword">return</span> <span class="php-string">"Miau"</span>; } }</code></pre>
                        </div>
                    </div>
                </div>

                <!-- PILAR 4 -->
                <div class="col-md-6">
                    <div class="pilar-card pilar-4 p-3 h-100">
                        <h5 class="text-warning fw-bold text-dark"><i class="fa-solid fa-brain me-2"></i>4. Abstracción 🧠</h5>
                        <p class="small">Muestra solo lo esencial del objeto y oculta la complejidad interna.</p>
                        <div class="code-container">
                            <pre><code><span class="php-keyword">abstract class</span> <span class="php-class">Vehiculo</span> {
    <span class="php-keyword">abstract public function</span> <span class="php-class">encender</span>();
}</code></pre>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- SECCIÓN 4: EJEMPLO PRÁCTICO + CÓDIGO ESCRITO VISIBLE -->
        <section id="ejemplo-practico" class="card card-custom p-4 mb-4">
            <h2 class="card-header-custom text-primary mb-3"><i class="fa-solid fa-code me-2"></i>Ejemplo Práctico en PHP: Sistema de Estudiantes</h2>
            <p>A continuación se muestra el código PHP escrito y la demostración interactiva que procesa los datos con la clase `Estudiante`:</p>

            <!-- BLOQUE DE CÓDIGO ESCRITO VISIBLE -->
            <div class="mb-4">
                <h5 class="fw-bold text-dark"><i class="fa-solid fa-file-lines me-2"></i>Código Fuente PHP (`Estudiante.php`):</h5>
                <div class="code-container">
                    <pre><code>&lt;?php
<span class="php-keyword">class</span> <span class="php-class">Estudiante</span> {
    <span class="php-keyword">private</span> <span class="php-var">$nombre</span>;
    <span class="php-keyword">private</span> <span class="php-var">$nota1</span>;
    <span class="php-keyword">private</span> <span class="php-var">$nota2</span>;

    <span class="php-keyword">public function</span> <span class="php-class">__construct</span>(<span class="php-var">$nombre</span>, <span class="php-var">$nota1</span>, <span class="php-var">$nota2</span>) {
        <span class="php-var">$this</span>->nombre = <span class="php-var">$nombre</span>;
        <span class="php-var">$this</span>->nota1 = (float)<span class="php-var">$nota1</span>;
        <span class="php-var">$this</span>->nota2 = (float)<span class="php-var">$nota2</span>;
    }

    <span class="php-keyword">public function</span> <span class="php-class">calcularPromedio</span>() {
        <span class="php-keyword">return</span> (<span class="php-var">$this</span>->nota1 + <span class="php-var">$this</span>->nota2) / 2;
    }

    <span class="php-keyword">public function</span> <span class="php-class">obtenerEstado</span>() {
        <span class="php-var">$promedio</span> = <span class="php-var">$this</span>-><span class="php-class">calcularPromedio</span>();
        <span class="php-keyword">if</span> (<span class="php-var">$promedio</span> >= 7.0) <span class="php-keyword">return</span> <span class="php-string">"Aprobado 🎉"</span>;
        <span class="php-keyword">elseif</span> (<span class="php-var">$promedio</span> >= 5.0) <span class="php-keyword">return</span> <span class="php-string">"Remedial ⚠"</span>;
        <span class="php-keyword">else return</span> <span class="php-string">"Reprobado ❌"</span>;
    }
}
?&gt;</code></pre>
                </div>
            </div>

            <!-- FORMULARIO INTERACTIVO Y RESULTADOS DE INSTANCIA -->
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="bg-light p-3 rounded border h-100">
                        <h5 class="fw-bold text-primary mb-3"><i class="fa-solid fa-keyboard me-2"></i>Formulario de Entrada</h5>
                        <form action="#ejemplo-practico" method="POST">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Nombre del Estudiante:</label>
                                <input type="text" name="nombre" class="form-control" placeholder="Ej: Jardel Canga" required>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Nota Parcial 1:</label>
                                    <input type="number" step="0.1" min="0" max="10" name="nota1" class="form-control" placeholder="8.5" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Nota Parcial 2:</label>
                                    <input type="number" step="0.1" min="0" max="10" name="nota2" class="form-control" placeholder="9.0" required>
                                </div>
                            </div>
                            <button type="submit" name="procesar" class="btn btn-primary w-100 fw-bold py-2">
                                <i class="fa-solid fa-play me-2"></i>Instanciar Objeto y Procesar
                            </button>
                        </form>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="bg-light p-3 rounded border h-100">
                        <h5 class="fw-bold text-success mb-3"><i class="fa-solid fa-square-poll-vertical me-2"></i>Resultado de la Instancia PHP</h5>
                        <?php if ($estudianteProcesado != null): ?>
                            <?php $estado =$estudianteProcesado->obtenerEstado(); ?>
                            <div class="card p-3 border-0 shadow-sm bg-white">
                                <p class="mb-2"><strong>Estudiante:</strong> <?= htmlspecialchars($estudianteProcesado->getNombre()) ?></p>
                                <p class="mb-2"><strong>Nota 1:</strong> <?= $estudianteProcesado->getNota1() ?> \vert{} <strong>Nota 2:</strong> <?=$estudianteProcesado->getNota2() ?></p>
                                <p class="mb-2"><strong>Promedio Calculado:</strong> <?= number_format($estudianteProcesado->calcularPromedio(), 2) ?></p>
                                <div class="mt-2">
                                    <strong>Estado Final:</strong>
                                    <span class="badge <?= $estado['clase'] ?> px-3 py-2 fs-6 ms-2">
                                        <?= $estado['texto'] ?>
                                    </span>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="alert alert-info mb-0">
                                <i class="fa-solid fa-circle-info me-2"></i>Ingresa datos en el formulario para crear un objeto `Estudiante` en vivo.
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>

        <!-- SECCIÓN 5: CUESTIONARIO DE LA IMAGEN ENVIADA -->
        <section id="cuestionario" class="card card-custom p-4 mb-4">
            <h2 class="card-header-custom text-primary mb-2"><i class="fa-solid fa-pen-to-square me-2"></i>Cuestionario de Programación Orientada a Objetos</h2>
            <p class="text-muted">Selecciona una respuesta para cada pregunta. Cada respuesta correcta vale <strong>2 puntos</strong>; al finalizar verás tu puntuación sobre 10.</p>

            <div class="cuestionario-box">
                <form id="quizForm">
                    
                    <!-- PREGUNTA 1 -->
                    <div class="pregunta-item">
                        <p class="fw-bold mb-2">1. ¿Qué es la Programación Orientada a Objetos (POO)?</p>
                        <div class="form-check mb-1">
                            <input class="form-check-input" type="radio" name="p1" value="a" id="p1a">
                            <label class="form-check-label" for="p1a">a) Un paradigma de programación que organiza el código en torno a objetos y datos.</label>
                        </div>
                        <div class="form-check mb-1">
                            <input class="form-check-input" type="radio" name="p1" value="b" id="p1b">
                            <label class="form-check-label" for="p1b">b) Un lenguaje de marcado utilizado exclusivamente para estructurar páginas web.</label>
                        </div>
                        <div class="form-check mb-1">
                            <input class="form-check-input" type="radio" name="p1" value="c" id="p1c">
                            <label class="form-check-label" for="p1c">c) Una base de datos relacional para almacenar información del usuario.</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="p1" value="d" id="p1d">
                            <label class="form-check-label" for="p1d">d) Un método para escribir únicamente código secuencial o lineal.</label>
                        </div>
                    </div>

                    <!-- PREGUNTA 2 -->
                    <div class="pregunta-item">
                        <p class="fw-bold mb-2">2. ¿Qué es una clase en PHP?</p>
                        <div class="form-check mb-1">
                            <input class="form-check-input" type="radio" name="p2" value="a" id="p2a">
                            <label class="form-check-label" for="p2a">a) Un objeto específico con datos asignados en memoria.</label>
                        </div>
                        <div class="form-check mb-1">
                            <input class="form-check-input" type="radio" name="p2" value="b" id="p2b">
                            <label class="form-check-label" for="p2b">b) Una plantilla o molde que define propiedades y métodos.</label>
                        </div>
                        <div class="form-check mb-1">
                            <input class="form-check-input" type="radio" name="p2" value="c" id="p2c">
                            <label class="form-check-label" for="p2c">c) Un método para calcular valores numéricos.</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="p2" value="d" id="p2d">
                            <label class="form-check-label" for="p2d">d) Una instancia específica creada a partir de un objeto.</label>
                        </div>
                    </div>

                    <!-- PREGUNTA 3 -->
                    <div class="pregunta-item">
                        <p class="fw-bold mb-2">3. ¿Qué representan los atributos de un objeto?</p>
                        <div class="form-check mb-1">
                            <input class="form-check-input" type="radio" name="p3" value="a" id="p3a">
                            <label class="form-check-label" for="p3a">a) Las características o datos que lo describen.</label>
                        </div>
                        <div class="form-check mb-1">
                            <input class="form-check-input" type="radio" name="p3" value="b" id="p3b">
                            <label class="form-check-label" for="p3b">b) Las acciones que realiza el objeto.</label>
                        </div>
                        <div class="form-check mb-1">
                            <input class="form-check-input" type="radio" name="p3" value="c" id="p3c">
                            <label class="form-check-label" for="p3c">c) Las instrucciones para crear una página web.</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="p3" value="d" id="p3d">
                            <label class="form-check-label" for="p3d">d) Los errores del programa.</label>
                        </div>
                    </div>

                    <!-- PREGUNTA 4 -->
                    <div class="pregunta-item">
                        <p class="fw-bold mb-2">4. ¿Cuándo se ejecuta el constructor __construct() en PHP?</p>
                        <div class="form-check mb-1">
                            <input class="form-check-input" type="radio" name="p4" value="a" id="p4a">
                            <label class="form-check-label" for="p4a">a) Cada vez que se cierra el navegador.</label>
                        </div>
                        <div class="form-check mb-1">
                            <input class="form-check-input" type="radio" name="p4" value="b" id="p4b">
                            <label class="form-check-label" for="p4b">b) Al crear un objeto, para inicializar sus atributos.</label>
                        </div>
                        <div class="form-check mb-1">
                            <input class="form-check-input" type="radio" name="p4" value="c" id="p4c">
                            <label class="form-check-label" for="p4c">c) Solo cuando se elimina una clase.</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="p4" value="d" id="p4d">
                            <label class="form-check-label" for="p4d">d) Al final de cada archivo PHP.</label>
                        </div>
                    </div>

                    <!-- PREGUNTA 5 -->
                    <div class="pregunta-item">
                        <p class="fw-bold mb-2">5. ¿Qué pilar de la POO protege los datos restringiendo el acceso directo?</p>
                        <div class="form-check mb-1">
                            <input class="form-check-input" type="radio" name="p5" value="a" id="p5a">
                            <label class="form-check-label" for="p5a">a) Encapsulamiento.</label>
                        </div>
                        <div class="form-check mb-1">
                            <input class="form-check-input" type="radio" name="p5" value="b" id="p5b">
                            <label class="form-check-label" for="p5b">b) Herencia.</label>
                        </div>
                        <div class="form-check mb-1">
                            <input class="form-check-input" type="radio" name="p5" value="c" id="p5c">
                            <label class="form-check-label" for="p5c">c) Polimorfismo.</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="p5" value="d" id="p5d">
                            <label class="form-check-label" for="p5d">d) Abstracción.</label>
                        </div>
                    </div>

                    <button type="button" onclick="evaluarCuestionario()" class="btn-cuestionario">
                        Finalizar cuestionario
                    </button>
                </form>

                <div id="resultadoQuiz" class="mt-3 text-center"></div>
            </div>
        </section>

    </main>

    <footer class="text-center py-4 mt-5">
        <p class="mb-0 fs-6">© 2026 - Proyecto POO en PHP | Equipo #1 - UEF "María Auxiliadora"</p>
    </footer>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- SCRIPT DE EVALUACIÓN DETALLADA CON EXPLICACIONES -->
<script>
    function evaluarCuestionario() {
        // Respuestas correctas y sus explicaciones
        const solucionario = {
            p1: { 
                correcta: 'a', 
                explicacion: 'La POO organiza el código en objetos que contienen atributos (datos) y métodos (funciones).' 
            },
            p2: { 
                correcta: 'b', 
                explicacion: 'Una clase funciona como un plano o molde a partir del cual se crean las instancias u objetos.' 
            },
            p3: { 
                correcta: 'a', 
                explicacion: 'Los atributos son las variables que definen las propiedades o características de un objeto.' 
            },
            p4: { 
                correcta: 'b', 
                explicacion: 'El método mágico __construct() se dispara automáticamente al usar la palabra clave "new".' 
            },
            p5: { 
                correcta: 'a', 
                explicacion: 'El encapsulamiento restringe el acceso directo usando modificadores como "private" o "protected".' 
            }
        };

        let nota = 0;

        for (let i = 1; i <= 5; i++) {
            const idPregunta = `p${i}`;
            const radios = document.getElementsByName(idPregunta);
            const seleccion = document.querySelector(`input[name="${idPregunta}"]:checked`);
            const datosPregunta = solucionario[idPregunta];

            // Limpiar retoques visuales previos en las opciones
            radios.forEach(radio => {
                const label = radio.nextElementSibling;
                label.classList.remove('text-success', 'text-danger', 'fw-bold');
            });

            // Eliminar retroalimentación previa si existe
            let retroAnterior = document.getElementById(`feedback-${idPregunta}`);
            if (retroAnterior) retroAnterior.remove();

            // Crear el contenedor de retroalimentación para la pregunta
            const divFeedback = document.createElement('div');
            divFeedback.id = `feedback-${idPregunta}`;
            divFeedback.className = 'mt-2 p-2 rounded small fw-semibold';

            if (seleccion) {
                if (seleccion.value === datosPregunta.correcta) {
                    nota += 2;
                    divFeedback.className += ' bg-success-subtle text-success border border-success';
                    divFeedback.innerHTML = `✅ <strong>¡Correcto!</strong> ${datosPregunta.explicacion}`;
                } else {
                    divFeedback.className += ' bg-danger-subtle text-danger border border-danger';
                    divFeedback.innerHTML = `❌ <strong>Incorrecto.</strong> La opción correcta era la <strong>${datosPregunta.correcta.toUpperCase()}</strong>. ${datosPregunta.explicacion}`;
                }
            } else {
                divFeedback.className += ' bg-warning-subtle text-dark border border-warning';
                divFeedback.innerHTML = `⚠️ <strong>Sin responder.</strong> La opción correcta era la <strong>${datosPregunta.correcta.toUpperCase()}</strong>. ${datosPregunta.explicacion}`;
            }

            // Insertar el mensaje al final de cada ítem de pregunta
            const bloquePregunta = radios[0].closest('.pregunta-item');
            bloquePregunta.appendChild(divFeedback);
        }

        // Mostrar resumen con la nota global arriba del botón o al final
        const divResultado = document.getElementById('resultadoQuiz');
        let colorAlerta = nota >= 7 ? 'alert-success' : (nota >= 5 ? 'alert-warning' : 'alert-danger');
        
        divResultado.innerHTML = `
            <div class="alert ${colorAlerta} fs-5 fw-bold shadow-sm mb-3">
                🎯 Resultado Final: ${nota} / 10 Puntos
            </div>
        `;
    }
</script>
</body>
</html>